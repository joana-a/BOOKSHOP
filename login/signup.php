<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - jo's libray</title>
    <link rel="stylesheet" href="../css/styles.css">

    <style>
        body {
            background-image: url('../assets/bookb5.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
    </style>
</head>

<body>
    <div class="signup-container"; style="text-align: center">
        <h1>SIGN UP</h1>
        <form action="../action/signup_user.php" method="post" name="signupForm" id="signupForm">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
    
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
    
            <div class="gender">
                <label for="male">Gender:</label>
                <input type="radio" name="gender" value="male" id="male"> Male
                <input type="radio" name="gender" value="female" id="female"> Female 
            </div>
            <!-- <label>Gender:</label>
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="0" required>
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="1" required>
     -->
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" placeholder="Select your date of birth" required>
    
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
            <label for="confirmPassword">Retype Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Retype your password" required>
    
            <button type="submit" name="signupButton" id="signupButton" onclick= login()>Sign Up</button>
        </form>
        <p>Already have an account? <a href="../login/login.php">Login</a></p>
    </div>
</body>

<script src="../js/loginscript.js"></script>


</html>
