<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");

require "../connection.php";

$project = $_GET['project'];

$sqlSelect = "SELECT `time_start`,`time_end` FROM work where `FID_Projects` = :id";

$sth = $dbh->prepare($sqlSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':id' => $project));

echo '<?xml version="1.0" encoding="utf8" ?>';
echo "<root>";
$totalTime = 0;
foreach ($sth as $index => $row) {
    $projectTime = strtotime($row['time_end']) - strtotime($row['time_start']);
    $totalTime += $projectTime;
}
echo "<totalTime>". date("H:i:s", mktime(0, 0, $totalTime)) . "</totalTime>";
echo "</root>";

