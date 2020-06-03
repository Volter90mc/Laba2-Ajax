<?php

require "./connection.php";


$sqlSelect = "SELECT name, ID_Projects FROM projects";

$projects = array();


foreach ($dbh->query($sqlSelect) as $project) {
    $projectArr = array(
        'id' => $project['ID_Projects'],
        'name' => $project['name']
    );
    $projects[] = $projectArr;
}

