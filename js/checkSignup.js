
function check{
    var err = "";
    var fullname = document.getElementById("fullname");
    if(fullname.value == ""){
        fullname.className = "err";
        err += "Họ và tên không được bỏ trống!<br>"
    }
    else if(username.value == ""){
        username.className = "err";
        err += "Tên đăng nhập không được bỏ trống!<br>"
    }
    else if(password.value.length !=6){
        password.className = "err";
        err += "Mật khẩu phải từ 6 ký tự<br>"
    }

}