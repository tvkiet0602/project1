<?php
    session_start();
    include 'connect.php';
    header("Content-Type: text/html; charset-UTFF-8");

//    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $is_private = $_POST['is_private'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $post_date = date('Y-m-d h:i:s');
    $image_url   = $_FILES['image_url']['name'];
    $img_temp = $_FILES['image_url']['img_temp'];
    if(isset($_SESSION["username"])){
        $qr= mysqli_query($con, "SELECT * FROM blog_posts, users  WHERE blog_posts.user_id = users.user_id ") or die ("Lỗi nhận user_id");
        $r = mysqli_fetch_array($qr);
        $id = $r['user_id'];
        $result = mysqli_query($con, "INSERT INTO blog_posts(user_id, title, content, image_url, is_private, post_date)
            VALUES ('$id', '$title', '$content', '$img_temp', '$is_private', '$post_date' )") or die ("Lỗi truy vấn blog_posts");
        move_uploaded_file($img_temp, './asset./css/img/'.$img_temp);
        if ($result) {
            header("location: ./index.php");
        }
    }

//        if($r['username'] == $_SESSION['$username']) {
//            $get_userid = $r['user_id'];

////
////        }
//    }



//    $user_id = mysqli_query($con, "SELECT * FROM users u JOIN blog_posts b ON u.user_id = b.user_id ") or die ("Lỗi truy vấn user_id");
//


?>