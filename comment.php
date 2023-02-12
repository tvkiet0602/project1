<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("location: ./login.php");
    }
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date('Y-m-d h:i:s');
    if(isset($_POST['comment'])){
        $comment = $_POST['comment'];
        if(isset($_SESSION['username'])){
            $r =  mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users, blog_posts")) or die("Lỗi truy vấn id");
            $user_id = $r['user_id'];
            $post_id = $r['post_id'];
            $result = mysqli_query($con, "INSERT INTO comment_posts(user_id, post_id, comment, time) 
                                        VALUES ('$user_id', '$post_id', '$comment', '$time')") or die("Lỗi truy vấn thêm bình luận");
            if($result){
                header("location: ./detail.php?id=".$post_id);
            }
        }
    }



?>