import { setError,setSuccess } from "./funtion.js";
const btnSubmit = document.getElementById("btn-submit");
btnSubmit.addEventListener('click',function(){
    let isValid = checkValidate();
    if(isValid){
        document.getElementById("form-answer-edit").submit();
    }
});
const FormAnswer = document.getElementsByName("form-answer")[0];
function checkValidate(){
    let answer = FormAnswer.value;
    let isCheck = true;
    
    if(answer == ''){
        setError(FormAnswer,'Nội dung đáp án không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormAnswer);
    }
    return isCheck;
};
const inputEles = document.querySelectorAll('.form-input');

btnSubmit.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
});
