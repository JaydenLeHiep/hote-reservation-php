<?php

session_start();

include '../config/db_connect.php';

$resid = @$_POST['res_id'];
$newstatus = @$_POST['new_status'];


$sql = "SELECT * FROM reservations WHERE 
    res_id = '$resid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {

    $sql_to_change = "UPDATE reservations
          SET status = ?
          WHERE res_id = '$resid'";

    $stmt = $conn->prepare($sql_to_change);
    $stmt->bind_param("s", $newstatus);
    $result = $stmt->execute();
    header('Refresh: 1; URL =../index.php?menu=allres');
    exit();
} else {
    echo 'Error';
    exit();
}
