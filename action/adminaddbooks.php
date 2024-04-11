<?php

include_once '../settings/connection.php';
if (isset($_POST['add_product'])) {

    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // $select_product_name = mysqli_query($mysqli, "SELECT title FROM `books` WHERE title = '$name'") or die('query failed');

    // if (mysqli_num_rows($select_product_name) > 0) {
    //     $message = 'this book is already in your database';
    // } else {
    $target_dir = "../bookcovers/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
        } else {
            echo "File is not an image.";
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }else{
        // echo $title;
        // exit;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $add_product_query = mysqli_query($mysqli, "INSERT INTO `books`(title, author, genre, price, quantity, bookcover) VALUES('$title', '$author', '$genre', '$price', '$quantity', '$target_file')") or die('query failedgggg');
    
            if ($add_product_query) {
                $message = 'product added successfully!';
            } else {
                $message = 'product could not be added!';
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    header('location:../admin/adminproducts.php');

    // Allow certain file formats

    // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    //     // if everything is ok, try to upload file
    // } else {

    // echo $name . '<br>'. $author  . '<br>'. $genre . '<br>'. $price . '<br>'. $quantity . '<br>'. $target_file;
    // exit();
}
    // }
