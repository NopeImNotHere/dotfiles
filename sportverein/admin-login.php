<!DOCTYPE html>
<html>

<head>
<?php include("head.php");?>
</head>

<body>
<?php     
if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // Redirect to the admin dashboard if already logged in
    header("Location: admin-dashboard.php");
    exit();
}
?>


<?php include("nav.php");?>


<h2>Admin Login</h2>
  <form method="POST" action="">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login</button>
  </form>
</body>

</html>