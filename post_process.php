<?php
    session_start();
    include 'connect.php';
    header("Content-Type: text/html; charset-UTFF-8");

//    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $is_private = $_POST['is_private'];
//    $post_date = $_POST['post_date'];
    $now = date_create()->format('Y-m-d H:i:s');
    $post_date = $now;

    $user_id = mysqli_query($con, "SELECT * FROM users u JOIN blog_posts b ON u.user_id = b.user_id ") or die ("Lỗi truy vấn user_id");
    $result = mysqli_query($con, "INSERT INTO blog_posts(user_id, title, content, image_url, is_private, post_date)
    VALUES ('$user_id', '$title', '$content' '$image_url', '$is_private', '$now' )") or die ("Lỗi truy vấn blog_posts");

    if ($result){
//        header("location: ./post.php");
        echo"jkjjj";
    }

?>