<!-- -------------------- for removing artists to favourite part ------------------- -->
<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

if (isset($_POST['followID'])) {
    $followID = $_POST['followID'];

    $following_remove_query = "DELETE FROM followinglist WHERE followID =$followID";
    $result = mysqli_query($conn, $following_remove_query);
}
