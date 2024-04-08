<?php
// session_start();
include_once '../settings/connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $select_cart_number = mysqli_query($mysqli, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    $cart_rows_number = mysqli_num_rows($select_cart_number);
} else {
    $user_id = null;
    $cart_rows_number = 0;
}
?>

<header class="header">
    <div class="header-2">
        <div class="flex">
            <a href="home.php" class="logo">jo's library<3 </a>
            <nav class="navbar">
                <a href="../views/about.php">about</a>
                <a href="../views/shop.php">shop</a>
                <a href="../views/orders.php">orders</a>
                <a href="../views/wishlist.php">wishlist</a>
            </nav>
            <div class="icons">
                <a href="../views/search_page.php" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="../views/cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
            </div>
            <div class="user-box">
                 <a href="../login/logout.php" class="delete-btn">logout</a>
            </div>
        </div>
    </div>
</header>
