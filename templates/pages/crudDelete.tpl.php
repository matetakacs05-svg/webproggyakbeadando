<?php
require "includes/db.php";
function deleteRecord(PDO $conn, int $az): bool
{
    $stmt = $conn->prepare("DELETE FROM pilota WHERE az = :az");
    return $stmt->execute([':az' => $az]);
}

if (!isset($_POST['az'])) {
    echo "<script>window.location = '/crudList'</script>";
    exit;
}

$az = (int)$_POST['az'];

if (isset($_POST['confirm'])) {
    deleteRecord($conn, $az);
    echo "<script>window.location = '/crudList'</script>";
    exit;
}

if (isset($_POST['cancel'])) {
    echo "<script>window.location = '/crudList'</script>";
    exit;
}
?>

<h3>Biztosan törlöd ezt a rekordot?</h3>

<form method="POST">
    <input type="hidden" name="az" value="<?= $az ?>">
    <button type="submit" name="confirm">Igen, törlés</button>
    <button type="submit" name="cancel">Mégse</button>
</form>