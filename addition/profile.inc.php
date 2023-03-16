<?php

session_start();

include '../config/db_connect.php';

// Get posted information from the profil page
$newpassword = @$_POST['new_password'];
$oldpassword = @$_POST['old_password'];
$newemail = @$_POST['new_email'];
$newanrede = @$_POST['new_title'];
$newvorname = @$_POST['new_firstname'];
$newnachname = @$_POST['new_lastname'];
$newstatus = @$_POST['new_status'];

// check if the old password is correct
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// if the oldpassword is correct 
if (password_verify($oldpassword, $row['password'])) {

    $userprofile = $_SESSION['username'];
    $newhashedpassword = password_hash($newpassword, PASSWORD_DEFAULT);

    $sql_to_change = "UPDATE users
          SET  password = ?, email = ?, title = ?, firstname = ?, lastname = ?, status = ?
          WHERE username = '$userprofile'";

    // mysqli_query($conn, $sql_to_change);
    // protection from injecting
    $stmt = $conn->prepare($sql_to_change);
    $stmt->bind_param("ssssss", $newhashedpassword, $newemail, $newanrede, $newvorname, $newnachname, $newstatus);
    $result = $stmt->execute();
    echo 'You have changed your password successfully.';
    header('Refresh: 1; URL =../index.php?menu=users');
    exit();
} else {
    echo 'Error';
    exit();
}
