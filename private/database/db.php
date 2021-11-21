<?php

session_start(); // ---> run the session in here.
require('db_connect.php');

// ----- get spercific data function ----- 
function getSpercificData($col, $table)
{
    global $conn;
    $query = "SELECT DISTINCT " . $col . " FROM " . $table;
    $result = mysqli_query($conn, $query);
    return $result;
}

// --------- print value from bb function for test ---------
function dd($value)
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

// -------- function that execute SQL ---------
function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data); // ---> get all the values from the array of $data.
    $types = str_repeat('s', count($values)); // ---> Get the amount of type of string.
    $stmt->bind_param($types, ...$values); // ---> ... putting all variales in here if they have.
    $stmt->execute(); // ---> execute the query.
    return $stmt; // ---> return the $stmt.
}

// ----- show only one record by ID -----
function selectOne($table, $table2, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table INNER JOIN $table2 ON $table.artistID = $table2.artistID";
    // return records that match conditions.
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    // $sql = "SELECT * FROM $table WHERE admin=0 AND username='xwd' LIMIT 1";
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc(); // ---> return the associate array of the data.
    return $records;
}
// ----- showo only one record by iD from only one table
function selectOneByOneTable($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    // return records that match conditions.
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }
    // $sql = "SELECT * FROM $table WHERE admin=0 AND username='xwd' LIMIT 1";
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc(); // ---> return the associate array of the data.
    return $records;
}

// ----- create one record function -----
function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}
// ----- for create account function-----
function createRecord($table, $username, $password, $email, $name, $phoneNumber)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO $table (username, password, email, name, phoneNumber ) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $username, $password, $email, $name, $phoneNumber);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}

// ------- for insert ratting founction -------
