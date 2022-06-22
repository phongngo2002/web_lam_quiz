const tg = document.getElementById("the-span");
if (tg) {
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 60 * tg.dataset.minutes,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
}

const theSubmit = document.querySelector('#form-tra-loi');
setTimeout(function () {
        theSubmit.submit();
}, tg.dataset.minutes * 60 * 1000);












history.pushState(null, null, document.title);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.title);
});