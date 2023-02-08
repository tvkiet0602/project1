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

    <br><br><br>
    <!--Container-->
    <div id="row">
        <div class="col-md-8 col-md-offset-1" style="background-color: #c4b4c1; height: auto;">

            <h2  style="text-align: left;">Heading</h2>
            <h5><em>Cập nhật: 30/01/2023 &emsp; &emsp; &emsp;&emsp;Người tạo: Trần Văn Kiệt</em></h5>
            <!-- <img src="./assets/css/img/4.jpg" alt=""> -->
            <p >Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="index.html" role="button">&laquo; Quay lại</a></p>

        </div>




        <div class="col-sm-2"  style="background-color: #c4b4c1; float:right;">
            <h3 style="margin-top: 80px;" >Người dùng</h3>
            <p>
                <img src="assets/css/img/avatar2.jpg" alt="..." class="img-circle"><a style="text-decoration: none; color: black;">&emsp;Trần Văn Kiệt</a>
            </p>

        </div>
    </div>
</body>
</html>