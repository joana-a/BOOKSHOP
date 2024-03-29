<?php
require "../settings/connection.php";

if(isset($_POST["signupButton"])){
    $firstname= $_POST["firstName"];
    $lastname= $_POST["lastName"];
    $gender= $_POST["gender"];
    $dob= $_POST["dob"];
    $phonenumber= $_POST["phoneNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   

    $hash = password_hash($password, PASSWORD_DEFAULT); 

    
    $insertquery= "INSERT INTO Users (role_id, fname, lname, gender, pno, dob, email, passwd)
    VALUES (2, '$firstname', '$lastname', '$gender',  '$phonenumber', '$dob', '$email', '$hash')" ;

    if (mysqli_query($mysqli, $insertquery)) {
        header("Location: ../login/login.php");
        exit();
    } else {
        echo "Error: " . $insertquery . "<br>" . mysqli_error($mysqli);
    }



}

