/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function readMore() {
    var x = document.getElementById("lueLisaa");
    var y = document.getElementById("button1");
    var z = document.getElementById("button2");
    x.style.display = "block";
    if (x.style.display === "block") {
        y.style.display = "none";
        z.style.display = "block";
    }
}

function readLess() {
    var x = document.getElementById("lueLisaa");
    var y = document.getElementById("button1");
    var z = document.getElementById("button2");
    x.style.display = "none";
    if (x.style.display === "none") {
        y.style.display = "block";
        z.style.display = "none";
    }
}

const renderCalendar = () => {

    let dateRender = new Date(date);

    dateRender.setDate(1);

    const monthDays = document.querySelector('.days');

    const lastDay = new Date(dateRender.getFullYear(), dateRender.getMonth() + 1, 0).getDate();

    const prevLastDay = new Date(dateRender.getFullYear(), dateRender.getMonth(), 0).getDate();

    const firstDayIndex = dateRender.getDay();

    const lastDayIndex = new Date(dateRender.getFullYear(), dateRender.getMonth() + 1, 0).getDay();

    const nextDays = 7 - lastDayIndex;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    document.querySelector('.date h3').innerHTML = months[date.getMonth()];

    document.querySelector('.date p').innerHTML = date.toDateString();

    let days = "";

    for(let x = firstDayIndex; x > 1; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 2}</div>`;
    }

    for(let i = 1; i <= lastDay; i++) {
        if (i === new Date().getDate() && dateRender.getMonth() === new Date().getMonth()) {
            days += `<div class="today" id="calendarEvent"><a href="tapahtuma.php" onclick="basicPopup(this.href,'myWindow','700','300','yes');return false">${i}</a></div>`;
        } else {
            days += `<div><a href="tapahtuma.php" onclick="basicPopup(this.href,'myWindow','700','300','yes');return false">${i}</a></div>`;
        }
    }

    for(let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`
    }
    monthDays.innerHTML = days;
};

document.getElementById("prev").addEventListener("click", prevMonth);

document.getElementById("next").addEventListener("click", nextMonth);

let date = new Date();

function prevMonth() {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
}

function nextMonth() {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
}

renderCalendar();

function basicPopup(url,winName,w,h,scroll) {
    LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
    TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
    settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
    popupWindow = window.open(url,winName,settings)
}