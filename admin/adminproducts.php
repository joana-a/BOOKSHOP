<?php

session_start(); 

include '../settings/connection.php';
include '../action/adminaddbooks.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if (!isset($_SESSION['user_id'])) {
   header('location:../login/login.php');
   exit();
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($mysqli, "SELECT bookcover FROM `books` WHERE book_id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('../bookcovers/'.$fetch_delete_image['bookcover']);
   mysqli_query($mysqli, "DELETE FROM `books` WHERE book_id = '$delete_id'") or die('query failed');
   header('location:../admin/adminproducts.php');
}


if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($mysqli, "UPDATE `books` SET title = '$update_name', price = '$update_price' WHERE book_id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = '../bookcovers/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($mysqli, "UPDATE `books` SET bookcover = '$update_image' WHERE book_id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('../bookcovers/'.$update_old_image);
      }
   }

   header('location:../admin/adminproducts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>books</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
   
<?php include '../admin/admin_header.php'; ?>



<section class="add-books">

   <h1 class="title">shop books</h1>

   <form action="../action/adminaddbooks.php" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="title" class="box" placeholder="enter book title" required>
      <input type="text" name="author" class="box" placeholder="enter author's name" required>
      <input type="text" name="genre" class="box" placeholder="enter book genre" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter book price" required>
      <input type="number" name="quantity" class="box" placeholder="enter book quantity" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>



<section class="show-products">

   <div class="box-container">

      <?php
         $select_books = mysqli_query($mysqli, "SELECT * FROM `books`") or die('query failed');
         if(mysqli_num_rows($select_books) > 0){
            while($fetch_books = mysqli_fetch_assoc($select_books)){
      ?>
      <div class="box">
         <img src="../bookcovers/<?php echo $fetch_books['bookcover']; ?>" alt="">
         <div class="name"><?php echo $fetch_books['title']; ?></div>
         <div class="price">$<?php echo $fetch_books['price']; ?>/-</div>
         <a href="../admin/adminproducts.php?update=<?php echo $fetch_books['book_id']; ?>" class="option-btn">update</a>
         <a href="../admin/adminproducts.php?delete=<?php echo $fetch_books['book_id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
     </div>
      <?php
         }
      }else{
         echo '<p class="empty">no books added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($mysqli, "SELECT * FROM `books` WHERE book_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['book_id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['bookcover']; ?>">
      <img src="../bookcovers/<?php echo $fetch_update['bookcover']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['title']; ?>" class="box" required placeholder="enter book title">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter book price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>

<script src="../js/adminscript.js"></script>

</body>
</html>