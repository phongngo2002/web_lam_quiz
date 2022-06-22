import { setError,setSuccess } from "./funtion.js";
const btnSubmit = document.getElementById("btnSubmit");
btnSubmit.addEventListener('click',function(){
    let isValid = checkValidate();
    if(isValid){
        document.getElementById("form-question").submit();
    }
});
const FormName = document.getElementsByName("form-name")[0];

function checkValidate(){
    let ValueName = FormName.value;
    let isCheck = true;
    
    if(ValueName == ''){
        setError(FormName,'Tiêu đề câu hỏi không được để trống');
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
