<?php
session_start();
include 'database.php';

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];

	$number = preg_match('@[0-9]@', $password);
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(empty($_POST['username'])||empty($_POST['email'])||empty($_POST['password'])||empty($_POST['gender'])||empty($_POST['address'])||empty($_POST['dob'])){
		echo "<script>alert('Please fill in all the details');window.location='register.php';</script>";
	}
	elseif(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars){
		echo "<script>alert('Password must be at least 8 characters, contain at least one number, one upper case letter, one lower case letter and one special character');window.location='register.php';</script>";
	}
	else{
		$_SESSION['showEmail'] = $email;
      	$_SESSION['user_info'] = "SELECT * FROM register WHERE email ='$email'"; 
		echo "<script>alert('Your account has been successfully created!');window.location='homepage.php';</script>";
		header('location: homepage.php');
		$sql = "INSERT INTO register (username,email,password,gender,address,dob)VALUES('$username','$email',MD5('$password'),'$gender','$address','$dob')";
		mysqli_query($db,$sql);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Page</title>
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
<div class="register">	

		<h1 class="text-center">Create new account</h1>
		<form action="" method="post">

		<div class="mb-3">
    	<label for="username" class="form-label">Username</label>
    	<input type="text" class="form-control" placeholder="Enter username" name="username">
  		</div>

		<div class="mb-3">
    	<label for="email" class="form-label">Email address</label>
    	<input type="email" class="form-control" placeholder="Enter email" name="email">
  		</div>

		<div class="mb-3">
    	<label for="password" class="form-label">Password</label>
    	<input type="password" class="form-control" placeholder="Enter password" name="password">
  		</div>

  		<div class="form-check">
  		<label>Select your gender</label><br>
  		<input class="form-check-input" type="radio" name="gender" value="male">
  		<label class="form-check-label" for="flexRadioDefault1">
    	Male
  		</label>
		</div>
	
		<div class="form-check">
  		<input class="form-check-input" type="radio" name="gender" value="female">
  		<label class="form-check-label" for="flexRadioDefault1">
    	Female
  		</label>
		</div>

		<div class="mb-3">
		<label class="form-label" >Enter your home address</label>
        <input type="text" class="form-control" placeholder="Enter home address" name="address">
        </div>

        <label for="startDate">Select Date of Birth</label>
		<input id="startDate" class="form-control" type="date" name="dob" />

		<p>Already have an account? <a href="login.php">Login now</a></p>
		<input type="submit" name="submit" value="REGISTER" class="btn btn-success w-100">

</div>
</div>
</form>

</body>
</html>