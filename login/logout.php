<?php
include_once '../settings/connection.php';
session_start();

unset($_SESSION['user_id']); 
unset($_SESSION['user_role']); 

header("Location: ../login/login.php");

exit();