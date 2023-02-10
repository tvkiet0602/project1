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
        #row .col-sm-2 {
            width: 20em;
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

        .leftcolumn {
            float: left;
            width: 75%;
        }
        /* Cột phải */
        .rightcolumn {
            float: left;
            width: 25%;
            background-color: #e9d8f4;
            padding-left: 20px;
        }
        .fakeimg {
            background-color: #baa1cc;
            width: 100%;  padding: 20px;}
        /* Thêm định dạng thẻ cho bài viết */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;}
        /* Clear float khác sau các cột */

        /* Footer */
        .footer {
            padding: 10px;
            text-align: center;
            background: white;
            margin-top: 10px;
        }

        #row button{
            margin-left: 30px;
        }
        /* thiết lập style cho thẻ a */
        .pagination a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;

        }
        /* thêm màu nền khi người dùng hover vào class không active */
        .pagination a:hover{
            background-color: #ddd;
        }
        .pagination {
            display: inline-block;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }
        .pagination a:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .pagination a:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .center{
            text-align: center;
            margin-top: 20px;
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
                  <li><a style="color: #007bff;" href="#">Trang chủ</a></li>
                    <li><a style="color: #007bff;" href="post.php">Tạo bài viết</a></li>
                    <li><a style="color: #007bff;" href="#">Đăng xuất</a></li>
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
          <div class="card" style="margin: 0px 100px 0px 150px;">
              <button type="button" class="btn btn-primary">BÀI VIẾT MỚI</button>
              <table >
                  <?php
                        $number = !empty($_GET['per_page'])?$_GET['per_page']:3;
                        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                        $offset = ($current_page - 1) * $number;
                      $result= mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id order by post_date ASC LIMIT ".$number." OFFSET ".$offset." ") or die ("Lỗi hiển thị");
                      $total = mysqli_query($con, "SELECT * FROM blog_posts");
//                      var_dump($total);
                      $total = $total->num_rows;
                      $pages = ceil($total/$number);
                      while ($r = mysqli_fetch_array($result)){
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
                                      <p><a class='btn btn-default' href='detail.php?id=".$r['post_id']."' role='button'>Xem chi tiết &raquo;</a></p>
                                  </td>
                              </tr>";
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
<!--        User-->
        <div class="rightcolumn" style="margin-left: 0px;">

            <div class="card" style="margin: 0px 0px;">
                <h3>Người dùng</h3>
                <div class="fakeimg">
                    <p>
                        <?php
                        $qr= mysqli_query($con, "SELECT * FROM users ") or die ("Lỗi user");
                        while ($re = mysqli_fetch_array($qr)){
                                echo "
                                    <p>
                                        <img src='".$re["avatar"]."' alt='...' class='img-circle' style='width: 60px; height: 60px;'>
                                        <a href='post_user.php?id=".$re['user_id']."' style='text-decoration: none; color: black;'>&emsp;".$re["fullname"]."</a>
//                                    </p>";
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

