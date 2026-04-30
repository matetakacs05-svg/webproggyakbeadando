<?php require "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <video autoplay muted loop playsinline id="bg-video">
        <source src="../bgv.mp4" type="video/mp4" />
    </video>
    <div class="contentcrud">
        <form method="POST">
            <label for="nev">Név:</label>
            <input type="text" name="nev" id="nev" required> <br>

            <label for="nem">Nem:</label>
            <select name="nem" id="nem" required>
                <option value="N">Nő</option>
                <option value="F">Férfi</option>
            </select> <br>

            <label for="szuldat">Születési dátum:</label>
            <input type="date" name="szuldat" id="szuldat" required> <br>

            <labeL for="nemzet">Nemzet:</labeL>
            <input type="text" name="nemzet" id="nemzet" required> <br>
            <button type="button" onclick="window.location=': crudList'">Mégse</button>
            <button type="submit">Mentés</button>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "INSERT INTO pilota (nev, nem, szuldat, nemzet)
            VALUES (:nev, :nem, :szuldat, :nemzet)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nev' => $_POST['nev'],
            ':nem' => $_POST['nem'],
            ':szuldat' => $_POST['szuldat'],
            ':nemzet' => $_POST['nemzet'],
        ]);
        echo "<script>window.location = '/crudList'</script>";
        exit;
}
?>
