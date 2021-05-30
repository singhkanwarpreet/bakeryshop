<?php
include "connection.php";
include "user_header.php";
?>
<div class="container">
    <br>
    <br>
    <h2>Select/Add Shipping Address Detail </h2>
    <form class="form-horizontal" action="address_action.php" method="post">
        <div class="row">
            <?php
            $addr = "select * from address where user_email='" . $_SESSION['session2'] . "'";
            $addr_res = mysqli_query($conn, $addr);
            if (mysqli_num_rows($addr_res)) {
                while ($addr_row = mysqli_fetch_array($addr_res)) {
                    ?>
                    <div class="col-sm-4" style="height:300px;">
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="radio" value="<?php echo $addr_row[0] ?>" name="address">
                                </td>
                                <th>Address :</th>
                                <td><?php echo urldecode($addr_row[1]) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Suite/Aprt :</th>
                                <td><?php echo urldecode($addr_row[2]) ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Contact Number :</th>
                                <td><?php echo $addr_row[3] ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <th>City & Province :</th>
                                <td><?php echo ucwords($addr_row[4]) ?> (<?php echo $addr_row[5] ?>)    </td>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='text-center text-danger'>No address added yet.</div>";
            }
            ?>
        </div>

        <div class="form-group">
            Address: 
            <textarea rows="5" cols="22" class="form-control" name="location"></textarea>
        </div>
        <div class="form-group">
            Apartment: 
            <textarea rows="5" cols="22" class="form-control" name="apartment"></textarea>
        </div>
        <div class="form-group">
            Postal Code
            <input type="text" class="form-control" name="postalcode">
        </div>

        <div class="form-group">
            City:
            <select class="form-control" name="city">
                <option value="">Choose One</option>
                <option>Montreal</option>            
            </select>
        
        </div>
        <div class="form-group">
            Province
            <select class="form-control" name="state">
                <option value="">Choose One</option>
                <option>Quebec</option>
            </select>
        </div>


        <div class="form-group">
            Mobile
            <input type="text" name="cno" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-primary"/>
        </div>
    </form>
</div>
<?php include "footer.html" ?>