import { setError,setSuccess } from "./funtion.js";
const btnSubmit = document.getElementById("btn-submit");
btnSubmit.addEventListener('click',function(){
    let isValid = checkValidate();
    if(isValid){
        document.getElementById("form-subject").submit();
    }
});
const FormName = document.getElementsByName("name")[0];

function checkValidate(){
    let ValueName = FormName.value;
    let isCheck = true;
    
    if(ValueName == ''){
        setError(FormName,'Tên môn học không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormName);
    }
    return isCheck;
};
const inputEles = document.querySelectorAll('.form-input');

btnSubmit.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
});
