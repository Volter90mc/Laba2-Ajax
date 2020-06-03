<?php
header('Content-Type: application/json');
require "../connection.php";

$chief = $_GET['chief'];

$sqlSelect = "SELECT count(*) FROM `worker` WHERE `FID_Department` = :chief";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':chief' => $chief));


foreach ($sth as $row) {
    echo json_encode($row[0]);
}
