<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leikkitreffit</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
    <script>
    let date = new Date();
    function prevMonth() {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
    }
    function nextMonth() {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
    }
    </script>
</head>
<body id="indexBody">
<?php
include('palautelomake.php');
if(isset($_GET['status']) && $_GET['status'] == 'success') {
    echo '<p id="successmsg">Kiitos palautteestasi!</p>';
    }
?>
    <header>
        <div class="topnav"> <!-- Top Navigation Menu -->
            <a href="index.php" class="active"><h1>LeikkiTreffit</h1></a>
            <div id="myLinks"> <!-- Navigation links (hidden by default) -->
                <a href="index.php#about" id="firstItem">Mikä on LeikkiTreffit?</a>
                <a href="index.php#kalenteri">Tapahtumakalenteri</a>
                <a href="login.php">Kirjaudu sisään</a>
                <a href="rekisterointi.html">Liity yhteisöön</a>
                <a href="index.php#palautelomake" id="lastItem">Palautelomake</a>
            </div>
            <a href="login.php" class="loginIcon"> <!-- Linkki sisäänkirjautumiseen -->
                <i class="fas fa-sign-in-alt"></i>
            </a>
            <a href="javascript:void(0);" class="hamburgerIcon" onclick="myFunction()" onmouseover="myFunction()"> <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <main>
        <div id="div1">
            <h2 id="about">Mikä on LeikkiTreffit?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh justo, dapibus non dignissim in, eleifend et sem.</p><br>
            <a href="#">Lue lisää</a>
        </div>
        <div id="div2">
            <h2 id="kalenteri">Tapahtumakalenteri</h2>
            <div class="calendar">
                <div class="month">
                    <i class="fas fa-angle-left" id="prev"></i>
                    <div class="date">
                        <h3></h3>
                        <p></p>
                    </div>
                    <i class="fas fa-angle-right" id="next"></i>
                </div>
                <div class="weekdays">
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                    <div>Sun</div>
                </div>
                <div class="days"></div>
            </div>
        </div>
        <div id="div3">
            <h2 id="palautelomake">Palautelomake</h2><br>
            <form action="index.php" method="post">
                <div>
                <label for="fname">* Etunimi:</label>
                <input type="text" id="fname" name="etunimi" placeholder="Matti" size="37" minlength="2" maxlength="30" required>
                </div>
                <div>
                <label for="lname">* Sukunimi:</label>
                <input type="text" id="lname" name="sukunimi" placeholder="Meikäläinen" size="37" minlength="2" maxlength="40" required>
                </div>
                <div>
                <label for="email">* Sähköposti:</label>
                <input type="email" id="email" name="sposti" placeholder="matti.meikalainen@gmail.com" pattern="^[\w._%+-]+@[\w.-]+\.[a-z]{2,}$" size="37" required>
                </div>
                <div>
                <label for="viesti">* Palaute:</label>
                <textarea name="viesti" id="viesti" rows="10" cols="40" placeholder="Kirjoita viestisi tähän." maxlength="1000"></textarea>
                </div>        
                <input type="submit" name="submitbutton" value="Lähetä">
            </form><br>
            <p>*Tähdellä merkityt kohdat ovat pakollisia.</p><br>
            <p><a href="#" id="ylos">Takaisin ylös</a></p><br>
        </div>
    </main>
    <footer>
        <p class="copyright">Copyright 2022, LeikkiTreffit - <a href="#">Tietosuojaseloste</a></p>
        <ul id="socialmedia">
            <li><a href="#" target="_blank" class="social"><img src="https://img.icons8.com/color/40/000000/twitter-circled--v1.png" alt="twitter"></a></li>
            <li><a href="#" target="_blank" class="social"><img src="https://img.icons8.com/fluency/40/000000/instagram-new.png" alt="instagram"></a></li>
            <li><a href="#" target="_blank" class="social"><img src="https://img.icons8.com/color/40/000000/facebook-new.png" alt="facebook"></a></li>
        </ul>
    </footer>
    <script src="script.js"></script>
</body>
</html>