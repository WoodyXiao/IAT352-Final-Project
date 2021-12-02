<?php

session_start();

unset($_SESSION['userID']);
unset($_SESSION['username']);
unset($_SESSION['message']);
unset($_SESSION['type']);
if (isset($_SESSION['artID'])) {
    unset($_SESSION['artID']);
}

header('location: index.php');
