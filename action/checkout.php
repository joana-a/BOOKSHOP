<?php
session_start(); 

include '../settings/connection.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (!isset($_SESSION['user_id'])) {
   header('location:../login/login.php');
   exit();
}


if(isset($_POST['order_btn'])){
   $name = mysqli_real_escape_string($mysqli, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($mysqli, $_POST['email']);
   $method = mysqli_real_escape_string($mysqli, $_POST['method']);
   $address = mysqli_real_escape_string($mysqli, 'house no. '. $_POST['house'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['suburb']. ', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('Y-m-d');
   $cart_total = 0;
   $cart_products = array();
   $total_products_count = 0;

   $cart_query = mysqli_query($mysqli, "SELECT cart.*, books.title, books.price, books.bookcover, cart.cart_id FROM `cart` INNER JOIN `books` ON cart.book_id = books.book_id WHERE cart.user_id = '$user_id'") or die('Query failed');
       
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['title'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
         
         $total_products_count += $cart_item['quantity'];
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($mysqli, "SELECT * FROM `orders` WHERE user_id = '$user_id' AND address = '$address' AND total_products = '$total_products' AND total_amount = '$cart_total'") or die('Query faileddd');

   if($cart_total == 0){
      $message = 'Your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message = 'Order already placed!'; 
      }else{
         mysqli_query($mysqli, "INSERT INTO `orders`(user_id, address, total_products, total_amount, method, order_date) VALUES('$user_id', '$address', '$total_products', '$cart_total', '$method', '$placed_on')") or die('Query failed');
         $message = 'Order placed successfully!';
         mysqli_query($mysqli, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('Query failed');
      }
   } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php include '../views/header.php'; ?>

<div class="heading">
   <h3>Checkout</h3>
   <p><a href="../views/home.php">Home</a> / Checkout</p>
</div>

<section class="display-order">
   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($mysqli, "SELECT cart.*, books.title, books.price, books.bookcover, cart.cart_id FROM `cart` INNER JOIN `books` ON cart.book_id = books.book_id WHERE cart.user_id = '$user_id'") or die('Query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['title']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Grand total: <span>$<?php echo $grand_total; ?>/-</span> </div>
</section>

<section class="checkout">

   <form action="" method="POST">
      <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name:</span>
            <input type="text" name="name" required placeholder="Enter your name">
         </div>
         <div class="inputBox">
            <span>Your Number:</span>
            <input type="number" name="number" required placeholder="Enter your number">
         </div>
         <div class="inputBox">
            <span>Your Email:</span>
            <input type="email" name="email" required placeholder="Enter your email">
         </div>
         <div class="inputBox">
            <span>Payment Method:</span>
            <select name="method">
               <option value="cash on delivery">Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 1:</span>
            <input type="number" min="0" name="house" required placeholder="e.g. House No.">
         </div>
         <div class="inputBox">
            <span>Address Line 2:</span>
            <input type="text" name="street" required placeholder="e.g. Street Name">
         </div>
         <div class="inputBox">
            <span>City:</span>
            <input type="text" name="city" required placeholder="e.g. Takoradi">
         </div>
         <div class="inputBox">
            <span>Suburb:</span>
            <input type="text" name="suburb" required placeholder="e.g. Anaji">
         </div>
         <div class="inputBox">
            <span>Country:</span>
            <input type="text" name="country" required placeholder="e.g. Ghana">
         </div>
         <div class="inputBox">
            <span>Pin:</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <input type="submit" value="Order Now" class="btn" name="order_btn">
   </form>

</section>

<?php include '../views/footer.php'; ?>
<script src="../js/script.js"></script>
</body>
</html>
