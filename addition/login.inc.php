<?php

    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    include '../config/db_connect.php';

    $username = $_POST['username'];
    $pw = $_POST['password'];
    


    $sql_check_login = "SELECT user_id, username, password, email, title, firstname, lastname, status
    FROM `users` WHERE `username` = ?  ";


    $stmt = $conn->prepare($sql_check_login);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userid, $username, $password, $email, $anrede, $vorname, $nachname, $status);
    // check if user is in the database to login
    if($status = 'active'){
        if($stmt->num_rows == 1 ){
            $stmt->fetch();
            if(password_verify($pw, $password)){
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $userid;
                $_SESSION['email'] = $email;
                $_SESSION['anrede'] = $anrede;
                $_SESSION['vorname'] = $vorname;
                $_SESSION['nachname'] = $nachname;
                $_SESSION['password'] = $password;  //###################################################################################
    
                //ADMIN
                if($username == 'elias_real' || $username == 'hiep_real')
                {
                    $_SESSION['admin'] = 1;
                }
                else {
                    $_SESSION['admin'] = 0;
                }

                //echo "Login sucessful";
    
        
            }else{
                $_SESSION = [];
                session_destroy();
            }
            
    
            
        }
        else{
            echo "Error with this username and password";
            $_SESSION = [];
            session_destroy();
        }
        
       
    
        header('Refresh: 0; URL =../index.php?menu=home');
    }
    else {
        header('Refresh: 1; URL =../index.php?menu=login?status=inactive');
    }
