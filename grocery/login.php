<?php
session_start();

if(isset($_POST['submit'])){
      $email=$_POST['email'];
      $password=$_POST['password'];

      $db = mysqli_connect('localhost','root','','grocery');

      $sql = "SELECT * FROM register WHERE email='$email' AND password=
             '$password'";

    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result);

    if(empty($_POST['email'])||empty($_POST['password'])){
      echo "<script>alert('Please fill in all the details');window.location='login.php';</script>";
    }
    else if($row['email']==$email&&$row['password']==$password){
      $_SESSION['showEmail'] = $email;
      $_SESSION['user_info'] = "SELECT * FROM register WHERE email ='$email'"; 
      echo "<script>alert('You have successfully logged in');window.location='homepage.php';</script>";
      header('location: homePage.php');
    }else{
      echo "<script>alert('Wrong email or password');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
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
	
	<h1 class="text-center">Login</h1>

	<form action="" method="post" class="was-validated">
	<div class="mb-3 mt-3">
    <label for="uname" class="form-label">Email:</label>
    <input type="text" class="form-control" placeholder="Enter email" name="email" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <p>Not a member? <a href="register.php">Sign up here</a></p>
  <p><a href="adminlogin.php">Login with admin here</a></p>
		<input type="submit" name="submit" value="SIGN IN" class="btn btn-success w-100">
	</form>
</div>
</div>

</body>
</html>