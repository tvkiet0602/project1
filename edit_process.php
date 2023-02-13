<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location: ./login.php");
    }
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';
    if(isset($_POST['btn-edit'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $post_date = date('Y-m-d h:i:s');
        $qr = mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id AND post_id = ".$_GET['id']."") or die ("Lỗi nhận user_id");
        $r = mysqli_fetch_array($qr);

        $title = $r['title'];
        $content = $r['content'];
        $is_private = $r['is_private'];
        $image_url = $r['image_url'];
        $id = $r['user_id'];
        $post_id = $r['post_id'];
//    move_uploaded_file($img_temp, './assets/css/img/'.$image_url);
        $result = mysqli_query($con, "UPDATE blog_posts SET title = '$title', content = '$content', image_url = '$image_url', is_private = '$is_private', post_date = '$post_date' WHERE post_id = '$post_id'") or die ("Lỗi truy vấn blog_posts");
        if ($result) {
        header("location: ./detail.php?id=".$post_id);

        }
    }



?>