<?php
if(isset($_POST['submit'])){
      $username=$_POST['username'];
      $password=$_POST['password'];

      $db = mysqli_connect('localhost','root','','grocery');

    if(empty($_POST['username'])||empty($_POST['password'])){
      echo "<script>alert('Please fill in all the details');window.location='adminlogin.php';</script>";
    }
    else if($_POST['password']=="admin" && $_POST['password']=="admin"){
      echo "<script>alert('You have successfully logged in');window.location='admin.php';</script>";
      header('location: admin.php');
    }else{
      echo "<script>alert('Wrong email or password');window.location='adminlogin.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
  <style>
	body{
		height: 100vh;
		display: flex;
		align-items: center;
		min-height: 680px;
		justify-content: center;
		background-image: url(images/bg.jpg);
	}
	</style>
</head>

<body>
	<div class="transition">
	<div class="login">	
	
	<h1 class="text-center">Login with Admin</h1>

	<form action="" method="post" class="was-validated">
	<div class="mb-3 mt-3">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" placeholder="Enter username" name="username" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <p>Return to <a href="login.php">login</a></p>
		<input type="submit" name="submit" value="SIGN IN" class="btn btn-success w-100">
	</form>
</div>
</div>

</body>
</html>