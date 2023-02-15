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
    <link rel="stylesheet" href="./assets/css/responsive.css">
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
        .col-xs-11{
            width: 100%; margin-left: 40px;
        }
        #comeback{
            font-size: 16px; margin: 20px 0px 30px 70px;
        }
        .title{
            font-size: 30px; display: inline; float: left;
        }
        #edit{
            font-size: 17px;
            float:right;
        }
        #row .img{
            width: 500px; height: 300px; margin-right: auto; margin-left: auto; display: block;
        }
        #row .content{
            font-size: 20px; text-align: justify;
        }
        .hr1{
            height: 20px; width: 100%; border: 0; box-shadow: 0 10px 10px -10px #8c8b8b inset; margin: 0px;
        }
        #cmt h4{
            margin: 0px; color: #007bff;
        }
        .input-group-btn input{
            height: 74px; font-size: 18px;
        }
        .form-cmt{
            width: 100px;
        }
        #row .avt-cmt-own{
            width: 70px; height: 70px; margin: 20px 0px 20px 0px;
        }
        #row .form-control textarea{
            margin-left: 10px; width: 100%;
        }
        .hr2{
            height: 6px;background-image: radial-gradient(closest-side,hsla(0, 0%, 50%, 1.0),hsla(0, 0%, 50%, 0) 100%);position: relative;
        }
        #row .img-rounded{
            width: 70px; height: 70px; margin-bottom:  20px;
        }
        .section-cmt{
            margin-left: 20px;
        }
        .section-fullname{
            font-weight: bold; margin-left: 20px; font-size: 17px; margin-top: 0px;
        }
    </style>
</head>
<body>
<!--Header-->
<div id="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="myblog.php">MyBlog</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul  class="nav navbar-nav navbar-right">
                    <li><a>Xin chào <?php echo $_SESSION['username']; ?></a></li>
                    <li><a  href="index.php">Trang chủ</a></li>
                    <li><a  href="post.php">Tạo bài viết</a></li>
                    <li><a  href="logout.php">Đăng xuất</a></li>
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
        <div class="col-md-7 col-md-offset-1">
            <a id = "comeback" class='btn btn-default' href='index.php' >&nbsp; &laquo; Quay lại &nbsp;&nbsp; </a>
            <div class="container">
                <div>
                    <div class="col-xs-11" >
                        <table>
                            <?php
                                $result= mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id  order by post_date ASC ") or die ("Lỗi hiển thị");
                                $post_id = $_GET["id"];
                                while($r = mysqli_fetch_array($result)){
                                    if($r["post_id"] == $post_id){
                                        if($r['username'] == $_SESSION['username']){
                                        echo "
                                        <tr>
                                            <td height: auto;>
                                                <p><b class= 'title' >".$r["title"]."</b></p>
                                              
                                                <a id='edit' class='btn btn-default' href='edit_posts.php?id=".$r['post_id']."'>Chỉnh sửa</a><br><br>
                                                    
                                                </div>
                                                
                                                <h4><em>Ngày đăng: ".$r["post_date"]." </em></h4> 
                                                 <h4><em>Người tạo: ".$r["fullname"]."</em></h4><br></td>
                                            </td>
                                          
                                        </tr>
                                        <tr>
                                              <td>
                                                <img class='img' src='./assets/css/img/".$r["image_url"]."' alt='Ảnh' >  
                                                 <p class='content'>".$r["content"]."</p>
                                              </td>
                                        </tr>";

                                        }else{
                                            echo "
                                        <tr>
                                            <td height: auto;>
                                                <p><b class= 'title' >".$r["title"]."</b></p><br><br>
                                              
                                                </div>
                                                
                                                <h4><em>Ngày đăng: ".$r["post_date"]." </em></h4> 
                                                 <h4><em>Người tạo: ".$r["fullname"]."</em></h4><br></td>
                                            </td>
                                          
                                        </tr>
                                        <tr>
                                              <td>
                                                <img class='img' src='./assets/css/img/".$r["image_url"]."' alt='Ảnh' >  
                                                 <p class='content'>".$r["content"]."</p>
                                              </td>
                                        </tr>";

                                        }
                                    }
                                }
                            ?>
                        </table>
                        <form id="cmt" action="comment.php?id=<?= $post_id?>" method="POST">
                            <hr class="hr1">
                            <h4>BÌNH LUẬN BÀI VIẾT</h4>
                            <?php
                                $sql = mysqli_query ($con, "SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
                                $r = mysqli_fetch_array($sql);

                            ?>
                            <div>
                                <table  width="100%" >
                                    <tr>
                                        <td class="form-cmt">
                                            <img class="avt-cmt-own" src="<?=$r['avatar']?>" class="img-rounded">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <textarea class="form-control" name="comment" rows="3" placeholder="Nhập nhận xét của bạn..." > </textarea>
                                            <span class="input-group-btn" >
                                                <input type="submit" class="btn btn-default">
                                            </span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <hr class="hr2">
                                <table>
                                    <?php
                                    $cmt = mysqli_query ($con, "SELECT * FROM users join comment_posts  on users.user_id=comment_posts.user_id join blog_posts on blog_posts.post_id=comment_posts.post_id WHERE blog_posts.post_id=".$_GET['id']." ") or die ("Lỗi truy vấn 333");
                                    if(mysqli_num_rows($cmt) == 0){
                                        echo "<section style=''>Chưa có bình luận nào cho bài viết này!</section>";
                                    }
                                    else{
                                    While($r = mysqli_fetch_array($cmt)){
                                    ?>
                                    <div>
                                        <tr>
                                            <td>
                                                <img src="<?=$r['avatar']?>" class="img-rounded">
                                            </td>
                                            <td>
                                                <section class="section-fullname"><?= $r['fullname']?></section>
                                                <section class="section-cmt" ><?= $r['comment']?></section>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>