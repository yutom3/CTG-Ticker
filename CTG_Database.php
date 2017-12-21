<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:ctgticker.database.windows.net,1433; Database = CTG", "ctgadmin", "Ctg_admin");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$connectionInfo = array("UID" => "ctgadmin@ctgticker", "pwd" => "Ctg_admin", "Database" => "CTG", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:ctgticker.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//get all tables in the database
//$sql = "SHOW TABLES";

//get column information from a table in the database
//$sql="SELECT COLUMN_KEY, COLUMN_NAME, COLUMN_TYPE FROM information_schema.COLUMNS WHERE TABLE_NAME = 'books'";

//SQL statement for a table in the database
//$sql = "SELECT * FROM CTG WHERE id <= 10";	
//$sql= "INSERT INTO CTG (game1, game2, game3)
//VALUES ('AT', 'JC', 'TY')";
//$sql = "UPDATE CTG SET game1='AT1' WHERE id=1";

//result is boolean for query other than SELECT, SHOW, DESCRIBE and EXPLAIN
// Create connection

//$sql = "CREATE DATABASE CTG"
$sql = "UPDATE CTG_Ticker SET game1='$_POST[game1]', game2='$_POST[game2]', game3='$_POST[game3]' WHERE id=1";
$stmt = sqlsrv_query($conn, $sql);
?>