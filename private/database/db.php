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
function selectOneByOneTable1($table, $col, $conditions)
{
    global $conn;
    $query = "SELECT DISTINCT * FROM $table WHERE $col = $conditions";
    $result = mysqli_query($conn, $query);
    return $result;
}
function selectOneByOneTable2($table, $key, $condition, $userid)
{
    global $conn;
    $query = "SELECT DISTINCT *  FROM " . $table . " WHERE " . $key . " = " . $condition . " AND userID !=" . $userid . "";
    $result = mysqli_query($conn, $query);
    return $result;
}
function selectOneByOneTable3($table, $condition, $userid)
{
    global $conn;
    $query = "SELECT DISTINCT *  FROM " . $table . " WHERE username = " . $condition . " AND userID !=" . $userid . "";
    $result = mysqli_query($conn, $query);
    return $result;
}
function selectAll($table)
{
    global $conn;
    $query = "SELECT  *  FROM " . $table;
    $result = mysqli_query($conn, $query);
    return $result;
}
function selectAllFromTwoTable($artwork, $artist, $condition, $conditionValue)
{
    global $conn;
    if ($condition === 'artistID') {
        $query = "SELECT * FROM $artwork a 
    INNER JOIN $artist a1 ON a.artistID = a1.artistID WHERE a.$condition = $conditionValue ORDER BY year DESC LIMIT 4 ";
    } else {
        $query = "SELECT * FROM $artwork a 
        INNER JOIN $artist a1 ON a.artistID = a1.artistID WHERE $condition = '$conditionValue' ORDER BY year DESC LIMIT 4 ";
    }

    $result = mysqli_query($conn, $query);

    return $result;
}

function selectAllFromThreeTables($artwork, $comment, $member,  $userID)
{
    global $conn;
    $query = "SELECT a.artName,a.artID, c.commentText, c.date,c.commentID, m.username,m.userID FROM $comment c  
    INNER JOIN $artwork a ON a.artID = c.artID 
    INNER JOIN $member m ON c.userID = m.userID 
    WHERE m.userID = $userID";
    $result = mysqli_query($conn, $query);
    return $result;
}
function selectAllFromFourTables($artwork, $favouriteslist, $member, $artist, $userID)
{
    global $conn;
    $query = "SELECT f.favID,m.userID,a.artID,a.artName,a.year,a.photoURL,a1.artistID,a1.firstName,a1.lastName,a.status,a.description 
    FROM $artwork a INNER JOIN $favouriteslist f ON f.artID = a.artID 
                INNER JOIN $member m ON f.userID = m.userID 
                INNER JOIN $artist a1 ON a.artistID = a1.artistID WHERE m.userID =$userID";
    $result = mysqli_query($conn, $query);
    return $result;
}
function selectAllFromFourTables2($artwork, $followinglist, $member, $artist, $userID)
{
    global $conn;
    $query = "SELECT f.followID,m.userID,a.artID,a.artName,a.year,a.photoURL,a1.artistID,a1.firstName,a1.lastName,a.status,a.description 
    FROM $artwork a INNER JOIN $followinglist f ON f.artistID = a.artistID 
                INNER JOIN $member m ON f.userID = m.userID 
                INNER JOIN $artist a1 ON a.artistID = a1.artistID WHERE m.userID =$userID";
    $result = mysqli_query($conn, $query);
    return $result;
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
// ------ for create account function ------
function createRecord($table, $username, $password, $email, $name, $phoneNumber)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO $table (username, password, email, name, phoneNumber ) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $username, $password, $email, $name, $phoneNumber);
    $stmt->execute();
    $id = $stmt->insert_id;
    return $id;
}

// ------- for update account function -----
function update($table, $userid, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $sql = $sql . " WHERE userID=?";
    $data['userID'] = $userid;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}
// ------ for create account function ------
function updateRecord($table, $username, $password, $email, $name, $phoneNumber, $userid)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE $table SET username=?, password=?, email=?, name=?, phoneNumber=? WHERE userID=?");
    $stmt->bind_param('ssssss', $username, $password, $email, $name, $phoneNumber, $userid);
    $stmt->execute();
}
function updateRecord2($table, $username, $email, $name, $phoneNumber, $userid)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE $table SET username=?, email=?, name=?, phoneNumber=? WHERE userID=?");
    $stmt->bind_param('sssss', $username, $email, $name, $phoneNumber, $userid);
    $stmt->execute();
}

// ------- for show rate founction -------
function showRating($art_id)
{
    global $conn;
    $query = "SELECT AVG(score) as avgRating, COUNT(score) as ratingNum FROM rating WHERE artID = '" . $art_id . "'";
    $stmt = $conn->query($query);
    $result = $stmt->fetch_assoc();
    return $result;
}

// ------- function for setting preference -------
function setSettingRecord($user_id, $col, $colVal)
{
    global $conn;

    $query = "SELECT * FROM membersetting WHERE userID = $user_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $query = "UPDATE membersetting SET $col = '$colVal' WHERE userID = $user_id";
        $insert = $conn->query($query);
    } else {
        // Insert score data in the database 
        $query = "INSERT INTO membersetting ($col,userID) VALUES ('$colVal',$user_id)";
        $insert = $conn->query($query);
    }
}
// ------ function for deleting preference -------
