<?php

$serverName = "localhost";
$DBuserName = "root";
$DBPass = "";
$DBName = "epe3";

$conn = mysqli_connect($serverName, $DBuserName, $DBPass, $DBName);
$conn2 = new mysqli($serverName, $DBuserName, $DBPass, $DBName);

if (!$conn) {
	die("La connecion fallo: " . mysqli_connect_error());
}
