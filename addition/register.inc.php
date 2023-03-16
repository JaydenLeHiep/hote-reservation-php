<?php
session_start();
include '../config/db_connect.php';




$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$anrede = $_POST['anrede'];
$vor = $_POST['vorname'];
$nach = $_POST['nachname'];
$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
$status = 'active';
//echo "<h2> Successful Registation </h2";


//check if two password match of not
if($password1 !== $password2){
    echo "Passwords do not match";
    exit;
}

    

// check if user is already existed
$sql_check = "SELECT * FROM `users` WHERE `username` = '$username';";
if (mysqli_query($conn, $sql_check)->num_rows > 0) {
    echo "<h3>User is already existing.</h3>";   //################################################################
    exit;
} 

//insert user to database
$sql_insert = "INSERT INTO `users` (`username`, `password`, `email`, `title`, `firstname`, `lastname`, `status`) VALUES (? , ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("sssssss", $username, $hashed_password, $email, $anrede, $vor, $nach, $status);
$result = $stmt->execute();


if ($result) {
    $_SESSION['status'] = $status;
    header('Refresh: 0; URL =../index.php?menu=login');
} else {
    echo "ERROR: Hush! Sorry $sql. ";
}

// Close connection
// mysqli_close($conn);

?>