<?php
require ('connection.inc.php');
require ('functions.inc.php');
$type=get_safe_value($conn,$_POST['type']);
if($type=='register'){
   
	$email = get_safe_value($conn, $_POST['email']);
	$password = get_safe_value($conn, $_POST['password']);
	$name = get_safe_value($conn, $_POST['name']);
	$mobile = get_safe_value($conn, $_POST['mobile']);

	$sql2 ="select * from users where mobile='$mobile'";
	$res2=mysqli_query($conn,$sql2);
	$count2=mysqli_num_rows($res2);

	if($count2>0){
	echo "mobile_error";
	}

	else{
		$sql3="insert into users (name,mobile,email,password,department) values('$name','$mobile','$email','$password','2')";
		$query3=mysqli_query($conn,$sql3);
		if($query3){
			echo "success";
		}
		else{
			echo "failed";
		}
	}

}
if($type=='change'){
   
	$email = get_safe_value($conn, $_POST['email']);
	$password = get_safe_value($conn, $_POST['password']);

	$sql3="update users set password='$password' where email='$email'";
	$query3=mysqli_query($conn,$sql3);
	if($query3){
		echo "success";
	}
	else{
		echo "failed";
	}

}
die();
?>