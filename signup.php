<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Trang Đăng ký</title>
    <style>
        *{
            padding: 0;
            box-sizing: border-box;
            margin: 0;
        }
        html{
            font-family: Arial;

        }
        body{
            background: cornsilk;
        }
        .js_sign span{
            color: #e74c3c;
            float: left;
            margin-left: 40px;
        }
        .js_sign label{
            float: left;
            margin-left: 40px;
        }
        #register .sub:hover{
            background-color: #3c763d;
        }
    </style>
</head>
<body>

<?php
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';

    if(isset($_POST['btn-signup'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $password = md5($password);
        $avatar = $_FILES['avatar']['name'];
        $avt_temp = $_FILES['avatar']['name_temp'];
        $result = mysqli_query($con, "INSERT INTO users(fullname, username, password, email, avatar) VALUES ('$fullname', '$username', '$password', '$email',  '$avatar')") or die ("Lỗi");
        move_uploaded_file($avt_temp, './assets/css/avatar/'.$avatar);
        if ($result) {
//                    window . alert("Đăng ký thành công! Chào mừng bạn đến với Website MyBlog!");
            header("location: ./login.php");
        }
    }

//        }
//    }//        if ($username == "" || $password == "" || $pswrepeat == "" || $fullname == "" || $email == "" || $avatar == "") {
////            echo "Bạn vui lòng nhập đầy đủ thông tin";
////        } else {
//            // Kiểm tra tài khoản đã tồn tại chưa
////            $kt = mysqli_query($con, "select * from users where username='$username'");
////
////            if (mysqli_num_rows($kt) > 0) {
////                echo "Tài khoản đã tồn tại";
////            } else {
?>

<form  method="POST" name="myForm" enctype="multipart/form-data" action="signup.php ">
    <div id="register">
        <div>
            <h1>ĐĂNG KÝ</h1><br>
            <h5><i>Vui lòng nhập vào biểu mẫu bên dưới để đăng ký</i></h5>
            <div class="signup">
                <div class="js_sign">
                    <span></span>
                    <input type="text" name="fullname" id="fullname" class="txt" placeholder="Họ và tên" "><br>
                </div>
                <div class="js_sign">
                    <span></span>
                    <input type="text" name="username" id="username" placeholder="Tên tài khoản"><br>
                </div>
                <div class="js_sign">
                    <span></span>
                    <input type="password"  name="password" id="password" placeholder="Mật khẩu"><br>
                </div>
                <div class="js_sign">
                    <span></span>
                    <input type="password" id="pswrepeat" placeholder="Nhập lại mật khẩu" name="pswrepeat">
                </div>
                <div class="js_sign">
                    <span></span>
                    <input type="email" id="email" name="email"  placeholder="Email">
                </div>
                <div class="js_sign">
                    <label for="formFile" class="form-label">Chọn ảnh đại diện</label><br>
                    <span></span>
                    <input type="file" name="avatar" id="avatar" class="form-control" >
                </div>
            </div>
            <input type="submit" class="sub" name="btn-signup"  value="Đăng ký">
        </div>
    </div>
</form>

<script src="./js/checkSignup.js"></script>

<script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>
</html>