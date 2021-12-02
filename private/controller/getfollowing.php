<!-- -------------------- for fetching data from following list part -------------------- -->
<?php
$artwork = 'artwork';
$followinglist = 'followinglist';
$member = 'member';
$artist = 'artist';


$userID = $_SESSION['userID'];

$followingData = selectAllFromFourTables2($artwork, $followinglist, $member, $artist, $userID);

?>