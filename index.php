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
            box-shadow: 0 3px none;
            padding: 4px;
            color: black;
        }
        #row .col-sm-2{
            width: 20em;
            

        
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
                  <li><a style="color: #007bff;" href="#">Trang chủ</a></li>
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
    <div class="col-md-7 col-md-offset-1" style="height: auto;">
    <button style="margin: 20px 0px 30px 70px; type="button" class="btn btn-primary">BÀI VIẾT MỚI</button>
        <div class="container">
            <!-- Example row of columns -->
            <div>
                <div class="col-xs-11" >
                    <table style="width: 100%; margin-left: 40px;" >
                    <?php
                    $result= mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id order by post_date ASC ") or die ("Lỗi hiển thị");
                    while ($r = mysqli_fetch_array($result)){

//                        echo "<h3>".$r["title"]."</h3>";

                        echo "
                                <tr>
                                    <td rowspan='4'>
                                        <img src='".$r["image_url"]."' alt='...' style='width: 250px; height: 150px; '>
                                        
                                    </td>
                               
                                     <td style='float: left;margin-bottom: -10px;'>
                                        <p><b style='font-size: 20px;'>".$r["title"]."</b></p><br>
                                    </td>
                                   
                                  
                                    
                                </tr>
                                <tr>
                                 <td style='margin-bottom: -10px;'>
                                        <h5><em>Ngày đăng: ".$r["post_date"]." --- Người tạo: ".$r["username"]."</em></h5><em></td>
                                </tr>
                                <tr>
                                    <td style='float: left;'>
                                        <h5>";
                                if(strlen($r["content"]) > 100)
                                    $cOutput = mb_substr($r["content"], 0, 99, "UTF-8");
                                    echo $cOutput . "...";
                                    echo "</h5>
                                                </td>
                                                <td> </td><td> </td>
                                      
                                                
                                            </tr>
                                            <tr>
                                            <td>
                                            <p><a class='btn btn-default' href='detail.php?id=".$r['post_id']."' role='button'>Xem chi tiết &raquo;</a></p>
                                                </td>
                                    </tr>
                                    
                                     
                                    ";

                    }
                                    ?>
<!--                    <td rowspan='100%' width='20%'>-->
<!---->
<!--                        <div >-->
<!--                            <h3 >Người dùng</h3>-->
<!--                            <p>-->
<!--                                <img src='assets/css/img/avatar2.jpg' alt='...' class='img-circle'><a style='text-decoration: none; color: black;'>&emsp;Trần Văn Kiệt</a>-->
<!--                            </p>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    </td>-->
                        </div>
                    </div>
            </div>

</body>
</html>