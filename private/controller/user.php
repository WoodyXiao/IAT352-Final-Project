<!-- ---------- for calling login or register user in here, then passing to the login.php, register.php ---------- -->
<?php
//include "../private/database/db.php";
//include "../private/helpers/validate.php";

$error = array(); // ---> collect the error message into an array.
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$phone = '';
$name = '';
$table = 'member'; // ---> table name.

// ---------- for the login function ----------
function loginUser($user)
{
    // --- log user in ---
    // --- user information that need to be stored in the session
    $_SESSION['userID'] = $user['userID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['message'] = 'logged in successfully';
    $_SESSION['type'] = 'success';

    if ($_SESSION['artID']) {
        $artID = $_SESSION['artID'];
        header('location: art_detail.php?id=' . $artID);
    } else {
        header('location: index.php');
    }

    exit();
}

// ---------- for the register part -----------
if (isset($_POST['register-btn'])) { // ---> When user clicked the submit button.

    $error = validateUser($_POST); // ---> calling the validatUser that created in validate.php

    // ----- if no errors, then execute the function of register -----
    if (count($error) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);

        // --- hash the password entered by user.
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // --- call the create function from the db.php
        $user_id = createRecord($table, $_POST['username'], $_POST['password'], $_POST['email'], $_POST['name'], $_POST['phone']);
        $user = selectOneByOneTable($table, ['userID' => $user_id]);

        loginUser($user); // ---> call the login function.
    }
    // ----- otherwise, keep the data that already typed by user, no need to type again. -----
    else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
    }
}

// ---------- for the login part -----------
if (isset($_POST['login-btn'])) { // ---> When user clicked the submit button.

    $error = validateLogin($_POST); // ---> calling the validatUser that created in validate.php

    // ----- if no errors, then execute the function of register -----
    if (count($error) === 0) {
        $user = selectOneByOneTable($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($error, 'Wrong password or username');
        }
    }
    // ----- otherwise, keep the data that already typed by user, no need to type again. -----
    else {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}

?>