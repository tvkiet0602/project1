var username = document.querySelector('#username')
var password = document.querySelector('#password')
var form = document.querySelector('form')
function showCheckLogin(input, message){
    let parent = input.parentElement;
    let span = parent.querySelector('span');
    parent.classList.add('error')
    span.innerText = message
}
function showSuccessLogin(input){
    let parent = input.parentElement;
    let span = parent.querySelector('span');
    parent.classList.remove('error')
    span.innerText = ''
}

function checkEmptyLogin(listInput){
    let isEmpty = false;
    // if(avatar.files.length == 0){
    //     avatar.querySelector('span').innerText = 'Chọn ảnh đại diện!'        // console.log(avt.files[0].size)
    // }
    listInput.forEach(input => {
        input.value = input.value.trim()
        if(!input.value){
            isEmpty = true;
            showCheckLogin(input, 'Không được bỏ trống !')
        }else{
            showSuccessLogin(input)
        }
    });
    return isEmpty;
}

form.addEventListener('submit', function (e){
    e.preventDefault()

    let isEmpty = checkEmptyLogin([password, username])
    // let ischeckMatchPass = checkMatchPass(password, pswrepeat)


})