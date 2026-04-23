<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $targetDir = "uploads/";

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $fileName;

        $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if (in_array($ext, $allowed)) {

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {

                $stmt = $conn->prepare("INSERT INTO images (filename) VALUES (?)");
                $stmt->bind_param("s", $fileName);
                $stmt->execute();

                header("Location: gallery.php");
                exit;

            } else {
                die("Feltöltési hiba");
            }

        } else {
            die("Nem engedélyezett fájl");
        }
    }
}