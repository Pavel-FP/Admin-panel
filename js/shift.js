let startBtn = document.getElementById('start');

let hour = 0;
let minute = 0;
let second = 0;
let count = 0;
let clickcount = 0;
let countString = "0";

function stopWatch() {
if (timer == true) {
	count++;


if (count == 100) {
	second++;
	count = 0;
}

if (second == 60) {
	minute++;
	second = 0;
}

if (minute == 60) {
	hour++;
	minute = 0;
	second = 0;
}

let hrString = String(hour);
let minString = String(minute);
let secString = String(second);

if (second < 10) {
	secString = "0" + secString;
}

if (hour < 10) {
	hrString = "0" + hrString;
}

if (minute < 10) {
	minString = "0" + minString;
}

document.getElementById('hr').innerHTML = hrString;
document.getElementById('min').innerHTML = minString;
document.getElementById('sec').innerHTML = secString;
setTimeout(stopWatch, 10);
}
}

const btn = document.getElementById('start');
btn.addEventListener('click', function handleClick() {
  const initialText = 'Открыть смену';

  if (btn.textContent.toLowerCase().includes(initialText.toLowerCase())) {
    btn.textContent = 'Закрыть смену';
  } else {
    btn.textContent = initialText;
  }
});


function clickerChecker(clickcount, hour, minute, second, count, countString) {
	if (clickcount == 1) {
		timer = true;
		stopWatch();
	}

	if (clickcount == 0) {
		timer = false;
		document.getElementById('hr').innerHTML = "00";
		document.getElementById('min').innerHTML = "00";
		document.getElementById('sec').innerHTML = "00";
	}
}

startBtn.addEventListener('click', function() {
	clickcount += 1;
	if (clickcount == 2) {
		clickcount = 0
		hour = 0;
		minute = 0;
		second = 0;
		count = 0;
	}
	clickerChecker(clickcount, hour, minute, second, count, countString);
});



//тварь на времени нажатия на кнопку
function formatTime(data) {
    return (new Intl.DateTimeFormat("ru", {
        hour: "2-digit",
        minute: "2-digit",
    })).format(data)
}

function init() {
    var button = document.getElementById("start");
    button.onclick = handleButtonClick;
}

function handleButtonClick() {
    var today = new Date;
    today = formatTime(today);
    document.getElementById("lastTime").innerHTML = today;
    localStorage.lastData = today
};
window.onload = init;
