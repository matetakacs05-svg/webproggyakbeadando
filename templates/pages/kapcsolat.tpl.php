<?php require "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contentkap">
        <h1>Üzenet Küldése</h1>
        <form method="POST" class="uzenetForm">
            <label for="szoveg">Üzenet:</label><br>
            <textarea name="szoveg" id="szoveg" placeholder="Üzeneted:"></textarea>
            <br><br>
        <button type="submit">Küldés</button>
    </div>
</form>
</body>
</html>
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