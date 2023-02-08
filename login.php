
<?php
session_start();
header("Content-Type: text/html; charset-UTF-8");
include '.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if ($username == '' || $password == ''){
        echo("Vui lòng nhập đẩy đủ thông tin tài khoản và mật khẩu!<br /> <a href='javascript: history.go(-1)'>Trở lại</a>");
        exit;
    }
    
    else{
        $sql = "select * from user where username='$username' and password = '$password' ";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if($num_rows == 0){

            $alert = "Username hoặc Password không đúng, vui lòng nhập lại!";
        }
        else{
            $result = mysqli_fetch_array($result);
                $_SESSION['username'] = $username;
                header('location: ./index.php');
            // }
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
        #dangnhap{
            text-align: center;
            margin-left: 35%;
            margin-top: 10%;
            border: 2px solid rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            background-color: #FAFBFC;
            border: 2px solid #DFE1E6;
            box-shadow: rgb(0 0 0 / 10%) 0 0 10px;
            padding-bottom: 5em;
            width: 30%;
            position: relative;   
            font-size: 14px; 
        }
        
        .login{
            border: 2px;
            margin: 30px;
            width: auto;
        }

        .sub{
            background-color: #5AAC44; 
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0);
            cursor: pointer;
            font-size: 15px;
            color: #fff;
            font-weight: bold;
        }
        
        body{
            background: cornsilk;
        }
    </style>

    
</head>
<body>
<section style="color: red; font-weight: italic; text-align: center;"><?= isset ($alert) ? $alert : '' ?></section>
    <form id="login-form" method="POST" action="dangnhap.php" >
        <div id="dangnhap">
            <div class="email-pwd">
                <h1 style="margin-top: 40px;">ĐĂNG NHẬP</h1><br>
                <h5><i>Xin vui lòng nhập đầy đủ thông tin tài khoản</i></h5>
                <div class="login">
                    <input type="text"  style="padding: 10px 15px; margin-top: 20px; width: 100%;" name="username"  placeholder="Tên tài khoản"><br>
                    <input type="hidden" name="quyen">
                    <input type="password"  style="padding: 10px 15px; margin-top: 20px; width:100%;" name="password"  placeholder="Mật khẩu">
                </div>
                <input class="sub" type="submit" style="padding: 5px;  width: 85%;" name="submit" value="Đăng nhập">
            </div>
        </div>
    </form>
</body>
</html>