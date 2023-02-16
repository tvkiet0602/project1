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
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/icon/themify-icons-font/themify-icons/themify-icons.css">
    <style>
        body{
            background: rgba(199, 199, 199, 0.418);
        }
        #row img{
            width: 50px;
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
        #row .panel-heading{
            text-align: left; height: 50px; font-size: 20px;
        }
        .panel-heading button{
            float: right;
        }
        #row .img{
            width: 70px; height: 70px; margin: 10px 20px;
        }

        .name{
            font-size: 18px;
        }
    </style>
</head>
<body>
<!--Header-->
<div id="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <a class="navbar-brand" href="myblog.php">MyBlog</a>
        <ul  class="nav navbar-nav navbar-right">
            <li>
                <form class="navbar-form">
                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
                </form>
            </li>
            <li><a>Xin chào <?php echo $_SESSION['username']; ?></a></li>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a  href="post.php">Tạo bài viết</a></li>
            <li><a  href="logout.php">Đăng xuất &nbsp;</a></li>

        </ul>
    </nav>
</div><br><br><br>

    <!--Container-->
    <div id="container" >
        <form action="post_process.php" method="POST" enctype="multipart/form-data">
            <div id="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading" ><b>TẠO BÀI VIẾT MỚI</b><button  class="btn btn-info" name="btn-upload" type="submit" >Đăng bài</button></div>
                            <?php
                            if(isset($_SESSION['username'])) {
                                $sql = mysqli_query($con, "SELECT * FROM users");
                                $r = mysqli_fetch_array($sql);
                            }
                            ?>
                        <table>
                            <tr>
                                <th rowspan="2">
                                    <img class ="img" src="<?=$r['avatar']?>" alt="Avatar" >
                                </th>
                                <td>
                                    <b class="name"><?=$r['fullname']?></b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group" >
                                        <select class="form-control" name="is_private">
                                            <option selected value="0">Công khai</option>
                                            <option value="1">Riêng tư</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table class="table" >
                            <div class="callout callout-info" >
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
                                            <label for ="fileSelect"> Tải hình ảnh: </label>
                                            <input type="file" name="image_url" id = "fileSelect">
                                            <p> <strong> Lưu ý: </strong> Chỉ cho phép các định dạng .jpg, .jpeg với kích thước tối đa là 5 MB. </p>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </table>

                        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
                        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>