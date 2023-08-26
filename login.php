<?php
require ('connection.inc.php');
require ('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
   // $department = get_safe_value($conn, $_POST['department']);
   $email = get_safe_value($conn, $_POST['email']);
   $password = get_safe_value($conn, $_POST['password']);
   $sql ="select * from users where email='$email' and password='$password'";
   $res=mysqli_query($conn,$sql);
   $count=mysqli_num_rows($res);
   if($count>0){
      $row=mysqli_fetch_assoc($res);
      $_SESSION['USER_LOGIN'] = '1';
      $_SESSION['USER_TYPE'] = $row['department'];
      $_SESSION['USERNAME'] = $row['name'];
      $_SESSION['USER_ID'] = $row['user_id'];
      header('location:my_complaints.php');
      die();
   }
   else{
      $msg="Please enter correct login details";
   }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sign In - CCP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to CCP</h2>
								<p>Don't have an account?</p>
								<a href="register.php" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
				<form method="post" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Email</label>
			      			<input type="email" name="email" class="form-control" placeholder="Email" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              	<input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
							<div style="color:red"><?php echo $msg; ?></div>
						</div>
						<div class="w-50 text-md-right">
							<a href="forgot.php">Forgot Password</a>
						</div>
		            </div>
		        </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>

	</body>
</html>

