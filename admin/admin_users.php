<?php
include '../settings/connection.php';
session_start();

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM `users` WHERE id = '$delete_id'") or die('Query failed');
    header('Location: ../admin/admin_users.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
   
<?php include '../admin/admin_header.php'; ?>

<section class="users">
   <h1 class="title">User Accounts</h1>
   <div class="box-container">
      <?php
         $sql = "SELECT u.user_id, u.fname, u.email, r.role_name
                 FROM users u
                 INNER JOIN roles r ON u.role_id = r.role_id";
         $result = mysqli_query($mysqli, $sql);

         
         if (mysqli_num_rows($result) > 0) {
            while ($fetch_users = mysqli_fetch_assoc($result)) {
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['user_id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['fname']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['role_name'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['role_name']; ?></span> </p>
         <a href="../admin/admin_users.php?delete=<?php echo $fetch_users['user_id']; ?>" onclick="return confirm('Delete this user?');" class="delete-btn">Delete User</a>
      </div>
      <?php
            }
         } else {
            echo "No users found.";
         }
         mysqli_close($mysqli);
      ?>
   </div>
</section>

<script src="../js/adminscript.js"></script>

</body>
</html>
