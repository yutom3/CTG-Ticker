<?php
$serverName = "ctgticker.database.windows.net";
$connectionOptions = array(
    "Database" => "CTG",
    "Uid" => "ctgadmin",
    "PWD" => "Ctg_admin"
);

// Create connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

//$sql = "CREATE DATABASE CTG_Ticker"
$sql = "SELECT * FROM CTG_Ticker";
$stmt = sqlsrv_query($conn, $sql);
$row = sqlsrv_fetch_array($stmt);
//$sql = "UPDATE CTG_Ticker SET game1="'.$_POST["game1"].'", game2="'.$_POST["game2"].'", game3="'.$_POST["game3"].'" WHERE id=1";
echo "<div class='row'>";
echo "<div class='col-sm-4 ticker_data' id='game1'>" . $row["game1"] . "</div>";
echo "<div class='col-sm-4 ticker_data' id='game2'>" . $row["game2"] . "</div>";
echo "<div class='col-sm-4 ticker_data' id='game3'>" . $row["game3"] . "</div>";
echo "</div>";
?>
