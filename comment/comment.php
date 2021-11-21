<?php
include('../private/initialize.php');
include("../private/database/db.php");

if (isset($_POST['comment_load_data'])) {
    $artID = $_POST['artID'];
    $comments_query = "SELECT * FROM comment WHERE artID = $artID";
    $comments_query_run = mysqli_query($conn, $comments_query);

    $array_result = [];

    if (mysqli_num_rows($comments_query_run) > 0) {
        foreach ($comments_query_run as $row) {
            $user_id = $row['userID'];
            $user_query = "SELECT * FROM member WHERE userID ='$user_id' LIMIT 1";
            $user_query_run = mysqli_query($conn, $user_query);
            $user_result = mysqli_fetch_array($user_query_run);
            array_push($array_result, ['cmt' => $row, 'user' => $user_result]);
        }
        echo json_encode($array_result); // ---> { {cmt:{}, user:{}}, {cmt:{}, user:{}}...};
        exit();
    } else {
        $array_result = "There is no comment now, post a comment if you like.";
        echo json_encode($array_result);
        exit;
    }
}

// ----- for insert comment into databast -----
if (isset($_POST['add_comment'])) {
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);
    $artID = $_POST['artID'];
    $user_id = $_SESSION['userID'];

    $comment_add_query = "INSERT INTO comment (userID, artID, commentText) VALUES ('$user_id', '$artID', '$msg')";
    $result = mysqli_query($conn, $comment_add_query);
}
