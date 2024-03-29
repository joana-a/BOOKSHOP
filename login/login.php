<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jo's library- Login</title>
    <link rel="stylesheet" href="../css/styles.css">

    <style>
        body {
            background-image: url('../assets/bookb5.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }

        .top-links {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: pink;
            color: #080808;
            padding: 0px;
            text-align: center;
        }

    </style>
</head>
<body>

    <div class="top-links" style="font-size: 22px;">
        <p style="word-spacing: normal; text-align: center"><em>jo's library<3 </em></p>
    </div>
    
    <div class="login-container">
        <h2>LOGIN</h2>
        <form action="../action/login_user.php" method="post" name="loginForm" id="loginForm">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
            <button type="submit" name="signInButton" id="signInButton" onclick= login()>Sign In</button>
            <!-- <button type="button" onclick="login()">Login</button> -->
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
     
    <div class="footer"; style="background-color: white; color:#080808";>
        &copy; 2024 jo's library
    </div>
  

    <script src="../js/loginscript.js"></script>
    
</body>
</html>