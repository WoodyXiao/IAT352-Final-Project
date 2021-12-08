<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

$output = '';

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $query = " SELECT a.artID,a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1  ON a.artistID = a1.artistID WHERE a.artName LIKE '{$search}%'";

    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<div class="text-container">
                            <input type="hidden" class="artName" value="' . $row['artName'] . '"/>
                            <input type="hidden" class="artistName" value="' . $row['firstName'] . '"/>
                            <h4>' . $row['artName'] . ' </h4>
                            <h4>' . $row['firstName'] . ' ' . $row['lastName'] . '</h4>
                        </div>';
        }
    }
}

echo $output;
