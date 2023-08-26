
<?php
require 'top.inc.php';


if(isset($_POST['submit'])){
    $email = get_safe_value($conn, $_POST['email']);
    $name = get_safe_value($conn, $_POST['name']);
    $mobile = get_safe_value($conn, $_POST['mobile']);
    $password = get_safe_value($conn, $_POST['password']);
    $sql2="update users set name='$name', email='$email', password='$password', mobile='$mobile' where user_id='$uid'";
    $query2=mysqli_query($conn,$sql2);
    if($query2){
        header("Location:profile.php");
        die();
    }
    else{
        echo "Error";
        die();
    }
}
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12"> 
                <div class="card">
                <div class="card-header"><strong>Profile</strong><small> Settings</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Name</label>
                                            <input type="text" name="name" placeholder="Enter Your name" class="form-control" value="<?php echo $result['name']?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email</label>
                                            <input type="text" name="email" placeholder="Enter Your Email" class="form-control" value=<?php echo $result['email']?> required >
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile" class=" form-control-label">Mobile</label>
                                            <input type="text" name="mobile" placeholder="Enter Your Mobile" class="form-control" value=<?php echo $result['mobile']?> required >
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class=" form-control-label">Password</label>
                                            <input type="text" name="password" placeholder="Enter Your Password" class="form-control" value=<?php echo $result['password']?> required >
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount" >Update</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.inc.php';
?>
