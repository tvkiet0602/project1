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
        body {
            font-family: Arial;
            padding: 10px;
            background: #e9d8f4;
        }
        #row .rightcolumn .card{
            margin: 0px 0px;
        }


        /*.pagination a:first-child {*/
        /*    border-top-left-radius: 5px;*/
        /*    border-bottom-left-radius: 5px;*/
        /*}*/

        /*.pagination a:last-child {*/
        /*    border-top-right-radius: 5px;*/
        /*    border-bottom-right-radius: 5px;*/
        /*}*/

        
    </style>
</head>
<body>
<!--Header-->
    <div id="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <a class="navbar-brand" href="index.php">MyBlog</a>
            <ul  class="nav navbar-nav navbar-right">
              <li><a href="index.php">Trang chủ</a></li>
                <li><a  href="post.php">Tạo bài viết</a></li>
                <li><a  href="logout.php">Đăng xuất</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Tìm kiếm...">
            </form>
        </nav>
    </div><br><br><br>

<!--Container-->
<div id="row">
      <div class="leftcolumn">
          <div class="card"  style="min-height: 500px;">
              <button type="button" class="btn btn-primary">BÀI VIẾT MỚI</button>
              <table >
                  <?php

                    $number = !empty($_GET['per_page'])?$_GET['per_page']:3;
                    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                    $offset = ($current_page - 1) * $number;
                      $result= mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id AND blog_posts.is_private=0 order by post_date ASC LIMIT ".$number." OFFSET ".$offset." ") or die ("Lỗi hiển thị");
                      $total = mysqli_query($con, "SELECT * FROM blog_posts , users  WHERE blog_posts.user_id = users.user_id AND blog_posts.is_private=0 ");
                      $total = $total->num_rows;
                      $pages = ceil($total/$number);
                      while ($r = mysqli_fetch_array($result)){
                          if($r['is_private'] == 0){

                          echo "
                              <tr >
                                  <td rowspan='4'>
                                      <img src='./assets/css/img/".$r["image_url"]."' alt='Ảnh bài viết' vspace='20px' hspace='30px'  >
                                  </td>
                                   <td class='title-post'>
                                      <p><b >".$r["title"]."</b></p><br>
                                  </td>
                              </tr>
                              <tr>
                                   <td>
                                      <h5><em>Ngày đăng: ".$r["post_date"]." --- Người tạo: ".$r["fullname"]."</em></h5><em>
                                   </td>
                              </tr>
                              <tr>
                                  <td>
                                      <h5>";
                          if(strlen($r["content"]) > 100)
                              echo mb_substr($r["content"], 0, 99, "UTF-8") . "...";
                          echo "</h5>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <p><a class='btn btn-default' href='detail.php?id=".$r['post_id']."' role='button'>Xem chi tiết &raquo;</a></p>
                                  </td>
                              </tr>";
                          }
                      }?>
              </table>
              <div class="center">
                  <div class="pagination">
                      <?php
                      echo "<a href='#' >&laquo;</a>";
                        for($list=1; $list<=$pages; $list++){
                            if($list != $current_page){
                      ?>
                        <a href='?per_page=<?=$number?>&page=<?=$list?>'><?=$list?></a>
                        <?php
                            }
                            else{
                                echo "<strong class='btn btn-primary '>".$list."</strong>";
                            }
                        }
                          echo"<a href='#'>&raquo;</a>";
                        ?>
                  </div>
              </div>
          </div>
      </div>
        <div class="rightcolumn" >
            <div class="card">
                <h3>Người dùng</h3>
                <div class="fakeimg">
                    <p>
                        <?php
                        $qr= mysqli_query($con, "SELECT * FROM users ") or die ("Lỗi user");
                        while ($re = mysqli_fetch_array($qr)){
                            echo "
                                <p>
                                    <img src='".$re["avatar"]."' alt='...' class='img-circle' style='width: 70px; height: 60px;'>
                                    <a href='post_user.php?id=".$re['user_id']."' style='text-decoration: none; color: black;'>&emsp;".$re["fullname"]."</a>
                                </p>";
                        }
                        ?>
                    </p>
                </div>
            </div>
<!--            <div class="card">-->
<!--                <h3>Follow Me</h3>-->
<!--                <p>Facebook</p>-->
<!--                <p>YouTube</p>-->
<!--            </div>-->
        </div>
    </div>
</div>
</body>
</html>

