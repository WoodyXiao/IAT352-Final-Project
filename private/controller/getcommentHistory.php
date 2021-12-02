<?php $comment = 'comment';
$artwork = 'artwork';
$member = 'member';


$userID = $_SESSION['userID'];


$history = selectAllFromThreeTables($artwork, $comment, $member, $userID);
