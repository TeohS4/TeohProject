<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>About Us</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
	<script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li>
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="aboutus.php">About Us</a>
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
	  
<div class="transition">
<div class="aboutus">
<section>
<div class="article">
	<h3>Our Goals</h3>
	<p>We wanted to is to provide customer a pleasant experience for using our grocery shopping website. Due to 
		COVID-19 Pandemic situation, we are working hard to ensure customer can order their grocery item online 
		without having to go to physical shop</p>
	<h3>Our Vision</h3>
	<p>FreshGrocer aim to provide fresh and organic product to support organic agriculture. We try our best to 
		deliver high quality grocery products to our customer, we regularly insepct our products to make sure 
		it is safe before we ship it to customer. We offer variety of fruit and vegetable selection and we 
		always ensure that our food is clean and fresh. As our business is new, we hope to provide more 
		choices of our products in the future.</p>
	<div class="button">
		<a href="https://www.coldstorage.com.my/" class="btn btn-info">Read More</a>
	</div>
</div>
	<img src="images/bag.png" class="center">
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
</section>

</body>
</html>