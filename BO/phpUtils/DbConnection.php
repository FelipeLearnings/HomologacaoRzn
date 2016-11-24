<?php

require_once '../../constants/sql_constants.php';

class DbConnection
{
    public static function initDbConn()
    {
        $conn = new mysqli(HOSTNAME_SQL, USERNAME, PASSWORD, DATABASE_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}