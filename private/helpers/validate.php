<!-- -------------------- for the validate user login or register part --------------------  -->
<?php

function validateUser($user)
{
    $error = array(); // ---> collect error messages into an array.
    if (empty($user['username'])) {
        array_push($error, 'Username is required');
    }
    if (empty($user['email'])) {
        array_push($error, 'Email is required');
    }
    if (empty($user['password'])) {
        array_push($error, 'Password is required');
    }
    if (empty($user['phone'])) {
        array_push($error, 'Phone number is required');
    }
    if (empty($user['name'])) {
        array_push($error, 'Name is required');
    }
    if ($user['password'] != $user['passwordConf']) {
        array_push($error, 'Password do not match');
    }

    // ----- calling the selectOne function to check if is the same email address as the record of the member table -----
    $existingUser = selectOneByOneTable('member', ['username' => $user['username']]);
    if ($existingUser) {
        array_push($error, 'Username already registered');
    }
    // ----- same as above, check if the same emial address as the record of the member table ----- 
    $existingEmail = selectOneByOneTable('member', ['email' => $user['email']]);
    if ($existingEmail) {
        array_push($error, 'Email already registered');
    }

    return $error; // ---> return $error array.
}

// ---------- for the validate login function ---------- 
function validateLogin($user)
{
    $error = array(); // ---> collect error messages into an array.

    // ----- checking if all form fields are filled or not -----
    if (empty($user['username'])) {
        array_push($error, 'Username is required');
    }
    if (empty($user['password'])) {
        array_push($error, 'Password is required');
    }
    return $error; // ---> return $error array.
}
