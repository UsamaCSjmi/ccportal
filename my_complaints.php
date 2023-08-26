<?php
require 'top.inc.php';
if($_SESSION['USER_TYPE']==1){
 header('location:all_complaints.php');
} 
elseif($_SESSION['USER_TYPE']>2){
    header('location:all_complaints_dept.php');
} 
                    
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">My Complaints </h4>
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
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql="select * from complaints where user_id=$uid";
                                $query=mysqli_query($conn,$sql);
                                $i=1;
                                while($row=mysqli_fetch_assoc($query)){
                                    $d_id=$row['department_id'];
                                    $sql2="select * from departments where id = $d_id";
                                    $query2=mysqli_query($conn,$sql2);
                                    $row2=mysqli_fetch_assoc($query2);
                                ?>
                                <tr>
                                    <td class="serial"><?php echo $i;?></td>
                                    <td><?php echo $row['c_id'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                    <td><?php echo $row2['department'];?></td>
                                    <td><?php echo $row['complaint'];?></td>
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
                                    ?>'><?php echo $row['status'];?></span></td>
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