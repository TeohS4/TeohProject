<?php
session_start();
include 'database.php';

	if(isset($_POST['add_to_cart'])){
		$product_name = $_POST['product_name'];
   		$product_price = $_POST['product_price'];
   		$product_image = $_POST['product_image'];
   		$product_quantity = 1;

		$select_cart = mysqli_query($db, "SELECT * FROM cart WHERE product_name = '$product_name'");

   		if(mysqli_num_rows($select_cart) > 0){
      	$message[] = 'product already added to cart';
   		}else{
      	$insert_product = mysqli_query($db, "INSERT INTO cart(product_name, product_price, product_image, product_quantity) VALUES
		('$product_name', '$product_price', '$product_image', '$product_quantity')");
      	$message[] = 'product added to cart succesfully';
   		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
</head>

<body>
<?php

	if(isset($message)){
    foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   	};
	};
	
	$select_rows = mysqli_query($db, "SELECT * FROM cart") or die('query failed');
	$row_count = mysqli_num_rows($select_rows);
?>
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
                        <a class="nav-link active" href="products.php">Products</a>
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
	<div class="product">
		<h3>Our Products</h3>
	</div>
	<section class="items">

	<?php
	//display the items
	$select_products = mysqli_query($db, "SELECT * FROM product");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
    ?>

	<form action="" method="post">
		
		<div class="item">
			<img src="uploads/<?php echo $fetch_product['product_image']; ?>" alt="">
    		<h4><?php echo $fetch_product['product_name']; ?></h4>
    		<p>RM <?php echo $fetch_product['product_price']; ?></p>
			<input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image']; ?>">
    		<input type="submit" class="btn btn-dark item_button" name="add_to_cart" value="ADD TO CART">
			<br>
    	</div>
		
	</form>

	  <?php
	 }
	}
	  ?>
	  
	
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

<button class="btnScrollUp">
	<i class="fa-solid fa-arrow-up"></i>
	</button>
<script src ="script.js" type="text/javascript" async></script>

</body>
</html>