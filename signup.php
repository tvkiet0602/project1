<?
    session_start();
    include 'connect.php';
    header("Content-Type: text/html; charset-UTF-8");
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(isset($_POST['btn-upload'])) {
        $avatar   = $_FILES['avatar']['name'];
        $avt_temp = $_FILES['avatar']['name_temp'];
        $result = mysqli_query($con, "INSERT INTO users (fullname, username, password, email, avatar) VALUES('$fullname', $username', '$password', '$email',  '$avatar')") or die ("Lỗi truy vấn");
        move_uploaded_file($avt_temp, './assets/css/avatar/'.$avatar);
        echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

//        if($result){
//            header ("location: ./login.php");
//        }
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

<form method="POST" enctype="multipart/form-data" >
    <div id="dangky">
        <div>
            <h1>ĐĂNG KÝ</h1><br>
            <h5><i>Vui lòng nhập vào biểu mẫu bên dưới để đăng ký tài khoản</i></h5>
            <div class="signup">
                <input type="text" name="fullname" class="fullname" placeholder="Họ và tên" required>
                <input type="text" name="username"  placeholder="Tên tài khoản" required><br>
                <input type="password"  name="password"  placeholder="Mật khẩu" required><br>
                <input type="password" placeholder="Nhập lại mật khẩu" name="psw-repeat" required>
                <input type="text"  name="email"  placeholder="Email" required>
                <label for="formFile" class="form-label">Chọn ảnh đại diện</label>
                <input name="avatar" class="form-control" type="file" id="formFile">
            </div>
            <input class="sub" name="btn-upload" type="submit" value="Đăng ký">
        </div>
    </div>
</form>
</body>
</html>