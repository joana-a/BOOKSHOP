<?php

include '../settings/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php include '../views/header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="../views/home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="../assets/joslogo.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>We're not just another bookstore — we're a community of book lovers dedicated to providing an exceptional experience for our customers. With a commitment to quality, diversity, and personalized service, we go above and beyond to ensure that every visit to our bookstore is memorable. Our extensive collection features a wide range of genres, authors, and formats, carefully selected to cater to every taste and preference. But what truly sets us apart is our passion for books and our dedication to fostering a love of reading in our community.</p> 
         <p>Whether you're a seasoned bibliophile or just beginning your reading journey, you'll find a warm welcome and a wealth of literary treasures waiting for you at jo's! Come and discover the difference for yourself!</p>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Customers' reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="../assets/akua.jpg" alt="">
         <p>"Absolutely love this bookstore! The cozy atmosphere, friendly staff, and diverse selection of books make it a must-visit for any bookworm. Whether I'm looking for a new release or an old favorite, I always find something intriguing to read. Can't recommend it enough!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Akua Kyerewa Asomaning</h3>
      </div>

      <div class="box">
         <img src="../assets/ewura.jpg" alt="">
         <p>"What a gem of a bookstore! It's like stepping into a literary wonderland every time I walk through the door. The staff's passion for books is infectious, and their recommendations are always spot-on. Plus, the cozy reading nooks are perfect for getting lost in a good book. A book lover's paradise!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ewura Adjoa Wilson</h3>
      </div>

      <div class="box">
         <img src="../assets/lois.jpg" alt="">
         <p>"This bookstore is a true treasure trove! I stumbled upon it while exploring the neighborhood and was immediately captivated by its charm. The selection is extensive, with something for everyone, and the staff are incredibly knowledgeable and helpful. It's become my go-to spot for literary inspiration!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lois Naa Koshie Mills</h3>
      </div>

      <div class="box">
         <img src="../assets/nanaama.jpg" alt="">
         <p>"I've visited this bookstore several times now, and each visit exceeds my expectations. The selection is top-notch, with a great mix of classics and contemporary titles, and the staff are always friendly and eager to assist. It's clear that they take pride in curating a diverse and engaging collection. I could spend hours browsing the shelves!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nana Ama</h3>
      </div>

      <div class="box">
         <img src="../assets/maame.jpg" alt="">
         <p>"As an avid reader, I've visited countless bookstores, but none compare to this one. The ambiance is inviting, the shelves are well-stocked, and the staff are genuinely passionate about books. I always leave feeling inspired and eager to dive into my latest find. A must-visit for any book lover!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Maame Gyanmea</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>"What a delightful bookstore! From the moment I stepped inside, I knew I was in for a treat. The ambiance is cozy and inviting, and the selection of books is unparalleled. Whether you're a casual reader or a serious bibliophile, there's something here for everyone. I've discovered so many new authors and titles thanks to this wonderful bookstore!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Oheneba Dade</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">Top Authors</h1>

   <div class="box-container">

      <div class="box">
         <img src="../assets/rick.jpeg" alt="">
         <div class="share">
            <a href="https://x.com/rickriordan?s=21&t=gDoKxrq_NWgbrJ-RJ-bYFg" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/rickriordan?igsh=aTU5M2dkaXk0Mnk0" class="fab fa-instagram"></a>
         </div>
         <h3>Rick Riordan</h3>
      </div>

      <div class="box">
         <img src="../assets/dan.jpeg" alt="">
         <div class="share">
            <a href="https://x.com/authordanbrown?s=21&t=gDoKxrq_NWgbrJ-RJ-bYFg" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/authordanbrown?igsh=cnZ1eGprenpqZ2N1" class="fab fa-instagram"></a>
         </div>
         <h3>Dan Brown</h3>
      </div>

      <div class="box">
         <img src="../assets/emilyhenry.jpeg" alt="">
         <div class="share">            
            <a href="https://x.com/emilyhenryverse?s=21&t=gDoKxrq_NWgbrJ-RJ-bYFg" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/emilyhenrywrites?igsh=MTBoN3gzamxib3Jwag==" class="fab fa-instagram"></a>           
         </div>
         <h3>Emily Henry</h3>
      </div>

      <div class="box">
         <img src="../assets/chima.jpeg" alt="">
         <div class="share">           
            <a href="https://x.com/chimamandareal?s=21&t=gDoKxrq_NWgbrJ-RJ-bYFg" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/chimamanda_adichie?igsh=MTV3d2lsNmNnc3hyZQ==" class="fab fa-instagram"></a>           
         </div>
         <h3>Chimamanda Ngozie Adichie</h3>
      </div>

      <div class="box">
         <img src="../assets/freida.jpeg" alt="">
         <div class="share">            
            <a href="https://x.com/freida_mcfadden?s=21&t=gDoKxrq_NWgbrJ-RJ-bYFg" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/fmcfaddenauthor?igsh=ajI0M3ZjcmI1OW5i" class="fab fa-instagram"></a>          
         </div>
         <h3>Freida McFadden</h3>
      </div>

      <div class="box">
         <img src="../assets/taylor.jpeg" alt="">
         <div class="share">            
            <a href="https://x.com/tjenkinsreid?s=21&t=gDoKxrq_NWgbrJ-RJ-bYFg" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/tjenkinsreid?igsh=ZTk1bmZyeG1lM3M5" class="fab fa-instagram"></a>            
         </div>
         <h3>Taylor Jenkins Reid</h3>
      </div>

   </div>

</section>


<?php include '../views/footer.php'; ?>

<script src="../js/script.js"></script>

</body>
</html>