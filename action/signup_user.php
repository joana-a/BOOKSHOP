<?php
include "../settings/connection.php";

if(isset($_POST["signupButton"])){
    $firstname= $_POST["firstName"];
    $lastname= $_POST["lastName"];
    $gender= $_POST["gender"];
    $dob= $_POST["dob"];
    $phonenumber= $_POST["phoneNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword= $_POST["confirmPassword"];
   
    // Check if email already exists
    $select_users = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'");

    if (!$select_users) {
        $message[] = 'Error in database query: ' . mysqli_error($mysqli);
    } else {
        if (mysqli_num_rows($select_users) > 0) {
            $message[] = 'This email is already registered to an account! Try signing up with a new email account or log in with this email.';
        } else {
            if ($password != $cpassword) {
                $message[] = 'Passwords do not match!';
            } else {
                
                $hash = password_hash($password, PASSWORD_DEFAULT);

                
                $insertquery= "INSERT INTO users (role_id, fname, lname, gender, pno, dob, email, password)
                    VALUES (2, '$firstname', '$lastname', '$gender',  '$phonenumber', '$dob', '$email', '$hash')" ;

                if (mysqli_query($mysqli, $insertquery)) {
                    $successmessage[] = 'Successfully registered!';
                    header("Location: ../login/login.php");
                    exit();
                } else {
                    echo "Error: " . $insertquery . "<br>" . mysqli_error($mysqli);
                }
            }
        }
    }
}  

// Debugging: Check if there are any messages to display
if (isset($message)) {
    foreach ($message as $msg) {
        echo $msg . "<br>";
    }
}
if (isset($successmessage)) {
    foreach ($successmessage as $msg) {
        echo $msg . "<br>";
    }
}
?>
