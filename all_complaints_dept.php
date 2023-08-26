<?php
require 'top.inc.php';
if(isset($_POST['submit'])){
    $cid=get_safe_value($conn,$_GET['cid']);
    $status=get_safe_value($conn,$_POST['status']);
    $sql4="update complaints set status='$status' where c_id='$cid'";
    $query4=mysqli_query($conn,$sql4);
    if($query4){
        header("location:all_complaints_dept.php");
        die();
    }
    else{
        echo "error";
        die();
    }
}
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">All Complaints </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Complaint ID</th>
                                <th>Date</th>
                                <th>Department</th>
                                <th>Complaint</th>
                                <th>Citizen</th>
                                <th>Mobile</th>
                                <th>Current Status</th>
                                <th>Change Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $dept_id=$_SESSION['USER_TYPE'];
                                $sql="select * from complaints where department_id=$dept_id";
                                $query=mysqli_query($conn,$sql);
                                $i=1;
                                while($row=mysqli_fetch_assoc($query)){
                                    $d_id=$row['department_id'];
                                    $user_id=$row['user_id'];

                                    $sql2="select * from departments where id = $d_id";
                                    $query2=mysqli_query($conn,$sql2);
                                    $row2=mysqli_fetch_assoc($query2);

                                    $sql3="select * from users where user_id = $user_id";
                                    $query3=mysqli_query($conn,$sql3);
                                    $row3=mysqli_fetch_assoc($query3);
                                ?>
                                <tr>
                                    <td class="serial"><?php echo $i;?></td>
                                    <td><?php echo $row['c_id'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row2['department'];?></td>
                                    <td><?php echo $row['complaint'];?></td>
                                    <td><?php echo $row3['name'];?></td>
                                    <td><?php echo $row3['mobile'];?></td>
                                    <td><span class='badge <?php 
                                    if($row['status']=="pending"){
                                        echo "badge-pending";
                                    }
                                    elseif($row['status']=="completed"){
                                        echo "badge-complete";
                                    }
                                    elseif($row['status']=="rejected"){
                                        echo "badge-delete";
                                    }
                                    elseif($row['status']=="verified"){
                                        echo "badge-edit";
                                    }
                                    ?>'>
                                    <?php echo $row['status'];?></span></td>
                                    <td>
                                        <form action="all_complaints_dept.php?cid=<?php echo $row['c_id'];?>" method="post">
                                            <select name="status" class="form-control" required>
                                                <option>Select</option>
                                                <option value="verified">Verified</option>
                                                <option value="rejected">Reject</option>
                                                <option value="completed">Complete</option>
                                            </select>
                                            <button type="submit" name="submit"class="badge badge-edit" style="border:none">Change</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.inc.php';?>