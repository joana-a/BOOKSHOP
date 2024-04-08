<?php

include '../settings/connection.php';




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

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="name" class="box" placeholder="enter book title" required>
      <input type="text" name="author" class="box" placeholder="enter author's name" required>
      <input type="text" name="genre" class="box" placeholder="enter book genre" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter book price" required>
      <input type="number" name="quantity" class="box" placeholder="enter book quantity" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>



<section class="show-books">

   <div class="box-container">

      <?php
         $select_books = mysqli_query($mysqli, "SELECT * FROM `books`") or die('query failed');
         if(mysqli_num_rows($select_books) > 0){
            while($fetch_books = mysqli_fetch_assoc($select_books)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_books['bookcover']; ?>" alt="">
         <div class="name"><?php echo $fetch_books['title']; ?></div>
         <div class="price">$<?php echo $fetch_books['price']; ?>/-</div>
     </div>
      <?php
         }
      }else{
         echo '<p class="empty">no books added yet!</p>';
      }
      ?>
   </div>

</section>

<script src="../js/adminscript.js"></script>

</body>
</html>