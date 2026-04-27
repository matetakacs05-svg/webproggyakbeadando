<?php
require "includes/db.php";

if (!isset($_POST['az']) && !isset($_GET['az'])) {
    header("Location: crudList");
    exit;
}

$az = isset($_POST['az']) ? (int)$_POST['az'] : (int)$_GET['az'];

if (isset($_POST['nev'])) {

    $sql = "UPDATE pilota 
            SET nev = :nev, nem = :nem, szuldat = :szuldat, nemzet = :nemzet 
            WHERE az = :az";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nev' => $_POST['nev'],
        ':nem' => $_POST['nem'],
        ':szuldat' => $_POST['szuldat'],
        ':nemzet' => $_POST['nemzet'],
        ':az' => $az
    ]);

    header("Location: crudList");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM pilota WHERE az = :az");
$stmt->execute([':az' => $az]);
$adat = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$adat) {
    echo "Nincs ilyen rekord!";
    exit;
}
?>

<form method="POST">
    <input type="hidden" name="az" value="<?= $az ?>">

    <label>Név:</label>
    <input type="text" name="nev" value="<?= htmlspecialchars($adat['nev']) ?>" required><br>

    <label>Nem:</label>
    <select name="nem" required>
        <option value="N" <?= $adat['nem'] == 'N' ? 'selected' : '' ?>>Nő</option>
        <option value="F" <?= $adat['nem'] == 'F' ? 'selected' : '' ?>>Férfi</option>
    </select><br>

    <label>Születési dátum:</label>
    <input type="date" name="szuldat" value="<?= $adat['szuldat'] ?>" required><br>

    <label>Nemzet:</label>
    <input type="text" name="nemzet" value="<?= htmlspecialchars($adat['nemzet']) ?>" required><br>

    <button type="submit">Mentés</button>
    <button type="button" onclick="window.location='crudList'">Mégse</button>
</form>