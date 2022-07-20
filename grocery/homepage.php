<?php 
session_start();
include 'database.php';

if (isset($_SESSION['user_info'])) {
	$login = true;
	if ($r = mysqli_query($db, $_SESSION['user_info'])) { 
		$row = mysqli_fetch_array($r);
		
		$id = $row['user_id'];
		$user_username = $row['username'];
		$user_email = $row['email'];
		$user_password = $row['password'];
		$user_gender = $row['gender'];
		$user_address = $row['address'];
		$user_dob = $row['dob'];
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HomePage</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link active" href="homepage.php">Home</a>
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

<div class="transition">
<section class="top">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="item-detail">
                        <div>
                          <h1>
                            Welcome to <br> Fresh Grocer!
                          </h1>
                          <p>
                          Welcome to FreshGrocer, we hope to provide everyday essential grocery product to our customer!
                          </p>
                          <div>
                            <a href="products.php" class="orangeBtn">
                              Shop Now
                            </a>
                            <a href="contactus.php" class="darkBtn">
                              Contact Us
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="img-box">
                        <div>
                          <img src="images/groceryitem.png"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    </section>
  </div>

  <section class="service_section">
    <div class="container">
      <h2 class="custom_heading">Why Choose Fresh Grocer?</h2>
      <p class="custom_heading-text">
        We tend to provide the best services to our customer
      </p>
      <div class="layout_padding2">
        <div class="card-deck">
          <div class="card">
            <img class="card-img1" src="images/quality.png"/>
            <div class="card-body">
              <h5 class="card-title">Quality</h5>
              <p class="card-text">
                We always ensure our products are always fresh
              </p>
            </div>
          </div>
          <div class="card">
            <img class="card-img2" src="images/good.png"/>
            <div class="card-body">
              <h5 class="card-title">Safety</h5>
              <p class="card-text">
                We regularly perform strict checking for each of our product to make sure it is safe to consume
              </p>
            </div>
          </div>
          <div class="card">
          <img class="card-img3" src="images/truck.png"/>
            <div class="card-body">
              <h5 class="card-title">Fast Delivery</h5>
              <p class="card-text">
                Our delivery partner are highly trained to provide fast delivery service to our customer
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="https://klec.jayagrocer.com/" class="darkBtn">
          Read More
        </a>
      </div>
    </div>
  </section>

  <section class="bottom_section">
    <div class="container_fluid">
      <h2>
        Best Organic Products
      </h2>
    </div>
  </section>

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

</body>
</html>