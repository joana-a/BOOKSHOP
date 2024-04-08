<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookshop Home Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
  $('form').submit(function(event) {
    event.preventDefault();

    var query = $('input[name="search"]').val().trim();

    // Perform AJAX request to search endpoint
    $.ajax({
      url: '../action/search.php', 
      method: 'GET',
      data: { search: query },
      success: function(response) {
        displaySearchResults(response);
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
        handleSearchError();
      }
    });
  });

  function displaySearchResults(results) {
    var resultsContainer = $('#search-input'); 
    resultsContainer.empty(); 

    if (results.length === 0) {
      resultsContainer.append('<p>No results found.</p>');
      results.forEach(function(result) {
        var resultItem = $('<div class="search-input"></div>'); 
        resultItem.append('<h3>' + result.title + '</h3>'); 
        resultItem.append('<p>Author: ' + result.author + '</p>'); 
        resultItem.append('<p>Price: $' + result.price + '</p>'); 
        resultsContainer.append(resultItem);
      });
    }
  }


  function handleSearchError() {
    var resultsContainer = $('#search-results');
    resultsContainer.empty(); 
    resultsContainer.append('<p>Error occurred while searching. Please try again later.</p>'); 
  }
});
  </script>
  
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #000;
    }
    
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
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .carousel {
      display: flex;
      overflow-x: auto;
      scrollbar-width: none; 
      -ms-overflow-style: none; 
    }
    .carousel::-webkit-scrollbar {
      display: none; 
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
    
    .featured-books {
      margin-top: 50px;
      display: flex;
      overflow-x: auto;
      scrollbar-width: none; 
      -ms-overflow-style: none; 
    }
    .featured-books::-webkit-scrollbar {
      display: none; 
    }
    .featured-books .book {
      flex: 0 0 auto;
      margin-right: 20px;
      border-radius: 10px;
      overflow: hidden;
    }

    .book-categories {
      margin-top: 50px;
    }
    .book-categories h2 {
      font-size: 24px;
      color: #ff69b4;
    }
    .book-categories .category {
      margin-top: 20px;
      display: flex;
      overflow-x: auto;
      scrollbar-width: none; 
      -ms-overflow-style: none; 
    }
    .book-categories .category::-webkit-scrollbar {
      display: none; 
    }
    .category h3 {
      font-size: 20px;
      color: #ff69b4;
    }
    .category .book {
      flex: 0 0 auto;
      margin-right: 20px;
      border-radius: 10px;
      overflow: hidden;
    }  
    
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
  <form id="search-form">
    <input type="text" id="search-input" name="search" placeholder="Search for books...">
    <button type="submit">Search</button>
  </form>
</div>

    </div>
  </header>
  <nav>
    <a href="../views/wishlist.php">Wishlist</a>
    <a href="../views/cart.php">Cart</a>
    <a href="../views/home.php">Home</a>
  </nav>
  <div class="container">
    <!-- Book Carousel -->
    <div class="carousel">
      <div class="book">
        <img src="../assets/laow.jpg" alt="Book 1">
      </div>
      <div class="book">
        <img src="../assets/lightningthief.jpg" alt="Book 2">
      </div>
      <div class="book">
        <img src="../assets/hp1.jpg" alt="Book 3">
      </div>
      <div class="book">
        <img src="../assets/fourthwing.jpg" alt="Book 4">
      </div>
      <div class="book">
        <img src="../assets/loveredesigned.jpg" alt="Book 5">
      </div>
      <div class="book">
        <img src="../assets/milkandhoney.jpg" alt="Book 6">
      </div>
      <div class="book">
        <img src="../assets/powerles.jpg" alt="Book 7">
      </div>
      <div class="book">
        <img src="../assets/silentpatient.jpg" alt="Book 8">
      </div>
      <div class="book">
        <img src="../assets/evelynhugo.jpg" alt="Book 9">
      </div>
      <div class="book">
        <img src="../assets/unhoneymooners.jpg" alt="Book 10">
      </div>
    </div>
    
<br>
    <h2>Featured Books</h2>
    <section class="featured-books">      
      <div class="book">
        <img src="../assets/termsandconditions.jpg" alt="Book 11">
      </div>
      <div class="book">
        <img src="../assets/emwiuc.jpg" alt="Book 12">
      </div>
      <div class="book">
        <img src="../assets/poppywar.jpg" alt="Book 13">
      </div>
      <div class="book">
        <img src="../assets/ouabh1.jpg" alt="Book 14">
      </div>
      <div class="book">
        <img src="../assets/divinerivals.jpg" alt="Book 15">
      </div>
      <div class="book">
        <img src="../assets/beachread.jpg" alt="Book 16">
      </div>
    </section>

    
    <section class="book-categories">
      <h2>Book Categories</h2>
      <h3><em>African Literature</em></h3>
      <div class="category">
        
        <div class="book">
          <img src="../assets/thingsfallapart.jpg" alt="African Book 1">
        </div>
        <div class="book">
          <img src="../assets/abpp.jpg" alt="African Book 2">
        </div>  
        <div class="book">
          <img src="../assets/natmilam.jpg" alt="African Book 3">
        </div>  
        <div class="book">
          <img src="../assets/purplehibiscus.jpg" alt="African Book 4">
        </div>  
        <div class="book">
          <img src="../assets/hisonlywife.jpg" alt="African Book 5">
        </div>
        <div class="book">
          <img src="../assets/babasegi.jpg" alt="African Book 6">
        </div>          
      </div>

      <h3><em>Non-Fiction</em></h3>
      <div class="category">
        
        <div class="book">
          <img src="../assets/48laws.jpg" alt="Non-Fiction Book 1">
        </div>
        <div class="book">
          <img src="../assets/subtleart.jpg" alt="Non-Fiction Book 2">
        </div>   
        <div class="book">
          <img src="../assets/richdad.jpg" alt="Non-Fiction Book 3">
        </div>   
        <div class="book">
          <img src="../assets/nf4.jpg" alt="Non-Fiction Book 4">
        </div>   
        <div class="book">
          <img src="../assets/nf5.jpg" alt="Non-Fiction Book 5">
        </div>         
      </div>


      <h3><em>Thriller</em></h3>
      <div class="category">
        
        <div class="book">
          <img src="../assets/agggtm.jpg" alt="Mystery Book 1">
        </div>
        <div class="book">
          <img src="../assets/verity.jpg" alt="Mystery Book 2">
        </div>  
        <div class="book">
          <img src="../assets/iftomorrowcomes.jpg" alt="Mystery Book 3">
        </div>  
        <div class="book">
          <img src="../assets/oouil.jpg" alt="Mystery Book 4">
        </div>  
        <div class="book">
          <img src="../assets/silentpatient.jpg" alt="Mystery Book 5">
        </div>        
      </div>

      <h3><em>Romance</em></h3>
      <div class="category">
        
        <div class="book">
          <img src="../assets/loveradio.jpg" alt="Romance Book 1">
        </div>
        <div class="book">
          <img src="../assets/poyw.jpg" alt="Romance Book 2">
        </div>
        <div class="book">
          <img src="../assets/pwmov.jpg" alt="Romance Book 3">
        </div>
        <div class="book">
          <img src="../assets/bttm.jpg" alt="Romance Book 4">
        </div>
        <div class="book">
          <img src="../assets/allyourperfects.jpg" alt="Romance Book 5">
        </div>    
      </div>
      
      <h3><em>Fantasy</em></h3>
      <div class="category">
        
        <div class="book">
          <img src="../assets/fourthwing.jpg" alt="Fantasy Book 1">
        </div>
        <div class="book">
          <img src="../assets/mistborn.jpg" alt="Fantasy Book 2">
        </div>
        <div class="book">
          <img src="../assets/mortal.jpg" alt="Fantasy Book 3">
        </div>
        <div class="book">
          <img src="../assets/achilles.jpg" alt="Fantasy Book 4">
        </div>
        <div class="book">
          <img src="../assets/caraval.jpg" alt="Fantasy Book 5">
        </div>
      </div>
    </section>
  </div>

  <!-- <footer>
    <p>&copy; 2024 jo's library<3. All rights reserved.</p>
  </footer> -->
</body>
</html>
