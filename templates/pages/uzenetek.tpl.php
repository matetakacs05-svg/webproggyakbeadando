<?php require "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üzenetek</title>
</head>
<body>
    <h2>Üzenetek listája</h2>

    <table>
        <tr>
            <th>Felhasználónév</th>
            <th>Szöveg</th>
            <th>Idő</th>
        </tr>

    <?php
    try {
        $stmt = $conn->query("SELECT felhasznalonev, szoveg, ido FROM uzenetek order by id desc");

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['felhasznalonev']) . "</td>";
                echo "<td>" . htmlspecialchars($row['szoveg']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ido']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nincs adat</td></tr>";
        }

    } catch (PDOException $e) {
        echo "<tr><td colspan='3'>Hiba: " . $e->getMessage() . "</td></tr>";
    }
    ?>

    </table>
</body>
</html>