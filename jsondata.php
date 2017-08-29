<?php

header('Content-Type: applicatioin/json');
$objConnect = mysqli_connect("localhost","root","mohara","php-map");
//mysqli_query("SET NAME UTF8");

$strSQL = "SELECT * FROM location";
$objQuery = mysqli_query($objConnect,$strSQL);
$resultArray = array();
while ($obResult = mysqli_fetch_assoc($objQuery)){
    array_push($resultArray, $obResult);
}

echo json_encode($resultArray);


?>