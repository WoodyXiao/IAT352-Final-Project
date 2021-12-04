<!-- ---------- for saving the user preference part ---------- -->
<?php

// ---------- for setting preference part -----------
if (isset($_POST['savePreBtn'])) {
    unset($_SESSION['message'], $_SESSION['type']);
    if (isset($_POST['location_selector']) && !empty($_POST['location_selector'])) {
        $_SESSION['location_by_user'] = $_POST['location_selector'];

        $_SESSION['message'] = 'setted preference successfully';
        $_SESSION['type'] = 'success';
    }
    if ($_POST['location_selector'] === "") {
        unset($_SESSION['location_by_user']);

        $_SESSION['message'] = 'setted default preference successfully';
        $_SESSION['type'] = 'success';
    }
    if (isset($_POST['type_selecotr']) && !empty($_POST['type_selecotr'])) {
        $_SESSION['type_by_user'] = $_POST['type_selecotr'];

        $_SESSION['message'] = 'setted preference successfully';
        $_SESSION['type'] = 'success';
    }
    if ($_POST['type_selecotr'] === "") {
        unset($_SESSION['type_by_user']);

        $_SESSION['message'] = 'setted default preference successfully';
        $_SESSION['type'] = 'success';
    }
}

?>