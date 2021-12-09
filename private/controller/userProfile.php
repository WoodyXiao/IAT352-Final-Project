<!-- -------------------- for fetching data from one user account to the profile part -------------------- -->
<?php
$table = 'member';
$error = array(); // ---> collect the error message into an array.

// ----- this is for the data of user -----
if (isset($_SESSION['userID'])) {
    $userid = $_SESSION['userID'];
    $user = selectOneByOneTable($table, ['userID' => $userid]);

    $name = $user['name'];
    $username = $user['username'];
    $email = $user['email'];
    $phoneNumber = $user['phoneNumber'];
    $profilePhote = $user['profilePhoto'];
    $password = $user['password'];
}


// ----- for update information of user -----
if (isset($_POST['saveBtn'])) {
    $userid = $_POST['userID'];
    $error = validateUserUpdate($_POST, $userid); // ---> calling the validatUser that created in validate.php
    $user = selectOneByOneTable($table, ['userID' => $userid]);


    if (count($error) === 0) {

        unset($_POST['saveBtn'], $_POST['userID']);

        $username = $_POST['username'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone'];
        $name = $_POST['name'];

        $_SESSION['message'] = 'user data updated successfully!';
        $_SESSION['type'] = 'success';
        $_SESSION['username'] = $username;


        // --- check if user update image or not. ---
        if (isset($_FILES['profilePhoto']['name']) && !empty($_FILES['profilePhoto']['name'])) {
            unlink('../Assets/img/' . $profilePhote);
            $file = $_FILES['profilePhoto']['name'];
            $destination = '../Assets/img/';

            updateRecord3($table, $file, $userid);
            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $destination . $file);
        } else {
            // for the original photo
        }

        updateRecord2($table, $username, $email, $name, $phoneNumber, $userid);
        header('location: profile.php?userID=' . $userid);

        exit();
    }
    // ----- otherwise, keep the data that already typed by user, no need to type again. -----
    else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
    }
}
// ----- for update password of user -----
if (isset($_POST['changePassBtn'])) {
    $userid = $_POST['userID'];
    $error = validateUserUpdatePass($_POST, $userid);

    if (count($error) === 0) {

        unset($_POST['saveBtn'], $_POST['userID']);

        $_POST['newPassword'] = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $newPasswordConf = $_POST['newPasswordConf'];


        $_SESSION['message'] = 'user data updated successfully!';
        $_SESSION['type'] = 'success';
        $_SESSION['username'] = $username;
        updateRecord($table, $username, $newPassword, $email, $name, $phoneNumber, $userid);
        header('location: profile.php?userID=' . $userid);


        exit();
    }
    // ----- otherwise, keep the data that already typed by user, no need to type again. -----
    else {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $newPasswordConf = $_POST['newPasswordConf'];
    }
}
