<?php require "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <div class="contentcrud">
        <button onclick="document.location='crudAdd'">Hozzáadás</button>
        <table>
            <tr>
                <th>Az</th>
                <th>NÃ©v</th>
                <th>Nem</th>
                <th>SzÃ¼letÃ©si dÃ¡tum</th>
                <th>Nemzet</th>
                <th>MÅ±veletek</th>
            </tr>

        <?php
        try {
            $stmt = $conn->query("SELECT az, nev, nem, szuldat, nemzet FROM pilota");

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($rows) {
            foreach ($rows as $row) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['az']) ?></td>
                    <td><?= htmlspecialchars($row['nev']) ?></td>
                    <td><?= htmlspecialchars($row['nem']) ?></td>
                    <td><?= htmlspecialchars($row['szuldat']) ?></td>
                    <td><?= htmlspecialchars($row['nemzet']) ?></td>
                    <td>
                        <form method="POST" action="/crudEdit">
                            <input type="hidden" name="az" value="<?= $row['az'] ?>">
                            <button type="submit">Módositás</button>
                        </form>
                        <form method="POST" action="/crudDelete">
                            <input type="hidden" name="az" value="<?= $row['az'] ?>">
                            <button type="submit">Törlés</button>
                        </form>
                    </td>
                </tr>
            <?php }
            } else {
                echo "<tr><td colspan='3'>Nincs adat</td></tr>";
            }

        } catch (PDOException $e) {
            echo "<tr><td colspan='3'>Hiba: " . $e->getMessage() . "</td></tr>";
        }
        ?>

        </table>
</div>
</body>
</html>