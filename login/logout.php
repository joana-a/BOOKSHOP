<?php
include_once '../settings/connection.php';
session_start();

unset($_SESSION['user_id']); 
unset($_SESSION['role_id']); 

header("Location: ../login/login.php");

exit();