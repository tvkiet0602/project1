<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location: ./login.php");
    }
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        body{
            background: rgba(199, 199, 199, 0.418);
            font-family: "Times New Roman";
        }
        #row img{
            width: 40px;
            height: 40px;
        }
        #row p{
            font-size:medium;
        }
        #row .container a{
            text-decoration: none;
            box-shadow: 0 3px tomato;
            padding: 4px;
            color: black;
        }
        #row .col-sm-2{
            width: 20em;

        }

    </style>
</head>
<body>
<!--Header-->
<div id="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a style="color: #007bff; font-size:xx-large;" class="navbar-brand" href="#">MyBlog</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul  class="nav navbar-nav navbar-right">
                    <li><a style="color: #007bff;" href="index.php">Trang chủ</a></li>
                    <li><a style="color: #007bff;" href="post.php">Tạo bài viết</a></li>
                    <li><a style="color: #007bff;" href="logout.php">Đăng xuất</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
    <div>
    </div>

    <br><br><br>
    <!--Container-->
    <div id="row">
        <div class="col-md-7 col-md-offset-1" style="height: auto;">
            <p><a  style='font-size: 16px; margin: 20px 0px 30px 70px;' class='btn btn-default' href='index.php'  role='button'>&nbsp; &laquo; Quay lại &nbsp;&nbsp; </a></p>
            <div class="container">
                <!-- Example row of columns -->
                <div>
                    <div class="col-xs-11" >
                        <table  style="width: 100%; margin-left: 40px;" >
                            <?php

                                $result= mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id  order by post_date ASC ") or die ("Lỗi hiển thị");
                                $post_id = $_GET["id"];
                                while($r = mysqli_fetch_array($result)){
                                    if($r["post_id"] == $post_id){
                                        echo "
                                        <tr>
                                            <td height: auto;>
                                                <p><b style='font-size: 30px; display: inline; float: left'>".$r["title"]."</b></p>
                                                <form>
                                                    <div class='btn-group' style='text-align: center; display: inline; float: right'>
                                                        <select class='form-control' name='is_private'>";
                                                        if($r['is_private'] == 0){
                                                            echo "<option value=0 >Công khai</option>
                                                                    <option value=1 >Riêng tư</option>";
                                                        }else echo "<option value=1 >Riêng tư</option>
                                                                    <option value=0 >Công khai</option>";
                                                         echo "</select>
                                                    </div><br><br>
                                                </form>
                                                <h4><em>Ngày đăng: ".$r["post_date"]." </em></h4> 
                                                 <h4><em>Người tạo: ".$r["fullname"]."</em></h4><br></td>
                                            </td>
                                            <td rowspan='4'>
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                              <td style='float: left;'>
                                                <img src='./assets/css/img/".$r["image_url"]."' alt='...' style='width: 500px; height: 300px; margin-right: auto; margin-left: auto; display: block;'>  
                                                 <p style='font-size: 20px; text-align: justify;'>".$r["content"]."</p>
                                              </td>
                                        </tr>";
                                    }
                                }

                            ?>
                        </table>
                        <form id="cmt" action="comment.php" method="POST">
                            <hr class="style13" style="height: 20px; width: 100%; border: 0; box-shadow: 0 10px 10px -10px #8c8b8b inset; margin: 0px 40px;">
                            <h4 style="margin: 0px 40px; color: #007bff; ">BÌNH LUẬN BÀI VIẾT</h4>
                            <?php

                                $sql = mysqli_query ($con, "SELECT * FROM users");
                                $r = mysqli_fetch_array($sql);


                            ?>
                            <div>

                                <table  width="100%" style="margin-left: 40px;">
                                    <tr>
                                        <td style="width: 10px"><?php
                                            ?>
                                            <img src="<?=$r['avatar']?>" class="img-rounded" style=" width: 70px; height: 70px; margin: 20px 0px 20px 0px;">
                                        </td>

                                        <td>
                                            <div class="input-group">
                                            <textarea class="form-control" name="comment" rows="3" placeholder="Nhập nhận xét của bạn..." style="margin-left: 10px; width: 100%;"> </textarea>
                                            <span class="input-group-btn" >
                                                <input style="height: 74px; font-size: 18px;" type="submit" class="btn btn-default">
                                            </span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <hr class="accessory" style="height: 6px;background-image: radial-gradient(closest-side,hsla(0, 0%, 50%, 1.0),hsla(0, 0%, 50%, 0) 100%);position: relative;">
                                <table style="margin: 0px 40px;" >
                                    <?php
                                    $cmt = mysqli_query ($con, "SELECT * FROM users join comment_posts  on users.user_id=comment_posts.user_id join blog_posts on blog_posts.post_id=comment_posts.post_id WHERE blog_posts.post_id=".$_GET['id']." ") or die ("Lỗi truy vấn 333");
                                    if(mysqli_num_rows($cmt) == 0){
                                        echo "<section style='color: green; margin-left: 10px;'>Chưa có phản hồi / bình luận nào cho bài viết này!</section>";
                                    }
                                    else{
                                    foreach($cmt as $value){
                                    ?>
                                    <div">
                                        <tr>
                                            <td style="width: 10px">
                                                <img src="<?=$r['avatar']?>" class="img-rounded" style=" width: 70px; height: 70px; margin: 0px 0px 20px 0px;">
                                            </td>
                                            <td>
                                                <section style="font-weight: bold; margin-left: 20px; font-size: 17px; margin-top: 0px;" ><?= $value['fullname']?></section>
                                                <section style="margin-left: 20px;"><?= $value['comment']?></section>
                                            </td>
                                        </tr>
                                        <div>
                                            <?php
                                    }
                                    }
                                            ?>
                                </table>
                            </div>
                        </form>
                                <?php
                                 $comment = mysqli_query ($con, "SELECT * FROM users u, comment_posts c, blog_posts WHERE u.user_id=c.user_id, b.post_id=c.post_id, post_id=".$_GET['id']) or die ("Lỗi truy vấn bình luận");
                                if(mysqli_num_rows($comment) == 0){
                                    echo "<section style='color: green; margin-left: 10px;'>Chưa có bình luận cho bài viết này!</section>";
                                }
                                else{
                                foreach($comment as $value){
                                ?>
                                <div style=" padding: 0px 10px;">
                                    <section style="font-weight: bold;" >* <?= $value['fullname']?></section>
                                    <section><?= $value['comment']?></section>
                                    <div>
                                        <?php
                                        }
                                        }
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>