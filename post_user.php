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

        #row img{
            width: 200px;
            height: 150px;
        }
        #row p{
            font-size:medium;
        }
        #row .container a{
            text-decoration: none;
            box-shadow: 0 3px none;
            padding: 4px;
            color: black;
        }

        #row table{
            margin-top: 20px;
        }

        .leftcolumn {
            /*float: left;*/
            margin-left: 200px;
            width: 70%;
            background-color: #baa1cc;
        }
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }
        @media screen and (max-width: 700px) {
            .leftcolumn, .rightcolumn {
                width: 100%;    padding: 0;
            }
        }
        /* Bố cục linh hoạt: Thanh menu điều hướng xếp chồng lên nhau thay vì cạnh nhaukhi màn hình có chiều rộng dưới 300px  */
        @media screen and (max-width: 300px) {
            .topnav a {
                float: none;    width: 100%;
            }
        }

        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial;
            padding: 10px;
            background: #e9d8f4;
        }
        /* Header/Blog Title */
        .header {
            padding: 10px;
            text-align: center;
            background: white;
            color: #58257b;
        }
        #row button{
            margin-left: 30px;
        }
        /* Footer */
        .footer {
            padding: 10px;
            text-align: center;
            background: white;
            margin-top: 10px;
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
        <div class="leftcolumn">
            <div class="card" style="margin: 0px 150px 0px 150px;">
                <button type="button" class="btn btn-primary">BÀI VIẾT CÁ NHÂN</button>
                <table>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id  order by post_date ASC ") or die ("Lỗi hiển thị");

                    while($r = mysqli_fetch_array($result)){
                        if($r["user_id"] == $_GET["id"]){
                            echo "
                              <tr>
                                  <td rowspan='4'>
                                      <img src='".$r["image_url"]."' alt='Ảnh bài viết' vspace='20px' hspace='30px'  >
                                  </td>
                                   <td style='font-size: 20px;'>
                                      <p><b >".$r["title"]."</b></p><br>
                                  </td>
                              </tr>
                              <tr>
                                   <td style=''>
                                      <h5><em>Ngày đăng: ".$r["post_date"]." --- Người tạo: ".$r["fullname"]."</em></h5><em>
                                   </td>
                              </tr>
                              <tr>
                                  <td style=''>
                                      <h5>";
                            if(strlen($r["content"]) > 100)
                                $cOutput = mb_substr($r["content"], 0, 99, "UTF-8");
                            echo $cOutput . "...";
                            echo "</h5>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <p><a class='btn btn-default' href='detail.php' role='button'>Xem chi tiết &raquo;</a></p>
                                  </td>
                              </tr>";
                        }
                    }?>
                </table>
                <div class="footer">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>

                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</body>
</html>