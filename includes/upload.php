<?php
include 'db.php';

/*if (!isset($_SESSION['login'])) {
    header("Location: /belepes");
    exit;
}*/


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $targetDir = "../images/uploads/";

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $fileName;

        $ext = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if (in_array($ext, $allowed)) {

            try {
                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

                $stmt = $conn->prepare("INSERT INTO images (filename) VALUES (?)");
                $stmt->execute([$fileName]);

                header("Location: /gallery");
                exit;

            }
            catch(PDOException $e){
                die($e->getMessage());
            }
        } else {
            die("Nem engedélyezett fájl");
        }
    }
}
