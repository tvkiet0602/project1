<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location: ../login.php");
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
                    <!-- <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li> -->
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
                                                <img src='".$r["image_url"]."' alt='...' style='width: 500px; height: 300px; margin-right: auto; margin-left: auto; display: block;'>  
                                                 <p style='font-size: 20px; text-align: justify;'>".$r["content"]."</p>
                                              </td>
                                        </tr>";
                                    }
                                }

                            ?>
                        </table>
                        <div class="col-md-9 col-md-offset-1" style="margin-left: 160px; margin-top: 50px;">
                            <div class="panel panel-primary" >
                                <div class="panel-heading" >
                                    <div class="panel-body" style="padding: 0px; height: 20px;">
                                        <b >Phản hồi</b>
                                    </div>
                                </div>
                                <form method="POST">
                                    <div class="input-group" style="height:auto;">
                                        <!-- <div class="input-group"> -->
                                        <input type="text"  name="binhluan" class="form-control" autocomplete="off" placeholder="Hãy viết phản hồi của bạn ...">
                                        <span class="input-group-btn" >
                                <input type="submit" class="btn btn-default">
                            </span>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>