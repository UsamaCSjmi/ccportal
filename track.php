
<?php
require 'top.inc.php';
if(isset($_POST['submit'])){
    $email = get_safe_value($conn, $_POST['email']);
    $cid = get_safe_value($conn, $_POST['cid']);
    header("Location:track_complaint.php?cid=$cid&email=$email");
}
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12"> 
                <div class="card">
                <div class="card-header"><strong>Track</strong><small> Complaint</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email</label>
                                            <input type="text" name="email" placeholder="Enter Your Email" class="form-control" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="cid" class=" form-control-label">Complaint ID</label>
                                            <input type="text" name="cid" placeholder="Complaint ID " class="form-control" required >
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount" >Track</span>
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
