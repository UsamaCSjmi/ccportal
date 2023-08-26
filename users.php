<?php
require 'top.inc.php';
$sql="select * from users where department != 1 and department != 2";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Users </h4>
                    <h4 class="box-link"><a href="manage_users.php">Add Users</a> </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Mobile</th>
                                <th>Department</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                while($row=mysqli_fetch_assoc($res)){
                                $dep_id=$row['department'];
                                $dep_sql="select * from departments where id=$dep_id";   
                                $dep_query=mysqli_query($conn,$dep_sql);
                                $dep_row=mysqli_fetch_assoc($dep_query); 
                                ?>
                                <tr>
                                    <td class="serial"><?php echo $i; ?></td>
                                    <td><?php echo $row['user_id']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['password']?></td>
                                    <td><?php echo $row['mobile']?></td>
                                    <td><?php echo $dep_row['department']?></td>
                                </tr>
                                <?php $i++; } ?>
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