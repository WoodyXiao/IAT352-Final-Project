<!-- -------------------- for adding art work to favourite part ------------------- -->
<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

if (isset($_POST['favID'])) {
    $favID = $_POST['favID'];

    $favourite_remove_query = "DELETE FROM favouriteslist WHERE favID =$favID";
    $result = mysqli_query($conn, $favourite_remove_query);
}
