<!-- -------------------- for removing comment part ------------------- -->
<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

if (isset($_POST['commentID'])) {
    $commentID = $_POST['commentID'];

    $favourite_remove_query = "DELETE FROM comment WHERE commentID =$commentID";
    $result = mysqli_query($conn, $favourite_remove_query);
}
