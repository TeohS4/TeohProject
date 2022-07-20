<?php include 'sendmail.php'; 
session_start();
?>

<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$db=mysqli_connect('localhost','root','','grocery');

		if(empty($_POST['name'])||empty($_POST['phone'])||empty($_POST['subject'])||empty($_POST['message'])){
			echo "<script>alert('Please complete the form');window.location='contactus.php';</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Us</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
</head>

<body>

	<?php 
	if(isset($_POST['submit'])){
		echo $alert;
		} ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a href="homepage.php" class="navbar-brand"><img src="images/logo.png"></a>
        <a href="homepage.php" class="navbar-brand">Fresh Grocer</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#toggleMobileMenu"
                aria-controls="toggleMobileMenu"
                aria-expanded="false"
                aria-lable="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="toggleMobileMenu">
                <ul class="navbar-nav ms-auto text-center">
                    <li>
                        <a class="nav-link" href="homepage.php">Home</a>
                    </li>
                    <li>
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="contactus.php">Contact Us</a>
                    </li>
                    <li>
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Profile
          </a>
		  <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="editprofile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </ul>
    </nav>

<div class="contact">
<div class="transition">
	<section>
	<div class="innerContact">
	<img src="images/contact.png" width="180px" height="180px">
	<h3>Contact Us</h3>


	<b>You can reach us by</b>
	<p>Phone number (Teoh): +60124567288</p>
	<p>Email: weijieteoh26@gmail.com</p>

	<form action="" method="post">
	
		<h3>Please do not hesitate to contact us and provide us feedback on how should we improve our website functionality</h3><br>
		<lable><b>Full name:</b></lable>
		<div class="col-md-6">
            <div class="md-form mb-0">
                <input type="text" id="name" name="name" class="form-control">
            </div>
        </div>
		<div class="col-md-6">
        <div class="md-form mb-0">
        	<label for="email" class=""><b>Phone Number</b></label>
            <input type="text" id="phone" name="phone" class="form-control">
            </div>
        </div>

		<div class="col-md-6">
            <div class="md-form mb-0">
            	<label for="subject" class=""><b>Subject</b></label>
                <input type="text" id="subject" name="subject" class="form-control">   
            </div>
        </div>

		<label><b>Message</b></label><br>
		<div class="md-form">
            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
        </div>
		<br>
		<div class="col-md-6">
			<input type="submit" class="btn btn-dark" name="submit" value="Send Feedback">
		</div>
	</section>
	</form>
</div>
</div>
<footer>
		<p>For more information about our services, please follow our social media</p>
		<div class="social">
			<a href="https://www.facebook.com/ColdStorageMalaysia/"><i class="fab fa-facebook-f"></i></a>
			<a href="https://www.instagram.com/coldstoragemy/"><i class="fab fa-instagram"></i></a>
			<a href="https://twitter.com/mycoldstorage"><i class="fab fa-twitter"></i></a>
		</div>
		<p class="end">Copyright &copy; 2022 All Rights Reserved By Fresh Grocer</p>
	</footer>
</div>

<script type="text/javascript">
	if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
	}
</script>
</body>
</html>