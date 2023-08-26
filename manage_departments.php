<?php
require 'top.inc.php';
$department='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id = get_safe_value($conn, $_GET['id']);
    $res= mysqli_query($conn,"select * from departments where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $department=$row['department'];
    }
    else{
        header('Location:departments.php');
        die();
    }
}
if(isset($_POST['submit'])){
    $department = get_safe_value($conn, $_POST['department']);

    $res= mysqli_query($conn,"select * from departments where department='$department'");
    $check=mysqli_num_rows($res);

    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){

            }
            else{
                $msg="Department already exist";
            }
        } 
        else{
            $msg="Department already exist";
        }
    }
    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            mysqli_query($conn,"update departments set department='$department' where id='$id'");
        }
        else{
            mysqli_query($conn,"insert into departments (department) values('$department')");
        }
        header('Location:departments.php');
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
                                <input type="text" name="department" placeholder="Enter department name" class="form-control" required value="<?php echo $department?>">
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