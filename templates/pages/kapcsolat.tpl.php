<?php require "includes/db.php"; ?>
<h2>Adatok:</h2>
<p>Ügyvezető: <strong>Valaki Az</strong></p>
<p>E-mail: <strong>valaki.az@minihonlap.hu</strong></p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3375296155727!2d19.66695091525771!3d46.89607994478184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sPallasz+Ath%C3%A9n%C3%A9+Egyetem+GAMF+Kar!5e0!3m2!1shu!2shu!4v1475753185783" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<br>
<a target="_blank" href="https://www.google.hu/maps/place/Pallasz+Ath%C3%A9n%C3%A9+Egyetem+GAMF+Kar/@46.8960799,19.6669509,17z/data=!3m1!4b1!4m5!3m4!1s0x4743da7a6c479e1d:0xc8292b3f6dc69e7f!8m2!3d46.8960763!4d19.6691396?hl=hu">Nagyobb térkép</a>
<form method="POST" id="uzenetForm">
    <label for="szoveg">Üzenet:</label><br>
    <textarea name="szoveg" id="szoveg"></textarea>
    <br><br>
    <button type="submit">Küldés</button>
</form>
<script>
document.getElementById('uzenetForm').onsubmit = function(e) {
    var szoveg = document.getElementById('szoveg').value.trim();
    if (szoveg === "") {
        alert("Hiba: Az üzenet mező nem maradhat üresen!");
        e.preventDefault();
        return false;
    }
};
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['szoveg']) || trim($_POST['szoveg']) === '') {
        echo "Hiba: hiányzó szöveg.";
    } else {
        $szoveg = trim($_POST['szoveg']);
        if (!isset($_SESSION['login'])) {
            $felhasznalo = "Vendég";
        }
        else{
        $felhasznalo = $_SESSION['login'];
        }
        $ido = date('Y-m-d H:i:s');

        $sql = "INSERT INTO uzenetek (felhasznalonev, szoveg, ido)
                VALUES (:felhasznalo, :szoveg, :ido)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':felhasznalo' => $felhasznalo,
            ':szoveg' => $szoveg,
            ':ido' => $ido
        ]);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;  
    }
} 
?>