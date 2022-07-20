<?php
	$db = mysqli_connect('localhost','root','','grocery');

	if(isset($_POST['add_product'])){
        $p_name = $_POST['p_name'];
        $p_price = $_POST['p_price'];
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = 'uploads/'.$p_image;

      if(empty($_POST['p_name'])||empty($_POST['p_price'])){
         echo "<script>alert('Please fill in all the details');window.location='admin.php';</script>";
        }
      elseif(empty($_FILES['p_image']['name'])){
         echo "<script>alert('You did not insert an image');window.location='admin.php';</script>";
      }
      else{
      $insert_query = mysqli_query($db, "INSERT INTO product(product_name, product_price, product_image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');
     
      if($insert_query){
         move_uploaded_file($p_image_tmp_name, $p_image_folder);
         $message[] = 'Product added succesfully';
      }else{
         $message[] = 'Could not add the product';
         }
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Products</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
   <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
   <style>
   *{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Quicksand', sans-serif;
   }

   body{
      height: 100vh;
      width: 100%;
   }
</style>
</head>
<?php
   if(isset($message)){
      foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
     };
?>
<body>
   
<div class="admin-container">
	<div class="contact-box">
		<div class="left"></div>
		<div class="right">
   <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h2>Add a new product</h2>
   <b>Product Name</b>
   <input type="text" name="p_name" placeholder="enter the product name" class="field"><br>
   <b>Product Price</b>
   <input type="text" name="p_price" placeholder="enter the product price" class="field"> <br>
   <b>Upload an Image</b>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg">
   <input type="submit" value="ADD PRODUCT" name="add_product" class="btn btn-dark">
   <p><a href="logout.php">Logout</a></p>
   </form>
      </div>
	</div>
</div>

</body>
</html>
