<?php
    require "includes/db.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<title>Kép feltöltés</title>
</head>
<body>

<h1>Kép feltöltés</h1>
<?php if (isset($_SESSION['login'])): ?>
    <form action="/includes/upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Feltöltés</button>
    </form>
<?php else: ?>
    <p>Jelentkezz be a feltöltéshez</p>
<?php endif; ?>

<h2>Galéria</h2>

<?php
try {
    $sql = $conn->prepare('SELECT * FROM images');
    $sql->execute();
    $results = $sql->fetchAll();

    foreach ($results as $row) {
        echo "<img src='/images/uploads/" . $row['filename'] . "' alt='" . $row['filename'] . "'>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

</body>
</html>
