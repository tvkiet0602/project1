<?
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';
    if(isset($_POST['submit'])){
        echo "123";
    }
    else{echo"456";}
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $avatar   = $_FILES['avatar']['name'];
    $avt_temp = $_FILES['avatar']['name_temp'];
    echo $username;
    $qr = mysqli_query($con, "INSERT INTO users (username, password, fullname, avatar, email) VALUES('$username', '$password', '$fullname', '$avt_temp', '$email')") or die ("Lỗi truy vấn");
    $result = mysqli_fetch_array($qr);
    move_uploaded_file($avt_temp, './asset./css/img/'.$avt_temp);

    if($result){
        header ("location: ./login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng ký</title>
    <style>
        *{
            padding: 0;
            box-sizing: border-box;
            margin: 0;
        }
        html{
            font-family: Arial, Helvetica, sans-serif;

        }
        #dangky{
            text-align: center;
            margin-left: 35%;
            margin-top: 5%;
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

        .signup input{
            padding: 10px 15px;
            margin: 0px 10px 30px;
            width: 90%;
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
            /*background: cornsilk;*/
        }
    </style>



</head>
<body>
<section style="color: red; text-align: center;"><?= isset ($alert) ? $alert : '' ?></section>
<form id="signup-form" method="POST" action="signup.php" enctype="multipart/form-data" >
    <div id="dangky">
        <div class="email-pwd">
            <h1 style="margin-top: 40px;">ĐĂNG KÝ</h1><br>
            <h5><i>Vui lòng nhập vào biểu mẫu bên dưới để đăng ký tài khoản</i></h5>
            <div class="signup">
                <input type="text"  style="margin-top: 50px;" name="fullname"  placeholder="Họ và tên" required>
                <input type="text" name="username"  placeholder="Tên tài khoản" required><br>
                <input type="password"  name="password"  placeholder="Mật khẩu" required><br>
                <input type="password" placeholder="Nhập lại mật khẩu" name="psw-repeat" required>
                <input type="text"  name="email"  placeholder="Email" required><br>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh đại diện</label>
                    <input name = "avatar" class="form-control" type="file" id="formFile">
                </div>

            </div>
            <input class="sub" type="submit" style="padding: 5px;  width: 85%;" name="submit" value="Đăng ký">
        </div>
    </div>
</form>

</body>
</html>