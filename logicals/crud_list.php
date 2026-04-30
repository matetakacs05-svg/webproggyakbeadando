<?php
require_once('includes/db.php'); // Itt állapítod meg a PDO kapcsolatot ($dbh)

$sth = $dbh->prepare("SELECT * FROM gp"); // Az SQL lekérdezés
$sth->execute();
$gp = $sth->fetchAll(PDO::FETCH_ASSOC); // Itt jön létre a $munkatarsak változó
?>