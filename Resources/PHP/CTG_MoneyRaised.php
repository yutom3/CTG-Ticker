<?php
// Set your CSV feed
$url = 'http://docs.google.com/spreadsheets/d/e/2PACX-1vQ4LyVkKVOVDPyCmuL6TKXDrZcCNFh86ag1f7mGwSLR-lDa1N2jL_I_8K3b8I8zuYlxNNyeXMU3fmNw/pub?gid=0&single=true&output=csv';

// Function to convert CSV into associative array
  if (($handle = fopen($url, 'r')) !== FALSE) {
    $i = 0;
    while (($lineArray = fgetcsv($handle, 4000, ',', '"')) !== FALSE) {
      for ($j = 0; $j < count($lineArray); $j++) {
        $arr[$i][$j] = $lineArray[$j];
      }
      $i++;
    }
    fclose($handle);
  }

$data = str_replace('$', '', array_slice(array_column($arr,2),1));
$sum = array_sum($data);
echo $sum;
?>
