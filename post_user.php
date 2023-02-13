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

        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial;
            padding: 10px;
            background: #e9d8f4;
        }

        #row button{
            margin-left: 30px;
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

                    <?php
                    $number = !empty($_GET['per_page'])?$_GET['per_page']:3;
                    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                    $offset = ($current_page - 1) * $number;
                    $result= mysqli_query($con, "SELECT * FROM blog_posts, users WHERE blog_posts.user_id = users.user_id AND blog_posts.user_id = '".$_GET['id']."' order by post_date ASC LIMIT ".$number." OFFSET ".$offset." ") or die ("Lỗi hiển thị");
                    $total = mysqli_query($con, "SELECT * FROM blog_posts");
                    $total = $total->num_rows;
                    $pages = ceil($total/$number);
                    $r = mysqli_fetch_array($result);
                    ?>
                    <button type="button" class="btn btn-primary"><?php echo "Blog - ".$r['fullname'];?></button>
                    <table>
                    <?php
                    while($r = mysqli_fetch_array($result)){
                        if($r['user_id'] == $_GET['id']){
                                echo "
                              <tr>
                                  <td rowspan='4'>
                                      <img src='./assets/css/img/".$r["image_url"]."' alt='Ảnh bài viết' vspace='20px' hspace='30px'>
                                  </td>
                                   <td style='font-size: 20px;'>
                                      <p><b>".$r["title"]."</b></p><br>
                                  </td>
                              </tr>
                              <tr>
                                   <td >
                                      <h5><em>Ngày đăng: ".$r["post_date"]." --- Người tạo: ".$r["fullname"]."</em></h5><em>
                                   </td>
                              </tr>
                              <tr>
                                  <td>
                                      <h5>";
                                if(strlen($r["content"]) > 100){
                                    echo mb_substr($r["content"], 0, 99, "UTF-8") . "...";
                                }
                                echo "</h5>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <p><a class='btn btn-default' href='detail.php?id=".$r['post_id']."' role='button'>Xem chi tiết &raquo;</a></p>
                                  </td>
                              </tr>";
                        }else echo"Người dùng ".$r['fullname']." chưa có bài viết nào!";
                    }?>
                </table>
                <div class="center">
                    <div class="pagination">
                        <?php
                        $id = $_SESSION['user_id'];
                        echo "<a href='#' >&laquo;</a>";
                        for($list=1; $list<=$pages; $list++){
                            if($list != $current_page){
                                ?>
                                <a href='?id=<?=$id?>&per_page=<?=$number?>&page=<?=$list?>'><?=$list?></a>
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
    </div>

</body>
</html>