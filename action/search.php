<?php

include '../settings/connection.php';

session_start();

$user_id = isset( $_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $product_id = $_POST['product_id'];

   $check_cart_numbers = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE book_id = '$product_id' AND user_id = '$user_id'") or die('Query failed');
   
   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message = 'already added to cart!';
   }else{
      mysqli_query($mysqli, "INSERT INTO `cart`(user_id, book_id, quantity) VALUES('$user_id', '$product_id', '$product_quantity')");
      $message = 'product added to cart!';
   }

};

