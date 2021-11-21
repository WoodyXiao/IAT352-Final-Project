<!-- -------------------- for loading rating and insert rating part -------------------- -->
<?php
include('../private/initialize.php');
include("../private/database/db.php");

if (isset($_POST['add_rating'])) {
    // get posted data 
    $art_id = $_POST['artID'];
    $ratingNum = $_POST['ratingNum'];
    // get user id 
    $user_id = $_SESSION['userID'];

    // Check whether the user already submitted the rating for the same artWork.
    $query = "SELECT score FROM rating WHERE artID = $art_id AND userID = '" . $user_id . "'";

    $result = $conn->query($query);

    // if already have one, just update the score.
    if ($result->num_rows > 0) {
        $query = "UPDATE rating SET score ='" . $ratingNum . "' WHERE userID = '" . $user_id . "'";

        $insert = $conn->query($query);

        // Status 
        $status = 2;
    } else {
        // Insert score data in the database 
        $query = "INSERT INTO rating (artID,userID,score) VALUES ('" . $art_id . "', '" . $user_id . "', '" . $ratingNum . "')";
        $insert = $conn->query($query);

        // Status 
        $status = 1;
    }

    $query = "SELECT AVG(score) as avgRating, COUNT(score) as ratingNum FROM rating WHERE artID = '" . $art_id . "'";
    $result = $conn->query($query);
    $ratingData = $result->fetch_assoc();

    $array_result = array(
        'data' => $ratingData,
        'status' => $status
    );

    echo json_encode($array_result);
    exit;
}
