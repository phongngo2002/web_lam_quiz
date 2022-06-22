export function setError(ele,messeage){
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = messeage;
}
export function setSuccess(ele){
    ele.parentNode.classList.add('success');
}