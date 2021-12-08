<?php
include('../../private/initialize.php');
include("../../private/database/db.php");

$limit = 10; // ---> setting default by 5 for the limit at first.
$output = ''; // ---> initialize output frist.
$page = ''; // ---> page.

$query = "SELECT a.artID,a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1  ON a.artistID = a1.artistID ";
$num = 0;

// --- setting the page as 1 by default. --- 
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}
// --- for the research part ---
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    if ($num === 0) {
        $query .= " WHERE a.artName LIKE '%{$search}%'";
        $num++;
    } else {
        $query .= " AND a.artName LIKE '%{$search}%'";
        $num++;
    }
}
// --- for country of author ---
if (isset($_POST['country'])) {
    $country = $_POST['country'];
    if ($country === 'ALL') {
        //$query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID";
        $num++;
    } else if ($num === 0) {
        //$query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID WHERE a1.country = '$country'";
        $query .= " WHERE a1.country = '$country'";
        $num++;
    } else if ($num != 0) {
        $query .= " AND a1.country = '$location'";
        $num++;
    }
}
// --- for location of artwork ---
if (isset($_POST['location'])) {
    $location = $_POST['location'];
    if ($location === 'ALL') {
        //$query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID";
        $num++;
    } else if ($num === 0) {
        $query .= " WHERE a.neighborhood = '$location'";
        $num++;
    } else if ($num != 0) {
        $query .= " AND a.neighborhood = '$location'";
        $num++;
    }
}
// --- for material of artwork ---
if (isset($_POST['material'])) {
    $material = $_POST['material'];
    if ($material === 'ALL') {
        //$query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID";
        $num++;
    } else if ($num === 0 && $material != 'ALL') {
        // $query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID WHERE a.material = '$material'";
        $query .= " WHERE a.material = '$material'";

        $num++;
    } else if ($num != 0 && $material != 'ALL') {
        $query .= " AND a.material = '$material'";
        $num++;
    }
}
// --- for art status ---
if (isset($_POST['status'])) {
    $status_filter =  implode("','", $_POST["status"]);
    if ($num === 0) {
        $query = '';
        $query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID WHERE a.status IN ('" . $status_filter . "')";
        $num++;
    } else {
        $query .= " AND a.status IN('" . $status_filter . "')";
    }
}
// --- for art type ---
if (isset($_POST['type'])) {
    $type_filter =  implode("','", $_POST["type"]);
    if ($num === 0) {
        $query = '';
        $query = "SELECT a.artID, a.artName,a1.artistID, a1.firstName, a1.lastName, a.status, a.type, a.year, a.photoURL, a1.country FROM artwork a INNER JOIN artist a1 ON a.artistID = a1.artistID WHERE a.type IN ('" . $type_filter . "')";
        $num++;
    } else {
        $query .= " AND a.type IN('" . $type_filter . "')";
    }
}
// --- for time range of art ---
if (isset($_POST['from']) && isset($_POST['to']) && !empty($_POST['from']) && !empty($_POST['to'])) {
    $from =  $_POST['from'];
    $to =  $_POST['to'];
    if ($num === 0) {
        $query .= " WHERE a.year >= '" . $from . "' AND a.year <= '" . $to . "' ";
        $num++;
    } else {
        $query .= " AND a.year >= '" . $from . "' AND a.year <= '" . $to . "' ";
    }
}

$start_from = ($page - 1) * $limit;
$queryforpagination = $query;
$query .= " ORDER BY a.year DESC LIMIT " . $start_from . ", " . $limit;
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

?>

<?php

// ---------- for the art data ----------
$output .= '<div class="main-content">';
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (empty($row['photoURL'])) { // ---> check if photoURL is empty or not.
            $photo = 'public/Assets/img/1.jpg';
        } else {
            $photo = $row['photoURL'];
        }
        $output .= '
            <div class="card-box">
                <div class="image-box">
                    <a href="art_detail.php?id=' . $row['artID'] . '">
                        <img src="' . $photo . '">
                    </a>
                </div>
                <h2 class="title"><a href="art_detail.php?id=' . $row['artID'] . '">' . $row['artName'] . '</a></h2>
                <h4 class="author"><a href="artist_detail.php?artistID=' . $row['artistID'] . '">' . $row['firstName'] . ' ' .  $row['lastName'] . '</a></h4>
                <div class="subTitle-box">
                    <p class="Type">' . $row['type'] . '</p>
                    <p class="year">' . $row['year'] . '</p>
                    <p class="Status">' . $row['status'] . '</p>
                    <p class="Country">' . $row['country'] . '</p>
                    
                </div>
                <div class="moreBtn">
                    <button><a href="art_detail.php?id=' . $row['artID'] . '">More Info</a></button>
                </div>
            </div>
        ';
    }
} else {
    $output .= '
        <p>Sorry, no record found.</p>
    ';
}
$output .= '</div>';

// ---------- for the pagination -----------
$queryforpagination .= " ORDER BY a.year DESC ";
$result = mysqli_query($conn, $queryforpagination);
$total_records = mysqli_num_rows($result);
$total_page = ceil($total_records / $limit);
$output .= '<ul class="pagination ">';

if ($page > 1) {
    $previous = $page - 1;
    $output .= '<li class="page" id="1"><span class="page-link">First page</span></li>';
    $output .= '<li class= "page " id="' . $previous . '"><span class="page-link"><i class="fa fa-arrow-left">
    </i></span></li>';
}

for ($i = 1; $i <= $total_page; $i++) {
    $active_class = "";
    if ($i == $page) {
        $active_class = 'active';
    }
    $output .= '<li class="page ' . $active_class . '" id="' . $i . '"><span class="page-link">' . $i . '</span></li>';
}

if ($page < $total_page) {
    $page++;
    $output .= '<li class="page " id="' . $page . '"><span class="page-link"><i class="fa fa-arrow-right">
    </i></span></li>';
    $output .= '<li class="page " id="' . $total_page . '"><span class="page-link">Last page</span></li>';
}
$output .= '</ul>';
$num = '<P class="numOfData">Showing <span class="">' . $total_records . '</span> Result(s).</P>';
echo $output . $num;
?>