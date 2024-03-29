<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookshop Home Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #000;
    }
    /* Header styles */
    header {
      background-color: #ff69b4;
      padding: 20px;
      text-align: left;
      font-size: 18px;
    }
    header h1 {
      margin: 0;
      font-size: 28px;
      color: black;
    }
    /* Navigation styles */
    nav {
      background-color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    nav a {
      color: #ff69b4;
      text-decoration: none;
      margin: 0 20px;
      font-size: 18px;
    }
    /* Search bar styles */
    .search-bar {
      text-align: center;
      margin-bottom: 20px;
    }
    .search-bar input[type="text"] {
      padding: 10px;
      width: 300px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    .search-bar input[type="submit"] {
      padding: 10px 20px;
      background-color: #ff69b4;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    /* Main content styles */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    /* Book carousel styles */
    .carousel {
      display: flex;
      overflow-x: auto;
      scrollbar-width: none; /* Hide scrollbar for Chrome and Edge */
      -ms-overflow-style: none; /* Hide scrollbar for IE and Edge */
    }
    .carousel::-webkit-scrollbar {
      display: none; /* Hide scrollbar for Firefox */
    }
    .book {
      flex: 0 0 auto;
      margin-right: 20px;
      border-radius: 10px;
      overflow: hidden;
    }
    .book img {
      width: 200px;
      height: 300px;
      object-fit: cover;
    }
    /* Featured books section */
    .featured-books {
      margin-top: 50px;
    }
    .featured-books h2 {
      font-size: 24px;
      color: #ff69b4;
    }
    .featured-books .book-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .featured-books .book {
      margin: 20px;
    }
    /* Footer styles */
    footer {
      background-color: #ff69b4;
      padding: 1px 0;
      text-align: center;
      color: #fff;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <h1><em>a book a day...?</em></h1>
    <div class="search-bar">
      <form action="#" method="GET">
        <input type="text" name="search" placeholder="Search for books...">
        <input type="submit" value="Search">
      </form>
    </div>
  </header>
  <nav>
    <a href="..views/wishlist.php">Wishlist</a>
    <a href="../views/cart.php">Cart</a>
  </nav>
  <div class="container">
    <!-- Book Carousel -->
    <div class="carousel">
      <div class="book">
        <img src="book1.jpg" alt="Book 1">
      </div>
      <div class="book">
        <img src="book2.jpg" alt="Book 2">
      </div>
      <div class="book">
        <img src="book3.jpg" alt="Book 3">
      </div>
      <!-- Add more book covers here -->
    </div>
    <!-- Featured Books Section -->
    <section class="featured-books">
      <h2>Featured Books</h2>
      <div class="book-list">
        <div class="book">
          <img src="book4.jpg" alt="Book 4">
        </div>
        <div class="book">
          <img src="book5.jpg" alt="Book 5">
        </div>
        <div class="book">
          <img src="book6.jpg" alt="Book 6">
        </div>
        <!-- Add more featured books here -->
      </div>
    </section>
    <!-- Popular Categories Section -->
    <section class="popular-categories">
      <h2>Popular Categories</h2>
      <ul>
        <li>Fiction</li>
        <li>Non-Fiction</li>
        <li>Mystery</li>
        <li>Romance</li>
        <li>Fantasy</li>
        <!-- Add more popular categories here -->
      </ul>
    </section>
    <!-- Author Spotlights Section -->
    <section class="author-spotlights">
      <h2>Author Spotlights</h2>
      <ul>
        <li>J.K. Rowling</li>
        <li>Stephen King</li>
        <li>Jane Austen</li>
        <li>Agatha Christie</li>
        <li>George R.R. Martin</li>
        <!-- Add more author spotlights here -->
      </ul>
    </section>
  </div>
  <footer>
    <p>&copy; 2024 jo's library<3. All rights reserved.</p>
  </footer>
</body>
</html>

