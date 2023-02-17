<?php
    if(isset($_POST['btn-signup'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pswrepeat = $_POST['pswrepeat'];
        $email = $_POST['email'];
        $avatar   = $_FILES['avatar']['name'];
        $avt_temp = $_FILES['avatar']['name_temp'];
        if($password != $pswrepeat){
            header("location:login.php");
            setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
        }
        else{
            $password = md5($password);
            mysqli_query($con, "INSERT INTO users(fullname, username, password, email, avatar) VALUES ('$fullname', '$username', '$password', '$email',  '$avatar')");

            header("location:login.php");
            setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
        }

        move_uploaded_file($avt_temp, './assets/css/avatar/'.$avatar);
        if($result){
                window.alert("Đăng ký thành công!");
                header ("location: ./login.php");

        }
    }

?>