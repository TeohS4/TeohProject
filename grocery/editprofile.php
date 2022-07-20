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
}else{
    echo'<script type="text/javascript">
        alert("Please login to continue");
        window.location = "login.php";
    </script>';
}

if(isset($_POST['update_user'])){
    $username = $_POST['user_username'];
	$email = $_POST['user_email'];
	$password = $_POST['user_password'];
	$gender = $_POST['user_gender'];
	$address = $_POST['user_address'];
	$dob = $_POST['user_dob'];

    $update = "UPDATE register SET username='$username',email='$email',password='$password',gender='$gender',
    address='$address',dob='$dob' WHERE user_id ='$id'";
    mysqli_query($db,$update);
    ?>
    <script type="text/javascript">
        alert("Update Successfull.");
        window.location = "editprofile.php";
    </script>

<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit my Profile</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="master.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a84d485a7a.js" crossorigin="anonymous"></script>

<style>
body{
    background-image: url(images/minimalist2.jpg);
}
</style>

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
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Profile
          </a>
		  <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item active" href="editprofile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </ul>
    </nav>

<div class="transition">
<form action="" method="post">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img width="550px" 
                src="images/laptopgirl.png"><span class="font-weight-bold"><h3><b><?php echo $user_username?></b></h3></span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="col-md5">
                        <h4>Profile Settings</h4>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Username</label>
                    <input type="text" name="user_username" class="form-control" value="<?php echo $user_username?>"></div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Email Address</label>
                    <input type="text" name="user_email" class="form-control" value="<?php echo $user_email?>"></div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Password</label>
                    <input type="password" name="user_password" class="form-control"></div>
                    </div>

                    <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Home Address</label>
                    <input type="text" name="user_address" class="form-control" value="<?php echo $user_address?>"></div>
                    </div><br>

  		            <label>Select your gender</label><br>
  		            <select name="user_gender" class="form-select" aria-label="Default select example">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <br>
                    <div class="col-sm-12 col-lg-6">
                        <label for="startDate">Change Date of Birth</label>
		                <input id="startDate" name="user_dob" class="form-control" type="date"/>
                    </div>

                    <br>
                    <input type="submit" name="update_user" class="btn btn-success" value="Update">
                
                </div>
            </div>
        </div>
        
    </div>
    </form>
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