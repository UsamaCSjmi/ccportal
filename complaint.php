
<?php
require 'top.inc.php';
if(isset($_POST['submit'])){
    $department_id = get_safe_value($conn, $_POST['department_id']);
    $complaint = get_safe_value($conn, $_POST['complaint']);
    $date=date('Y-m-d');
    $sql="insert into complaints (department_id, user_id, complaint, date) values('$department_id','$uid','$complaint','$date')";
    $query=mysqli_query($conn,$sql);
    $sql="select * from complaints where user_id=$uid order by c_id desc";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    $cid = $row['c_id'];
    header("Location:success.php?cid=$cid");
    die();
}
?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header"><strong>Register</strong><small> Complaint</small></div>
                    <form method="post">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">User Name</label>
                                            <input type="text" name="name" value="<?php echo $result['name']?>" class="form-control" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Email</label>
                                            <input type="text" name="email" value="<?php echo $result['email']?>" class="form-control" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Mobile</label>
                                            <input type="text" name="mobile" value="<?php echo $result['mobile']?>" class="form-control" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories" class=" form-control-label">Department</label>
                                            <select class="form-control" name="department_id" id="department_id" required>
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
                                            <label for="name" class=" form-control-label">Aplication Details</label>
                                            <textarea name="complaint" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount" >Submit</span>
                                            </button>
                                            <div class="feild_error"></div>
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
