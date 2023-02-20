<?php
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "select * from users where username='$username' and password = '$password' ";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);

        if($num_rows == 0){
             echo ("Username hoặc Password không đúng, vui lòng nhập lại! <br /> <a href='javascript: history.go(-1)'>Trở lại</a>");
             exit;
        }
        else{
            $result = mysqli_fetch_array($result);
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $result['user_id'];
                header('location: ./index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Trang Đăng nhập</title>
    <style>
        *{
            padding: 0;
            box-sizing: border-box;
            margin: 0;
        }
        html{
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background: cornsilk;
        }

    </style>
</head>
<body>
    <form method="POST" >
        <div id="login">
            <div class="email-pwd">
                <h1>ĐĂNG NHẬP</h1><br>
                <h5><i>Xin vui lòng nhập đầy đủ thông tin tài khoản</i></h5>
                <div class="log">
                    <input type="text"   name="username"  placeholder="Tên tài khoản" id="username" required autofocus/ ><br>
                    <span></span>
                    <input type="password"  name="password" id="password" placeholder="Mật khẩu" minlength="4" maxlength="32" required>
                    <span></span>

                </div>
                <input id="sub" class="sub" type="submit" name="submit" value="Đăng nhập"><br><br>
                <a href="signup.php">Đăng ký tài khoản</a>
            </div>
        </div>
    </form>
<!--    <script src='./js/checkLogin.js'></script>-->
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>