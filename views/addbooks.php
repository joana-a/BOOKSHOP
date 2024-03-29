<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books - Bookshop Management System</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add Books</h1>
        <form action="../views/addbooks.html" method="post" class="form">
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="price" placeholder="Price" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <button type="submit">Add Book</button>
        </form>
    </div>
</body>

<!-- JavaScript for form validation -->
<script>
    function validateAddBookForm() {
        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var genre = document.getElementById("genre").value;
        var price = document.getElementById("price").value;
        var quantity = document.getElementById("quantity").value;

        if (title.trim() === "" || author.trim() === "" || genre.trim() === "" || price.trim() === "" || quantity.trim() === "") {
            alert("Please fill in all fields.");
            return false;
        }
        return true;
    }
</script>


</html>
