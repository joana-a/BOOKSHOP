<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase - Bookshop Management System</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Purchase</h1>
        <form action="../action/purchase.php" method="post" class="form">
            <input type="text" name="book_title" placeholder="Book Title" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="text" name="customer_name" placeholder="Your Name" required>
            <input type="email" name="customer_email" placeholder="Your Email" required>
            <button type="submit">Purchase</button>
        </form>
    </div>
</body>

<script>
    function validatePurchaseForm() {
        var bookTitle = document.getElementById("bookTitle").value;
        var quantity = document.getElementById("quantity").value;
        var customerName = document.getElementById("customerName").value;
        var customerEmail = document.getElementById("customerEmail").value;

        if (bookTitle.trim() === "" || quantity.trim() === "" || customerName.trim() === "" || customerEmail.trim() === "") {
            alert("Please fill in all fields.");
            return false;
        }
        return true;
    }
</script>


</html>
