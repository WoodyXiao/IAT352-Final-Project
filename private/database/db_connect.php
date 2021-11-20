<?php

require('db_credentials.php');

$conn = new MYSQLi(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// show error if database connection failed.
if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
