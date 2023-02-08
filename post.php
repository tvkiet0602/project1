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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: #007bff; font-size:xx-large;" class="navbar-brand" href="#">MyBlog</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul  class="nav navbar-nav navbar-right">
                    <li><a style="color: #007bff;" href="#">Trang chủ</a></li>
                    <li><a style="color: #007bff;" href="#">Tạo bài viết</a></li>
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
        <form action=".php" method="POST">
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
                                        <button type="button" class="ti-world" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Công khai</a></li>
                                            <li><a href="#">Riêng tư</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table class="table" >
                            <div class="callout callout-info" style="margin-top: 15px;">
                                <div class="col-sm-12">
                                    <dl>
                                        <dd>
                                            <textarea class="form-control" rows="7" name="noidung" placeholder="Bạn đang muốn chia sẻ điều gì?"></textarea>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </table>

                        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
                        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>