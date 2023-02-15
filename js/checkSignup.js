
    var fullname = document.querySelector('#fullname')
    var username = document.querySelector('#username')
    var password = document.querySelector('#password')
    var pswrepeat = document.querySelector('#pswrepeat')
    var email = document.querySelector('#email')
    var avatar = document.querySelector('#avatar')
    var form = document.querySelector('form')
    function showCheck(input, message){
        let parent = input.parentElement;
        let span = parent.querySelector('span');
        parent.classList.add('error')
        span.innerText = message
    }
    function showSuccess(input){
        let parent = input.parentElement;
        let span = parent.querySelector('span');
        parent.classList.remove('error')
        span.innerText = ''
    }
    function checkEmail(input){
        const regexEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        input.value = input.value.trim()
        let isEmailError = regexEmail.test(input.value)
        if(regexEmail.test(input.value)){
            showSuccess(input)
        }
        else{
            showCheck(input, 'Email không hợp lệ!')
        }
        return isEmailError
    }
    function checkEmpty(listInput){
        let isEmpty = false;
        // if(avatar.files.length == 0){
        //     avatar.querySelector('span').innerText = 'Chọn ảnh đại diện!'        // console.log(avt.files[0].size)
        // }
        listInput.forEach(input => {
            input.value = input.value.trim()
            if(!input.value){
                isEmpty = true;
                showCheck(input, 'Không được bỏ trống!')
            }else{
                showSuccess(input)
            }
        });
        return isEmpty;
    }

    function checkLength(input, min, max){
        input.value = input.value.trim()
        if(input.value.length < min){
            showCheck(input, 'Phải có ít nhất ' + min + ' ký tự')
            return true
        }
        if(input.value.length > max){
            showCheck(input, 'Không được vượt quá ' + max + ' ký tự')
            return true
        }
        // showSuccess(input)
        return false
    }
    function checkMatchPass(passInput, rpPassInput){
        if(passInput.value !== rpPassInput.value){
            showCheck(rpPassInput, 'Mật khẩu không trùng khớp')
            return true
        }
        return false
    }
    function checkAvatar(){
        if(avatar.files.length == 0){
            showCheck(avatar, 'Không được bỏ trống ảnh đại diện!')
            // return true
            console.log(avatart.files[0].size)
        }
        // return false
    }
    form.addEventListener('submit', function (e){
        e.preventDefault()

        let isEmpty = checkEmpty([fullname, username, password, pswrepeat, email])
        let isEmailError = checkEmail(email)
        let isUernameLenghth = checkLength(username, 3, 12)
        let isPasswordLenghth = checkLength(password, 6, 32)
        let ischeckMatchPass = checkMatchPass(password, pswrepeat)
        let ischeckAvatar = checkAvatar()

        // if(isEmpty || isEmailError || isUernameLenghth || isPasswordLenghth || ischeckMatchPass){
        // }
        // else{
        //     console.log(username)
        // }
    })
