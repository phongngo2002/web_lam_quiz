import { setError,setSuccess } from "./funtion.js";
const btnSubmit = document.getElementById("btnSubmit");
btnSubmit.addEventListener('click',function(){
    let isValid = checkValidate();
    if(isValid){
        document.getElementById("form-login").submit();
    }
});
const FormEmail = document.getElementsByName("form-email")[0];
const FormPassword = document.getElementsByName("form-password")[0];

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function checkValidate(){
    let ValueEmail = FormEmail.value;
    let ValuePassword = FormPassword.value;
    let isCheck = true;
    if(ValueEmail == ''){
        setError(FormEmail,'Email không được để trống');
        isCheck = false;
    }else if(isEmail(ValueEmail) == false){
        setError(FormEmail,'Email không đúng định dạng');
        isCheck = false;
    }
    else{
        setSuccess(FormEmail);
    }
    if(ValuePassword == ''){
        setError(FormPassword,'Password không được để trống');
        isCheck = false;
    }else{
        setSuccess(FormPassword);
    }
    return isCheck;
};
const inputEles = document.querySelectorAll('.form-group');

btnSubmit.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
});
