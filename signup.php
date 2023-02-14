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
    </style>
</head>
<body>

<?php
    header("Content-Type: text/html; charset-UTF-8");
    include 'connect.php';

    if(isset($_POST['btn-signup'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pswrepeat = $_POST['pswrepeat'];
        $email = $_POST['email'];
//        if ($username == "" || $password == "" || $pswrepeat == "" || $fullname == "" || $email == "" || $avatar == "") {
//            echo "Bạn vui lòng nhập đầy đủ thông tin";
//        } else {
            // Kiểm tra tài khoản đã tồn tại chưa
            $kt = mysqli_query($con, "select * from users where username='$username'");

            if (mysqli_num_rows($kt) > 0) {
                echo "Tài khoản đã tồn tại";
            } else {
                $password = md5($password);
                $avatar = $_FILES['avatar']['name'];
                $avt_temp = $_FILES['avatar']['name_temp'];
                $result = mysqli_query($con, "INSERT INTO users(fullname, username, password, email, avatar) VALUES ('$fullname', '$username', '$password', '$email',  '$avatar')");
            }
            move_uploaded_file($avt_temp, '/assets/css/avatar/' . $avatar);

            if ($result) {
                window . alert("Đăng ký thành công! Chào mừng bạn đến với Website MyBlog!");
                header("location: /index.php");
            }
        }
//    }
?>

<form  method="POST" name="myForm" enctype="multipart/form-data"  >
    <div id="dangky">
        <div>
            <h1>ĐĂNG KÝ</h1><br>
            <h5><i>Vui lòng nhập vào biểu mẫu bên dưới để đăng ký tài khoản</i></h5>
            <div class="signup">
                <input type="text" name="fullname" id="fullname" class="fullname" placeholder="Họ và tên" >
                <input type="text" name="username" id="username" placeholder="Tên tài khoản" ><br>
                <input type="password"  name="password" id="password" placeholder="Mật khẩu" ><br>
                <input type="password" id="pswrepeat" placeholder="Nhập lại mật khẩu" name="pswrepeat" >
                <input type="email" id="email" name="email"  placeholder="Email" >
                <label for="formFile"  class="form-label">Chọn ảnh đại diện</label>
                <input name="avatar" id="avatar" class="form-control" type="file" id="formFile">
            </div>
            <input type="submit" class="sub" name="btn-signup"  value="Đăng ký">
        </div>
    </div>
</form>

<!--<script type="text/javascript">-->
<!--    function validateForm(){-->
<!--        var fullname = document.forms["myForm"]["fullname"];-->
<!--        console.log(fullname);-->
<!--        if (ten == "") {-->
<!--            alert("Tên không được để trống");-->
<!--            return false;-->
<!--        }-->
<!--        var email = document.forms["myForm"]["email"].value;-->
<!--        var aCong = email.indexOf("@");-->
<!--        var dauCham = email.lastIndexOf(".");-->
<!--        if (email == "") {-->
<!--            alert("Email không được để trống");-->
<!--            return false;-->
<!--        }-->
<!--        else if ((aCong<1) || (dauCham<aCong+2) || (dauCham+2>email.length)) {-->
<!--            alert("Email bạn điền không chính xác");-->
<!--            return false;-->
<!--        }-->
<!--    }-->
<!---->
<!--</script>-->
<script src="./checkSignup.js"></script>
<script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>
</html>