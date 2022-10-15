/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
    x.style.display = "none";
    } else {
    x.style.display = "block";
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
            days += `<div class="today">${i}</div>`;
        } else {
            days += `<div>${i}</div>`;
        }
    }

    for(let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`
    }
    monthDays.innerHTML = days;
};

document.getElementById("prev").addEventListener("click", prevMonth);

document.getElementById("next").addEventListener("click", nextMonth);

renderCalendar();