<?php
require 'top.inc.php';
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($conn,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="delete from departments where id='$id'";
        mysqli_query($conn,$delete_sql); 
    }
}
$sql="select * from departments where id != 1 and id != 2";
$res=mysqli_query($conn,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Departments </h4>
                    <h4 class="box-link"><a href="manage_departments.php">Add Department</a> </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>ID</th>
                                <th>Department</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                while($row=mysqli_fetch_assoc($res)){?>
                                <tr>
                                    <td class="serial"><?php echo $i; ?></td>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['department']?></td>
                                    <td>
                                    <?php
                                    echo "<span class='badge badge-edit'><a href='manage_departments.php?id=".$row['id']."' >Edit</a></span>&nbsp";
                                    echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."' >Delete</a></span>";
                                    
                                    ?>
                                    </td>
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