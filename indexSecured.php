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
</head>
<body id="indexBody">
<?php
include('secure.php');
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
                <a href="profile.php">Käyttäjätili</a>
                <a href="logout.php">Kirjaudu ulos</a>
                <a href="index.php#palautelomake" id="lastItem">Palautelomake</a>
            </div>
            <a href="logout.php" class="logoutIcon"><i class="fas fa-sign-out-alt"></i></a>
			<a href="profile.php" class="profileIcon"><i class="fas fa-user-circle"></i></a>
            <a href="javascript:void(0);" class="hamburgerIcon" onclick="myFunction()" onmouseover="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </header>
    <main>
        <div id="div1">
            <h2 id="about">Mikä on LeikkiTreffit?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh justo, dapibus non dignissim in, eleifend et sem.</p>
            <button id="button1" onclick="readMore()">Lue lisää >></button>
            <p id="lueLisaa">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id erat sodales, malesuada augue vitae, pulvinar orci.
                Nam at nisl sodales, volutpat quam ac, elementum est. Nullam mollis porttitor fringilla.
                Nam ipsum ipsum, semper a condimentum et, cursus vel mi. Vivamus sed est sit amet velit cursus accumsan eget at arcu.
                Vivamus ornare mi id nibh iaculis feugiat. Sed interdum quis sem quis finibus.
                Vivamus dui nulla, pretium eget faucibus sed, mattis vel mauris. Sed blandit tortor ut nunc malesuada, quis consequat elit iaculis.
                Duis gravida, velit ut malesuada mattis, nisl sapien hendrerit mi, non porta arcu nulla a diam.
                Fusce lectus mauris, egestas sed ultricies ac, ornare vitae sem. Aenean ac tortor dictum, laoreet sem porttitor, semper nisl.
                Proin gravida mattis laoreet. Maecenas vel posuere est. Nullam ligula felis, convallis fringilla dignissim id, ultricies nec ipsum.
                Praesent nec elementum elit.</p>
            <button id="button2" onclick="readLess()">Lue vähemmän</button>
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
                <input type="text" id="fname" name="etunimi" placeholder="Matti" minlength="2" maxlength="30" required>
                </div>
                <div>
                <label for="lname">* Sukunimi:</label>
                <input type="text" id="lname" name="sukunimi" placeholder="Meikäläinen" minlength="2" maxlength="40" required>
                </div>
                <div>
                <label for="email">* Sähköposti:</label>
                <input type="email" id="email" name="sposti" placeholder="matti.meikalainen@gmail.com" pattern="^[\w._%+-]+@[\w.-]+\.[a-z]{2,}$" size="37" required>
                </div>
                <div>
                <label for="viesti">* Palaute:</label>
                <textarea name="viesti" id="viesti" placeholder="Kirjoita palautteesi tähän." maxlength="1000"></textarea>
                </div>        
                <input type="submit" name="submitbutton" value="Lähetä">
            </form><br>
            <p>*Tähdellä merkityt kohdat ovat pakollisia.</p><br>
            <p><a href="#" id="button3">Takaisin ylös</a></p><br>
        </div>
    </main>
    <?php
    include('footer.html');
    ?>
    <script src="script.js"></script>
</body>
</html>