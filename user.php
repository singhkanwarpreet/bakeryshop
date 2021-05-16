<?php include "public_header.php";
?>
<div class="container">
    <h1>User Sign Up</h1>
    <form action="user_action.php" class="form-horizontal" method="post">
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Email</label>

                <input type="email" class="form-control" name="mail" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Password</label>

                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Confirm Password</label>

                <input type="password" name="cpassword" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Name</label>

                <input type="text" name="name" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Mobile no.</label>

                <input type="number" name="mobile_no" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Select Gender</label>
                <input type="radio" name="gender" value="Male"/>Male
                <input type="radio" name="gender" value="Female"/>female
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary" value="SUBMIT"/>
                <?php
                if(isset($_REQUEST['msg']))
                    echo $_REQUEST['msg'];
                ?>
            </div>
        </div>
    </form>
</div>
