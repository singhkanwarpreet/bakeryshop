<?php
include "public_header.php";
?>
<div class="wthreehome-latest">
    <div class="container">
        <h1>User Login</h1>
        <form action="user_login_action.php" class="form-horizontal" method="post">
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
                    <input type="submit" class="btn btn-primary" value="LOGIN"/>
                    <?php
                    if (isset($_REQUEST['msg']))
                        echo $_REQUEST['msg'];
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "footer.html" ?>
