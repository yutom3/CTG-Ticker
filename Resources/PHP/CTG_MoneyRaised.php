<?php
// Set your CSV feed
$url = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQ4LyVkKVOVDPyCmuL6TKXDrZcCNFh86ag1f7mGwSLR-lDa1N2jL_I_8K3b8I8zuYlxNNyeXMU3fmNw/pub?gid=23428638&single=true&output=csv';

// Function to convert CSV into associative array
  if (($handle = fopen($url, 'r')) !== FALSE) {
    $i = 0;
    while (($lineArray = fgetcsv($handle, 4000, ',', '"')) !== FALSE) {
      $sum = array_sum($lineArray);
    }
    fclose($handle);
  }
echo $sum;
?>
