<?php

include '../settings/connection.php';

session_start();

$user_id = $_SESSION['user_id'];

// // Check if user_id is set in session
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to login page or handle the absence of user_id appropriately
//     // For example:
//     header('Location: login.php');
//     exit(); // Stop further execution of the script
// }

// Add book to wishlist
if(isset($_POST['add_to_wishlist'])){
   $product_name = $_POST['title'];
   $product_price = $_POST['price'];
   $product_image = $_POST['bookcover'];
   $product_quantity = 1; // Default quantity for wishlist
   $check_wishlist = mysqli_query($mysqli, "SELECT * FROM `wishlist` WHERE title = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_wishlist) > 0){
      $message[] = 'already added to wishlist!';
   }else{
      mysqli_query($mysqli, "INSERT INTO `wishlist`(user_id, title, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to wishlist!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wishlist</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../views/header.php'; ?>

<div class="heading">
   <h3>Wishlist</h3>
   <p> <a href="../views/home.php">Home</a> / Wishlist </p>
</div>

<section class="wishlist">

   <h1 class="title">Books You Like</h1>

   <div class="box-container">
      <?php
         $select_wishlist = mysqli_query($mysqli, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_wishlist) > 0){
            while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){   
      ?>
      <div class="box">
         <a href="../views/wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="fas fa-times" onclick="return confirm('Remove from wishlist?');"></a>
         <img src="uploaded_img/<?php echo $fetch_wishlist['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_wishlist['title']; ?></div>
         <div class="price">$<?php echo $fetch_wishlist['price']; ?>/-</div>
         <!-- Add functionality to move to cart if desired -->
         <!-- <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_wishlist['id']; ?>">
            <input type="number" min="1" name="cart_quantity" value="1">
            <input type="submit" name="move_to_cart" value="Add to Cart" class="option-btn">
         </form> -->
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">Your wishlist is empty</p>';
      }
      ?>
   </div>

</section>

<?php include '../views/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>
