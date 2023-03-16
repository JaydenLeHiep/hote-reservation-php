<?php

session_start();

include '../config/db_connect.php';

// Get posted information from the profil page
$username = @$_POST['edit_username'];
$newpassword = @$_POST['new_password'];
$newemail = @$_POST['new_email'];
$newanrede = @$_POST['new_title'];
$newvorname = @$_POST['new_firstname'];
$newnachname = @$_POST['new_lastname'];
$newstatus = @$_POST['new_status'];

$newhashedpassword = password_hash($newpassword, PASSWORD_DEFAULT);


$sql = "SELECT * FROM users WHERE 
    username = '$username' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {

    $sql_to_change = "UPDATE users
          SET  password=?, email = ?, title = ?, firstname = ?, lastname = ?, status = ?
          WHERE username = '$username'";

    // mysqli_query($conn, $sql_to_change);
    // protection from injecting
    $stmt = $conn->prepare($sql_to_change);
    $stmt->bind_param("ssssss", $newhashedpassword, $newemail, $newanrede, $newvorname, $newnachname, $newstatus);
    $result = $stmt->execute();
    header('Refresh: 1; URL =../index.php?menu=users');
    exit();
} else {
    echo 'Error';
    exit();
}
