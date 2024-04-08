<?php
session_start();
require "../settings/connection.php";

if (isset($_POST["signInButton"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


    $selectquery = "SELECT * FROM users WHERE email= '$email'";

    if ($result = mysqli_query($mysqli, $selectquery)) {
        if ($result->num_rows > 0) {
            $results = mysqli_fetch_assoc($result);



            if (password_verify($password, $results['password'])) {            
                $_SESSION["user_id"] = $results['user_id'];
                $_SESSION["user_role"] = $results['role_id'];



                header("Location: ../views/home.php");
            } 
            
            else {
                echo 'Invalid password.';
            }
        } else {
            header("Location: ../login/login.php");
        }
    }
} else {
    echo "You have not submitted your login information";
    header("Location: ../login/login.php");
    exit();
}