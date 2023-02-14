    const username = document.getElementById('username');
    const password = document.getElementById('password');
    function checkValidate(){
        let usernameValue = username.value;
        let passwordValue = password.value;
        let isCheck = true;


        usernameValue.onblur = function (){
            // Kiểm tra username
            if (usernameValue == '') {
                setError(username, 'Tên đăng nhập không được để trống');
                isCheck = false;
            } else {
                setSuccess(username);
            }
        }
        return isCheck;

    }
// function checkUsername(){
//     var username = document.getElementById('username').value;
//
//     if (username == ''){
//         document.getElementById('username').style.= 'blue';
//         mess.innerHTML += 'Tên đăng nhập ko được để trống ';
//     } else if ((username.length > 0 && username.length < 32) || username.length > 3) {
//         document.getElementById('username').style.backgroundColor = 'black';
//         mess.innerHTML += 'Tên đăng nhập từ 3-32 kí tự ';}
//     else mess.innerHTML = 'Tên đăng nhập của bạn là :' + username + '';
//
//     username.onblur = function (){
//     }
// }
// function checkPass() {
//     var password = document.getElementById('password');
//     var mess = document.getElementById('errorText');
//     if (password == '') {
//         document.getElementById('password').style.backgroundColor = 'red';
//         mess.innerHTML += 'Mật khẩu ko được để trống ';
//     } else mess.innerHTML += 'Mật khẩu của bạn là ' + Array(password.length + 1).join("*") + '';
// }
//
// checkUsername();
// checkPass();
    checkValidate();