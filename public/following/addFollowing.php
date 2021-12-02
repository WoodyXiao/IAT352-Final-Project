<!-- -------------------- for adding artist to following part ------------------- -->
<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

if (isset($_POST['add_following'])) {
    $artistID = $_POST['artistID'];
    $userID = $_POST['userID'];

    $following_add_query = "INSERT INTO followinglist (userID, artistID) VALUES ('$userID','$artistID')";
    $result = mysqli_query($conn, $following_add_query);

    echo $result['followID'];
}

if (isset($_POST['remove_following'])) {
    $followID = $_POST['followID'];

    $following_remove_query = "DELETE FROM followinglist WHERE followID =$followID";
    $result = mysqli_query($conn, $following_remove_query);
}
