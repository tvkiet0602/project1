
<?php
session_start();
header("Content-Type: text/html; charset-UTF-8");
include 'connect.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
//    $password = md5($_POST['password']);
      $password = $_POST['password'];
    if ($username == '' || $password == ''){
        echo("Vui lòng nhập đẩy đủ thông tin tài khoản và mật khẩu!<br /> <a href='javascript: history.go(-1)'>Trở lại</a>");
        exit;
    }
    else{
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
                header('location: ./index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form method="POST" action="login.php" >
        <div id="login">
            <div class="email-pwd">
                <h1>ĐĂNG NHẬP</h1><br>
                <h5><i>Xin vui lòng nhập đầy đủ thông tin tài khoản</i></h5>
                <div class="log">
                    <input type="text"   name="username"  placeholder="Tên tài khoản" required><br>
                    <input type="password"  name="password"  placeholder="Mật khẩu" required>
                </div>
                <input class="sub" type="submit" name="submit" value="Đăng nhập"><br><br>
                <a href="signup.php">Đăng ký tài khoản</a>
            </div>
        </div>
    </form>
</body>
</html>