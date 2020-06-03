<?php
require "./connection.php";


$sqlSelect = "SELECT * FROM department";

$workers = array();

foreach ($dbh->query($sqlSelect) as $worker) {
    $workersArr = array(
        'id' => $worker['ID_Department'],
        'name' => $worker['chief']
    );
    $workers[] = $workersArr;
}

