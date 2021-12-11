<!-- ---------- for saving the user preference part ---------- -->
<?php


// ---------- for setting preference part -----------
if (isset($_POST['savePreBtn'])) {
    unset($_SESSION['message'], $_SESSION['type']);
    if (isset($_POST['location_selector']) && !empty($_POST['location_selector'])) {

        $_SESSION['message'] = 'Your preferences have been saved';
        $_SESSION['type'] = 'success';
        setSettingRecord($_SESSION['userID'], 'location', $_POST['location_selector']);
    }
    if ($_POST['location_selector'] === " ") {

        $_SESSION['message'] = 'Your preferences have been saved';
        $_SESSION['type'] = 'success';
        setSettingRecord($_SESSION['userID'], 'location', 'NULL');
    }
    if (isset($_POST['type_selecotr']) && !empty($_POST['type_selecotr'])) {

        $_SESSION['message'] = 'Your preferences have been saved';
        $_SESSION['type'] = 'success';
        setSettingRecord($_SESSION['userID'], 'type', $_POST['type_selecotr']);
    }
    if ($_POST['type_selecotr'] === " ") {

        $_SESSION['message'] = 'Your preferences have been saved';
        $_SESSION['type'] = 'success';
        setSettingRecord($_SESSION['userID'], 'type', 'NULL');
    }
    if (isset($_POST['material_selector']) && !empty($_POST['material_selector'])) {

        $_SESSION['message'] = 'Your preferences have been saved';
        $_SESSION['type'] = 'success';
        setSettingRecord($_SESSION['userID'], 'material', $_POST['material_selector']);
    }
    if ($_POST['material_selector'] === " ") {

        $_SESSION['message'] = 'Your preferences have been saved';
        $_SESSION['type'] = 'success';
        setSettingRecord($_SESSION['userID'], 'material', 'NULL');
    }
}

// ---------- return the setting data by calling this function ----------
$preferenceData = selectOneByOneTable1('membersetting', 'userID', $_SESSION['userID']);
if (mysqli_num_rows($preferenceData) === 0) {
    $preferenceData = "";
}
?>