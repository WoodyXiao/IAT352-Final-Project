<!--------------------------------- data fetching for member homepage part -------------------------------->
<?php
// ---------- create array list to collect all type of the artworks.
// $artistWhiteList = array();
$locationWhiteList = array();
$materialWhiteList = array();
$typeWhiteList = array();

// $artistData = getSpercificData('artistID', 'artist');
$locationData = getSpercificData('neighborhood', 'artwork');
$materialData = getSpercificData('material', 'artwork');
$typeData = getSpercificData('type', 'artwork');

// foreach ($artistData as $row) {
//     array_push($artistWhiteList, $row['artistID']);
// }
foreach ($locationData as $row) {
    array_push($locationWhiteList, $row['neighborhood']);
}
foreach ($materialData as $row) {
    array_push($materialWhiteList, $row['material']);
}
foreach ($typeData as $row) {
    array_push($typeWhiteList, $row['type']);
}

// ---------- for following artist ----------
if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $followingData = selectAllFromFourTables2('artwork', 'followinglist', 'member', 'artist', $userID, '4');
}

// ---------- for artist. ------------
// $randomartist = $artistWhiteList[rand(0, count($artistWhiteList) - 1)];
// $artistNameData = selectOneByOneTable('artist', ['artistID' => $randomartist]);
// $artistName = $artistNameData['firstName'] . ' ' . $artistNameData['lastName'];
$artistName = "Cameron Kerr";
$artistRecord = selectAllFromTwoTable('artwork', 'artist', 'artistID', 382);

// ---------- for location. ------------
// if (isset($_SESSION['location_by_user'])) {
//     $randomlocation = $_SESSION['location_by_user'];
// } else {
//     $randomlocation = $locationWhiteList[rand(0, count($locationWhiteList) - 1)];
// }
if ($preferenceData) {
    foreach ($preferenceData as $data) {
        if ($data['location'] != 'NULL') {
            $randomlocation =   $data['location'];
        } else {
            $randomlocation = $locationWhiteList[rand(0, count($locationWhiteList) - 1)];
        }
    }
} else {
    $randomlocation = $locationWhiteList[rand(0, count($locationWhiteList) - 1)];
}
$locationRecord = selectAllFromTwoTable('artwork', 'artist', 'neighborhood', $randomlocation);

// ---------- for material. ------------
if ($preferenceData) {
    foreach ($preferenceData as $data) {
        if ($data['material'] != 'NULL') {
            $randommaterial =   $data['material'];
        } else {
            $randommaterial = $materialWhiteList[rand(0, count($materialWhiteList) - 1)];
        }
    }
} else {
    $randommaterial = $materialWhiteList[rand(0, count($materialWhiteList) - 1)];
}
$materialRecord = selectAllFromTwoTable('artwork', 'artist', 'material', $randommaterial);

// ---------- for type part. ---------- 
if ($preferenceData) {
    foreach ($preferenceData as $data) {
        if ($data['type'] != 'NULL') {
            $randomtype =   $data['type'];
        } else {
            $randomtype =  $typeWhiteList[rand(0, count($typeWhiteList) - 1)];
        }
    }
} else {
    $randomtype =  $typeWhiteList[rand(0, count($typeWhiteList) - 1)];
}
$typeRecord = selectAllFromTwoTable('artwork', 'artist', 'type', $randomtype)
?>