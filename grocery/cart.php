<?php
session_start();

include 'database.php';

if(isset($_POST['update_btn'])){
	$update_value = $_POST['update_quantity'];
	$update_id = $_POST['update_quantity_id'];

	$update_quantity_query = mysqli_query($db, "UPDATE cart SET product_quantity = '$update_value' WHERE cart_id = '$update_id'");
	if($update_quantity_query){
	   header('location:cart.php');
	};
 };
 
 if(isset($_GET['remove'])){
	$remove_id = $_GET['remove'];
	mysqli_query($db, "DELETE FROM cart WHERE cart_id = '$remove_id'");
	header('location:cart.php');
 };
 
 if(isset($_GET['delete_all'])){
	mysqli_query($db, "DELETE FROM cart");
	header('location:cart.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
<style>
body{
    background: #e3feff;
}
</style>
</head>

<body>
	<?php
      
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
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li>
                        <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="cart.php">Cart</a>
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

        <div class="cart-logo">
            <h3>Shopping Cart</h3>
        </div>
        <br>
    <div class="wrapper">
		<div class="outershop">
			<div class="shop">
            <?php 
         $select_cart = mysqli_query($db, "SELECT * FROM cart");
         $total_price = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
				<div class="cart-box">
                <img src="food/<?php echo $fetch_cart['product_image'];?>" width="150px" height="150px">
					<div class="cart-content">
						<h3><?php echo $fetch_cart['product_name']; ?></h3>
						<h4>RM <?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart['product_quantity']); ?></h4>
						<form action="" method="post">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['cart_id']; ?>" >
                            <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['product_quantity']; ?>" >
                            <input type="submit" class="btn btn-primary" value="Update" name="update_btn">
                        </form>
						<a href="cart.php?remove=<?php echo $fetch_cart['cart_id']; ?>" onclick="return confirm('remove item from cart?')" class="btn btn-danger">
			<i class="fas fa-trash"></i> Remove Item</a>
					</div>
				</div>
                <?php
           $total_price += $sub_total;  
            };
         };
         ?>
			</div>
            
			<div class="right-bar">
                <h4>Total Price:</h4>
				<h3>RM <?php echo $total_price; ?></h3>
                <hr>
                <a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="btn btn-danger"> <i class="fas fa-trash"></i> Remove All Items</a>    
                <br><br>
                <a href="payment.php" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</a>
                <hr>
                <a href="products.php" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i> Back To Shopping</a>
			</div>
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
</body>
</html>