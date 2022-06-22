import { setError,setSuccess } from "./funtion.js";
const btnSubmit = document.getElementById("btn-submit");
btnSubmit.addEventListener('click',function(){
    let isValid = checkValidate();
    if(isValid){
        document.getElementById("form-frist-answer").submit();
    }
});
const FormAnswer1 = document.getElementsByName("form-answer1")[0];
const FormAnswer2 = document.getElementsByName("form-answer2")[0];
const FormAnswer3 = document.getElementsByName("form-answer3")[0];
const FormAnswer4 = document.getElementsByName("form-answer4")[0];
function checkValidate(){
    let answer1 = FormAnswer1.value;
    let answer2 = FormAnswer2.value;
    let answer3 = FormAnswer3.value;
    let answer4 = FormAnswer4.value;
    let isCheck = true;
    
    if(answer1 == ''){
        setError(FormAnswer1,'Nội dung đáp án không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormAnswer1);
    }
    if(answer2 == ''){
        setError(FormAnswer2,'Nội dung đáp án không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormAnswer2);
    }
    if(answer3 == ''){
        setError(FormAnswer3,'Nội dung đáp án không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormAnswer3);
    }
    if(answer4 == ''){
        setError(FormAnswer4,'Nội dung đáp án không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormAnswer4);
    }
    return isCheck;
};
const inputEles = document.querySelectorAll('.form-input');

btnSubmit.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
});
