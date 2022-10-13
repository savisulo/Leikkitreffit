<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef5cad2b65.js" crossorigin="anonymous"></script>
    <title>Leikkitreffit</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body>
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
            <a href="login.php" class="firstIcon"> <!-- Linkki sisäänkirjautumiseen -->
                <i class="fa-regular fa-arrow-right-to-bracket"></i>
            </a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
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
            <h2 id="palautelomake">Palautelomake</h2>
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
        <?php
        $palvelin = "localhost";
        $kayttaja = "root";
        $salasana = "";
        $tietokanta = "leikkitreffit";
    
        // luo yhteys
        $yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
        // jos yhteyden muodostaminen ei onnistunut, keskeytä
        if ($yhteys->connect_error) {
            die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
        }
        // aseta merkistökoodaus (muuten ääkköset sekoavat)
        $yhteys->set_charset("utf8");
    
        if(isset($_POST['submitbutton']) && $_POST['etunimi'] != null && $_POST['sukunimi'] != null && $_POST['sposti'] != null && $_POST['viesti'] != null) {
            submitbuttonLomake();
        }
    
        function submitButtonLomake() {
            global $yhteys;
            // katso vielä tämä kohta
            $yhteydenotto = "INSERT INTO palautteet (etunimi, sukunimi, sposti, viesti) VALUES ('".$_POST['etunimi']."', '".$_POST['sukunimi']."', '".$_POST['sposti']."', '".$_POST['viesti']."')";
            $lisays = $yhteys->query($yhteydenotto);
            if ($lisays === TRUE) {
                echo "Kiitos palautteestasi!<br>";
            } else {
                echo "Virhe: " . $yhteydenotto . "<br>" . $yhteys->error;
            }
        }
        ?>
        <br>
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