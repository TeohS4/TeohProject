<?php
session_start();
include 'database.php';

if(isset($_POST['order'])){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$payment_method = $_POST['payment_method'];
	$address = $_POST['address'];

	$cart_query = mysqli_query($db, "SELECT * FROM cart");
   	$price_total = 0;
   	if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['product_name'] .' ('. $product_item['product_quantity'] .') ';
         $product_price = number_format($product_item['product_price'] * $product_item['product_quantity']);
         $price_total += $product_price;
      };
   	};

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($db, "INSERT INTO my_order(name, phone, email, payment_method, address, total_products, total_price) 
   VALUES('$name','$phone','$email','$payment_method','$address','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
	echo"
	<div class='order-message-container'>
    <div class='message-container'>
       <h3>Thank you for shopping with FreshGrocer!</h3>
       <div class='order-detail'>
           <h3>Your Order:</h3>
          <span><b>".$total_product."</b></span>
          <span class='total'><b> Total : RM ".$price_total."</b></span>
       </div>
       <div class='customer-details'>
          <p> Your name : <span>".$name."</span> </p>
          <p> Your phone number : <span>".$phone."</span> </p>
          <p> Your email : <span>".$email."</span> </p>
          <p> Your delivery address : <span>".$address."</span> </p>
          <p> Your payment method : <span>".$payment_method."</span> </p>
       </div>
          <a href='products.php' class='btn btn-dark'>Continue Shopping</a>
       </div>
    </div>
	";
   }
   mysqli_query($db, "DELETE FROM cart");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
	<script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
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

<div class="payment">
    <form action="" method="post">
        <h1 class="text-center">Complete your payment information to continue</h1>

			<div class="display-order">
				<?php
				   $select_cart = mysqli_query($db, "SELECT * FROM cart");
				   $total = 0;
				   $total_price = 0;
				   if(mysqli_num_rows($select_cart) > 0){
					  while($fetch_cart = mysqli_fetch_assoc($select_cart)){
					  $total_price = number_format($fetch_cart['product_price'] * $fetch_cart['product_quantity']);
					  $total_price = $total += $total_price;
				?>
				<span><?= $fetch_cart['product_name']; ?>(<?= $fetch_cart['product_quantity']; ?>)</span>
				<?php
				   }
				}else{
				   echo "<span>Your Cart is Empty!</span>";
				}
				?>
				<h3>Amount Payable: RM <?php echo $total_price; ?></h3>
			 </div>

		<div class="mb-3">
    	<label class="form-label">Name</label>
    	<input type="text" class="form-control" placeholder="Enter Your Name" name="name">
  		</div>

		<div class="mb-3">
    	<label class="form-label">Phone Number</label>
    	<input type="text" class="form-control" placeholder="Enter Your Phone number" name="phone">
  		</div>
		
		<div class="mb-3">
    	<label class="form-label">Email Address</label>
    	<input type="text" class="form-control" placeholder="Enter Your Email address" name="email">
  		</div>

		<div class="mb-3">
    	<label>Payment Method</label>
    	<select name="payment_method">
			<option value="Cash on Delivery">Cash on Delivery</option>
			<option value="Credit Card">Credit Card</option>
			<option value="Touch N Go">Touch N Go</option>
		</select>
  		</div>

		<div class="mb-3">
		<label>Enter your Home address</label>
		<input type="text" class="form-control" name="address" placeholder="Enter address here">
		</div>
		
		<input type="submit" id="order" name="order" value="Place Order Now" class="btn btn-success w-100">
    </form>
</div>
</body>
</html>