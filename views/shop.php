<?php

include '../settings/connection.php';
session_start();
 $user_id = $_SESSION['user_id']; 

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $product_id= $_POST['book_id'];

   $check_cart_numbers = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE book_id = '$product_id' AND user_id = '$user_id'") or die('Query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message = 'already added to cart!';
   }else{
      mysqli_query($mysqli, "INSERT INTO `cart`(user_id, book_id, quantity) VALUES('$user_id', '$product_id', '$product_quantity')") or die('query failed');
      $message = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../views/header.php'; ?>

<div class="heading">
   <h3>our shop</h3>
   <p> <a href="../views/home.php">home</a> / shop </p>
</div>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($mysqli, "SELECT * FROM `books`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
     <img class="image" src="../bookcovers/<?php echo $fetch_products['bookcover']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['title']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['title']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['bookcover']; ?>">
      <input type="hidden" name="book_id" value="<?php echo $fetch_products['book_id']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<?php include '../views/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>