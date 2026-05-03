<div class="contentk"><?php require "includes/db.php";
try {
        $stmt = $conn->query("SELECT felhasznalonev, szoveg, ido FROM uzenetek order by id desc limit 1");

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<p>" . htmlspecialchars($row['felhasznalonev']) . "</p>";
                echo "<p>" . htmlspecialchars($row['szoveg']) . "</p>";
                echo "<p>" . htmlspecialchars($row['ido']) . "</p>";
    } catch (PDOException $e) {
        echo "<tr><td colspan='3'>Hiba: " . $e->getMessage() . "</td></tr>";
    }
?>
</div>
