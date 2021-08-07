<?php
// JSON feed
$SheetID = '1m8Y5pwKjzYiN43EaXntREvBt-MqOI-vmtYNQEnGed8Q';
$SheetName = 'Sheet1';
$url = 'https://script.google.com/macros/s/AKfycbygukdW3tt8sCPcFDlkMnMuNu9bH5fpt7bKV50p2bM/exec?id='.$SheetID.'&sheet='.$SheetName;

// Function to convert JSON into associative array
$json = file_get_contents($url);
$obj = json_decode($json);
foreach ($obj->$SheetName as $row) {
    $sum += $row->Amount;
}
echo $sum;
?>
