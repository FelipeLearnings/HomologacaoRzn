<?php

include "../constants/sql_constants.php";

$hostname   = HOSTNAME_SQL;
$username   = USERNAME;
$password   = PASSWORD;
$dbname     = DATABASE_NAME;

$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}