import { setError,setSuccess } from "./funtion.js";
const btnSubmit = document.getElementById("form-submit");
btnSubmit.addEventListener('click',function(){
    let isValid = checkValidate();
    if(isValid){
        document.getElementById("form-quiz").submit();
    }
});
const FormName = document.getElementsByName("name")[0];
const FormTg = document.getElementsByName("tg_lam")[0];
const FormStartTime = document.getElementsByName("tg_mo")[0];
const FormEndTime = document.getElementsByName("tg_dong")[0];
const FormSubject = document.getElementsByName("mon_hoc")[0];

function checkValidate(){
    let ValueName = FormName.value;
    let ValueTg = FormTg.value;
    let ValueStart = FormStartTime.value;
    let ValueEnd = FormEndTime.value;
    let ValueSubject = FormSubject.value;
    let isCheck = true;
    if(ValueName == ''){
        setError(FormName,'Tên quiz không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormName);
    }
    if(ValueTg == 0){
        setError(FormTg,'Thời gian làm không được được bằng 0');
        isCheck = false;
    }
    else if(ValueTg < 0){
        setError(FormTg,'Thời gian làm không được nhỏ hơn 0');
        isCheck = false;
    }
    else{
        setSuccess(FormTg);
    }
    if(ValueStart > ValueEnd){
        setError(FormEndTime,'Thời gian đóng không được muộn hơn thời gian mở');
        isCheck = false;
    }
    else if(ValueStart == null){
        setError(FormStartTime,'Thời gian mở quiz không được để trống');
        isCheck = false;
    }
    else if(ValueEnd == null){
        setError(FormEndTime,'Thời gian đóng quiz không được để trống');
        isCheck = false;
    }
    else{
        setSuccess(FormStartTime);
        setSuccess(FormEndTime);
    }
    if(ValueSubject == 0){
        setError(FormSubject,'Không được để trống môn học');
        isCheck = false;
    }else{
        setSuccess(FormSubject);
    }
    return isCheck;
};
const inputEles = document.querySelectorAll('.form-input');

btnSubmit.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
});
