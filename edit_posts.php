<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location: ./login.php");
    }
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';
    if(isset($_SESSION['username'])) {
        $sql = mysqli_query($con, "SELECT * FROM users, blog_posts WHERE post_id = ".$_GET['id']."  ") or die ("Lỗi");
        $r = mysqli_fetch_array($sql);
    }
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
        #container .panel-heading{
            text-align: left; height: 50px; font-size: 20px;
        }
        #row .btn-info{
            float: right;
        }
        #row .img-circle{
            width: 80px; height: 70px; margin: 10px;
        }
        .name{
            font-size: 17px;
        }
        #row .pic img{
            width: 200px; height: 170px; display: block;
        }
    </style>
</head>
<body>
<!--Header-->
<div id="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">MyBlog</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul  class="nav navbar-nav navbar-right">
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
    </div><br><br><br><br><br>
    <!--Container-->
    <div id="container" >
        <form action="edit_process.php?id=<?=$r['post_id']?>" method="POST" enctype="multipart/form-data">
            <div id="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading" ><b>Chỉnh sửa bài viết</b><button class="btn btn-info" name="btn-edit" type="submit">Cập nhật</button></div>
                        <table>
                            <tr>
                                <?php
                                $get_user = mysqli_query($con, "SELECT * FROM users WHERE username = '".$_SESSION['username']."' ") or die ("Lỗi user");
                                $get = mysqli_fetch_array($get_user);
                                ?>
                                <th rowspan="2">
                                    <img src="<?=$get['avatar']?>" alt="..." class="img-circle">

                                </th>
                                <td>
                                    <b class="name"><?=$get['fullname']?></b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <select class="form-control" name="is_private">
                                                <option value="<?php echo $r['is_private']; ?>">
                                                    <?php if($r['is_private'] == 0){ echo "Công khai"; ?>
                                                        <option value="1">Riêng tư</option>
                                                    <?php
                                                        }else{ echo "Riêng tư"; ?>
                                                        <option value="0">Công khai</option>
                                                    <?php }?>
                                                </option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table class="table" >
                            <div class="callout callout-info">
                                <div class="col-sm-12">
                                    <dl>
                                        <dd>
                                            <input type="text" class="form-control" name="title" value="<?=$r['title'];?>">
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dd>
                                            <textarea class="form-control" rows="7" name="content" ><?php echo $r['content'];?></textarea>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dd class="pic">
                                            <!--                                            <input type="file" id="file-upload" name = "image_url" />-->
                                            <!--                                            <form action="upload.php" method="post" enctype="multipart/form-data">-->
                                            <label for ="fileSelect"> Ảnh bài viết: </label>
                                            <img src="./assets/css/img/<?=$r["image_url"]?>" alt='Ảnh bài viết'>
                                            <input type="file" name="image_url" id = "fileSelect">
                                            <p> <strong> Lưu ý: </strong> Chỉ cho phép các định dạng .jpg, .jpeg với kích thước tối đa là 5 MB. </p>
                                            <!--                                            </form>-->
                                        </dd>
                                    </dl>
                                </div>
                            </div>

                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
