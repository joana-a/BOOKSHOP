<?php
include '../settings/connection.php';
session_start();

$user_id = isset( $_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['title'];
   $product_price = $_POST['price'];
   $product_quantity = $_POST['product_quantity'];
   $product_id= $_POST['book_id'];
   $bookcover= $_POST['image'];
   
   $check_cart_numbers = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE book_id = '$product_id' AND user_id = '$user_id'") or die('Query failed');
   
   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message = 'Product already added to cart!';
   }else{
      // mysqli_query($mysqli, "INSERT INTO `cart`(user_id, book_id, quantity) VALUES('$user_id', '$product_id', '$product_quantity')") or die('Query failed');
      mysqli_query($mysqli, "INSERT INTO `cart`(user_id, book_id, quantity) VALUES('$user_id', '$product_id', '$product_quantity')");
      $message = 'Product added to cart!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   
<?php include '../views/header.php'; ?>

<section class="home">
   <div class="content">
      <h3>Discover your next great read here at Jo's! <3</h3>
      <p>There's no friend as loyal as a book!</p>
   </div>
</section>

<section class="products">
   <h1 class="title">Latest Additions</h1>
   <div class="box-container">
      <?php  
         $select_products = mysqli_query($mysqli, "SELECT * FROM `books` LIMIT 9") or die('Query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
               ?>
               <form action="" method="post" class="box">
                  <img class="image" src="../bookcovers/<?php echo $fetch_products['bookcover']; ?>" alt="">
                  <div class="title"><?php echo $fetch_products['title']; ?></div>
                  <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                  <input type="number" min="1" name="product_quantity" value="1" class="qty">
                  <input type="hidden" name="title" value="<?php echo $fetch_products['title']; ?>">
                  <input type="hidden" name="price" value="<?php echo $fetch_products['price']; ?>">
                  <input type="hidden" name="book_id" value="<?php echo $fetch_products['book_id']; ?>">
                  <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
               </form>
               <?php
            }
         }else{
            echo '<p class="empty">We are out of stock :(</p>';
         }
      ?>
   </div>
   <?php if(isset($message)) echo $message; ?> 
   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="../views/discover.php" class="option-btn">Load More</a>
   </div>
</section>

<section class="about">
   <div class="flex">
      <div class="image">
         <img src="../assets/about.jpg" alt="">
      </div>
      <div class="content">
         <h3>About Us</h3>
         <p>Welcome to Jo's!, a haven for book lovers of all ages! We're passionate about connecting readers with their next great read. Whether you're searching for the latest bestsellers, timeless classics, or hidden gems waiting to be discovered, our carefully curated collection has something for everyone. We strive to create a welcoming space where book enthusiasts can indulge in their love for reading. Happy shopping!</p>
         <a href="../views/about.php" class="btn">Read More About Us Here</a>
      </div>
   </div>
</section>

<section class="home-contact">
   <div class="content">
      <h3>Have any questions?</h3>
      <p>Follow any of the links below to contact us on our social media pages</p>
   </div>
</section>

<?php include '../views/footer.php'; ?>

<script src="../js/script.js"></script>

</body>
</html>
