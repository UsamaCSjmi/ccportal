<?php
require 'top.inc.php';
$msg='';
if(isset($_POST['submit'])){
    $department = get_safe_value($conn, $_POST['department']);
    $name = get_safe_value($conn, $_POST['name']);
    $email = get_safe_value($conn, $_POST['email']);
    $mobile = get_safe_value($conn, $_POST['mobile']);
    $password = get_safe_value($conn, $_POST['password']);

    $res= mysqli_query($conn,"select * from users where email='$email'");
    $check=mysqli_num_rows($res);

    if($check>0){
        $msg="Email already exist";
    }
    if($msg==''){
        mysqli_query($conn,"insert into users (department,email,mobile,password,name) values('$department','$email','$mobile','$password','$name')");
        header('Location:users.php');
        die();
    }
    
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Departments</strong><small> Form</small></div>
                    <form method="post" action="">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="department" class=" form-control-label">Department</label>
                                <select class="form-control" name="department" required>
                                    <option>Select Department</option>
                                    <?php
                                    $sql2="select * from departments where id != '1' and id != '2'";
                                    $query2=mysqli_query($conn,$sql2);
                                    while($row=mysqli_fetch_assoc($query2)){
                                        ?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row['department']?></option>
                                        
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Name</label>
                                <input type="text" name="name" placeholder="Enter name" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label for="mobile" class=" form-control-label">Mobile</label>
                                <input type="text" name="mobile" placeholder="Enter mobile" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Password</label>
                                <input type="password" name="password" placeholder="Enter password" class="form-control" required >
                            </div>
                            
                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount" >Submit</span>
                            </button>
                            <div class="feild_error"><?php echo $msg; ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php';?>