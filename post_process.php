<?php

    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];
    $is_private = $_POST['is_private'];
    $post_date = $_POST['post_date'];
    if(isset($_SESSION["username"])){
    $user_id = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE user_id = '$user_id'") or die ("Lỗi truy vấn user_id"));
    $user_id = $user_id['ID'];
    $result = mysqli_query($con, "INSERT INTO blog_posts(user_id, title, content, image_url, is_private, post_date)
    VALUES ('$user_id', '$title', '$content' '$image_url', '$is_private', '$post_date')") or die ("Lỗi truy vấn blog_posts");
    }
?>