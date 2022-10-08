/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
    x.style.display = "none";
    } else {
    x.style.display = "block";
    }
}
/*
Asetetaan kalenteriin näkymään nykyinen kuukausi:
date-muuttujaksi valitaan selaimen paikallinen aika ja months-muuttuja sisältää taulukkona
kaikki 12 kuukautta, alkaen indeksinumerosta 0. getMonth.metodilla haetaan date-muuttujasta
nykyisen kuukauden indeksinumero ja querySelectorilla valitaan dokumentista h3-tason
otsikko .date-divista ja muutetaan se haetun indeksinumeron perusteella sanallisesti oikeaksi
kuukaudeksi, joka on määritelty months-muuttujan taulukossa täsmäävän indeksinumeron perusteella.
*/
const date = new Date();

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

document.querySelector(".date h3").innerHTML = months[date.getMonth()];

/* Asetetaan kuukauden alapuolelle kalenteriin näkymään nykyinen pvm:
*/
document.querySelector(".date p").innerHTML = date.toDateString();

/* Edellisen kuukauden päivät */
const firstDayIndex = date.getDay();
const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
console.log(prevLastDay);

/* Kuukauden päivät */
const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
let days = "";

for(let i = 1; i <= lastDay; i++) {
    days += `<div>${i}</div>`;
}

document.querySelector(".days").innerHTML = days;