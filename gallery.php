<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">
<title>Kép feltöltés</title>
</head>
<body>

<h1>Kép feltöltés</h1>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Feltöltés</button>
</form>

<h2>Galéria</h2>

<?php
$result = $conn->query("SELECT * FROM images ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    echo "<img src='uploads/" . $row['filename'] . "' width='200'>";
}
?>

</body>
</html>