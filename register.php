<?php
require ('connection.inc.php');
require ('functions.inc.php');
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up - CCP</title>
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
								<p>Already have an account!</p>
								<a href="login.php" class="btn btn-white btn-outline-white">Sign In</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
			      		</div>
			      	</div>
				<form method="post" class="signin-form">
					<div class="form-group mb-3 row">
						<div class="col-md-8">
							<input type="email" id="email" name="email" class="form-control email" placeholder="Email" required>
							<span id="email_error" class="feild_error" style="color:red"></span>
						</div>
						<div class="col-md-4">
						<button type="button" onclick="send_otp()" id="send_otp_btn" class="form-control btn btn-primary submit px-3 email">OTP</button>
						</div>
					</div>
					<div class="form-group mb-3 row">
						<div class="col-md-8">
							<input type="text" id="otp" class="form-control otp" placeholder="6-digit OTP" required maxlength=6 disabled>
							<span id="otp_error" class="feild_error" style="color:red"></span>
						</div>
						<div class="col-md-4">
						<button type="button" onclick="verify_otp()" id="verify_otp_btn" class="form-control btn btn-primary submit px-3 otp" disabled>Verify</button>
						</div>
					</div>
					<div class="form-group mb-3">
						<input type="text" id="name" class="form-control form-contents" placeholder="Name" required disabled>
						<span id="name_error" class="feild_error" style="color:red"></span>
					</div>
					<div class="form-group mb-3">
						<input type="text" id="mobile" class="form-control form-contents" placeholder="10-digit Mobile" required maxlength=10 disabled>
						<span id="mobile_error" class="feild_error" style="color:red"></span>
					</div>
		            <div class="form-group mb-3">
		              	<input type="password" id="password" class="form-control form-contents" placeholder="Chose Password" required disabled>
						  <span class="feild_error" id="password_error" style="color:red"></span>
		            </div>
		            <div class="form-group">
		            	<button type="button" onclick="user_register()" id="submit_btn" class="form-control btn btn-primary submit px-3 form-contents" disabled>Sign Up</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
							<div id="register_msg" style="color:green"></div>
							<div id="register_error" style="color:red"></div>
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
	<script>
		function send_otp(){
			jQuery('.feild_error').html('');
			jQuery('#register_msg').html('');
			jQuery('.email').attr('disabled',true);
			var email=jQuery("#email").val();
			var is_error='';
			if(email==""){
				jQuery('#email_error').html("Please enter email");
				is_error='yes';
			}
			if(is_error==''){
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=="present"){
							jQuery('#email_error').html('Email Id already exists');
							jQuery('.email').attr('disabled',false);
						}
						if(result=="done"){
							jQuery('.otp').attr('disabled',false);
						}
					}
				});
			}
		}
		function verify_otp(){
			jQuery('.feild_error').html('');
			jQuery('#register_msg').html('');
			jQuery('.otp').attr('disabled',true);
			var otp=jQuery("#otp").val();
			var is_error='';
			if(otp==""){
				jQuery('#otp_error').html("Please enter OTP");
				is_error='yes';
			}
			if(is_error==''){
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'otp='+otp+'&type=verify',
					success:function(result){
						if(result=="verified"){
							jQuery('.form-contents').attr('disabled',false);
							jQuery('#verify_otp_btn').html('Verified');
						}
						if(result=="invalid"){
							jQuery('#otp_error').html('Invalid OTP');
							jQuery('.otp').attr('disabled',false);
						}
					}
				});
			}
		}
		function user_register(){
			jQuery('.feild_error').html('');
			jQuery('#register_msg').html('');
			jQuery('#register_error').html('');
			jQuery('#submit_btn').attr('disabled',true);
			var email=jQuery("#email").val();
			var name=jQuery("#name").val();
			var mobile=jQuery("#mobile").val();
			var password=jQuery("#password").val();
			var is_error='';
			if(name==""){
				jQuery('#name_error').html("Please enter Name");
				is_error='yes';
			}
			if(mobile==""){
				jQuery('#mobile_error').html("Please enter mobile");
				is_error='yes';
			}
			if(email==""){
				jQuery('#email_error').html("Please enter email");
				is_error='yes';
			}
			if(password==""){
				jQuery('#passwords_error').html("Please enter password");
				is_error='yes';
			}
			if(is_error==''){
				jQuery.ajax({
					url:'user_register.php',
					type:'post',
					data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password+'&type=register',
					success:function(result){
						if(result=="success"){
							jQuery('#register_msg').html('Successfully Registered. Login to continue');
						}
						if(result=="mobile_error"){
							jQuery('#mobile_error').html('Mobile number already exists');
							jQuery('#submit_btn').attr('disabled',false);
						}
						if(result=="failed"){
							jQuery('#register_error').html('Unable to register! Try again later.');
							jQuery('#submit_btn').attr('disabled',false);
						}
					}
				});
			}
		}
		
	</script>
	</body>
</html>

