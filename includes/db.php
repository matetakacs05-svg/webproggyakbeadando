<?php 

try {
    $conn = new PDO(
            'mysql:host=localhost;dbname=forma12345;charset=utf8',
            'forma12345',
            'admin1234*',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>