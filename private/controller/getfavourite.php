<!-- -------------------- for fetching data from favourite list part -------------------- -->
<?php
    $artwork = 'artwork';
    $favouriteslist = 'favouriteslist';
    $member = 'member';
    $artist = 'artist';


    $userID = $_SESSION['userID'];

    $favouriteData = selectAallFromFourTables($artwork, $favouriteslist, $member, $artist,$userID);
    
?>