<?php

session_start();

unset($_SESSION['userID']);
unset($_SESSION['username']);
unset($_SESSION['message']);
unset($_SESSION['type']);

header('location: index.php');
