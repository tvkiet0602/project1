<?php
    session_start();
    include 'connect.php';
    if(!isset($_SESSION["username"])){
        header("loation: ./login.php");
    }
    header("Content-Type: text/html; charset-UTFF-8");
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
<!--                    --><?php
//                    $ID = $_GET['id'];
//                        $re = mysqli_query($con, "SELECT * FROM users WHERE user_id = '$ID'" );
//                        $a = mysqli_fetch_array($re);
//                        echo "<li><a style='color: #007bff;' href='post.php?id=".$a['ID']."'>Tạo bài viết</a></li>";
//                    ?>
                    <li><a style="color: #007bff;" href="post.php">Tạo bài viết</a></li>
                    <li><a style="color: #007bff;" href="#">Đăng xuất</a></li>
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

    <br><br><br><br><br>

    <!--Container-->
    <div id="container" >
        <form action="post_process.php" method="POST" enctype="multipart/form-data">
            <div class="row" style="width: auto;">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary" style="margin-left: 10px;">
                        <div class="panel-heading" ><b style="text-align: left; height: 50px; font-size: 20px;">TẠO BÀI VIẾT MỚI</b><button  class="btn btn-info" type="submit" style="float: right;">Đăng bài</button></div>
                        <table>
                            <tr>
                                <th rowspan="2">
                                    <img src="assets/css/img/avatar1.jpg" alt="..." class="img-circle" style=" width: 70px; height: 70px; margin: 10px;">
                                </th>
                                <td>
                                    <b style="font-size: 18px;">Trần Văn Kiệt</b>
                                </td>
                            </tr>
                            <tr >
                                <td>
                                    <div class="btn-group" style="text-align: center;">
                                        <select class="form-control" name="is_private">
                                            <option selected value="0">Công khai</option>
                                            <option value="1">Riêng tư</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table class="table" >
                            <div class="callout callout-info" style="margin-top: 15px;">
                                <div class="col-sm-12">
                                    <dl>
                                        <dd>
                                            <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" required>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dd>
                                            <textarea class="form-control" rows="7" name="content" placeholder="Bạn đang muốn chia sẻ những gì?" required></textarea>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dd>
                                            <input type="file"  id="file-upload" name = "image_url" />
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </table>

                        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
                        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>