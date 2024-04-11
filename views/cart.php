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

if(isset($_POST['update_cart'])){
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity']; 
    mysqli_query($mysqli, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE cart_id = '$cart_id'") or die('Query update failed');
    $message = 'Cart quantity updated!';
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE  FROM `cart` WHERE cart_id = '$delete_id'") or die('Query delete failed');
    header('location:../views/cart.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($mysqli, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('Query delete all failed');
    header('location:../views/cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../views/header.php'; ?>

<div class="heading">
    <h3>Shopping Cart</h3>
    <p><a href="../views/home.php">Home</a> / Cart</p>
</div>

<section class="shopping-cart">

    <h1 class="title">Books Added</h1>

    <div class="box-container">
        <?php
        $grand_total = 0;
        $select_cart = mysqli_query($mysqli, "SELECT cart.*, books.title, books.price, books.bookcover, cart.cart_id FROM `cart` INNER JOIN `books` ON cart.book_id = books.book_id WHERE cart.user_id = '$user_id'") or die('Query failed');
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                ?>
                <div class="box">
                    <a href="../views/cart.php?delete=<?php echo $fetch_cart['cart_id']; ?>" class="fas fa-times" onclick="return confirm('Delete this from cart?');"></a>
                    <img class="image" src="../bookcovers/<?php echo $fetch_cart['bookcover']; ?>" alt="">
                    <div class="name"><?php echo $fetch_cart['title']; ?></div>
                    <div class="price">$<?php echo $fetch_cart['price']; ?>/-</div>
                    <form action="" method="post">
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                        <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['bookcover']; ?>">
                        <input type="submit" name="update_cart" value="Update" class="option-btn">
                    </form>
                    <div class="sub-total"> Subtotal: <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
                </div>
                <?php
                $grand_total += $sub_total;
            }
        } else {
            echo '<p class="empty">Your cart is empty</p>';
        }
        ?>
    </div>

    <div style="margin-top: 2rem; text-align:center;">
        <a href="../views/cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 0) ? '' : 'disabled'; ?>" onclick="return confirm('Delete all from cart?');">Delete All</a>
    </div>

    <div class="cart-total">
        <p>Grand Total: <span>$<?php echo $grand_total; ?>/-</span></p>
        <div class="flex">
            <a href="../views/shop.php" class="option-btn">Continue Shopping</a>
            <a href="../action/checkout.php" class="btn <?php echo ($grand_total > 0) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
        </div>
    </div>

</section>

<?php include '../views/footer.php'; ?>
<script src="../js/script.js"></script>

</body>
</html>
