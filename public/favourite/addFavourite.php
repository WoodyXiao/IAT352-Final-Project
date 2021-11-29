<!-- -------------------- for adding art work to favourite part ------------------- -->
<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

if(isset($_POST['add_favourite'])){
    $artID = $_POST['artID'];
    $userID = $_POST['userID'];

    $favourite_add_query = "INSERT INTO favouriteslist (userID, artID) VALUES ('$userID','$artID')";
    $result = mysqli_query($conn, $favourite_add_query);

    echo $result['favID'];
}

if(isset($_POST['remove_favourite'])){
    $favID = $_POST['favID'];

    $favourite_remove_query = "DELETE FROM favouriteslist WHERE favID =$favID";
    $result = mysqli_query($conn, $favourite_remove_query);
}