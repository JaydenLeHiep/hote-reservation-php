<?php
session_start();
include '../config/db_connect.php';

$room_nr = @$_POST['book_rnr'];
$from_date = @$_POST['book_from'];
$until_date = @$_POST['book_until'];
$notes_txt = @$_POST['book_notes'];
$pets_check = @$_POST['book_pets'];
$park_check = @$_POST['book_parking'];
$too_rich_check = @$_POST['book_floor'];

//find room_id to room_nr
$sql_find = "SELECT room_id FROM rooms WHERE room_nr = " . $room_nr;
$stmt = $conn->prepare($sql_find);
$room_id = mysqli_query($conn, $sql_find);
$room_id = mysqli_fetch_assoc($room_id);

$stmt = NULL;
// check if available
$sql_check = "SELECT * FROM reservations WHERE room_id = " . $room_id['room_id'];
/* $stmt = $conn->prepare($sql_check);
$check = $stmt->execute(); */

if (mysqli_query($conn, $sql_check)->num_rows > 0) {
    echo "<h3>Room has already been taken, sorry!</h3>";   //################################################################
    exit;
} else {
    $status = 'new';

    //insert reservation into database
    $sql_insert = "INSERT INTO `reservations` (`user_ID`, `room_ID`, `from_date`, `until_date`, `notes`, `pets`, `parking`, `status`) VALUES (? , ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssssssss", $_SESSION['userid'], $room_id['room_id'], $from_date, $until_date, $notes_txt, $pets_check, $park_check, $status);
    $result = $stmt->execute();
   


    /* if ($result) {
    $_SESSION['status'] = $status;
    header('Refresh: 3; URL = index.php?menu=login');
} else {
    echo "ERROR: Hush! Sorry $sql. ";
} */

    // Close connection
    // mysqli_close($conn);


    header('Refresh: 1; URL =../index.php?menu=booking');
}
