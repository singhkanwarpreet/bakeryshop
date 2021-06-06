<?php
include "user_header.php";
include "connection.php";
?>
<div class="wthreehome-latest">
    <div class="container">
        <h2>My Orders</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center">Sr. No.</th>
                    <th class="text-center">Order Date</th>
                    <th class="text-center">Order Time</th>
                    <th class="text-center">Total Amount</th>
                    <th class="text-center">Payment Type</th>
                    <th class="text-center">Shipping Address</th>
                    <th class="text-center">Order Status</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <?php
                $count = 0;
                $select = "select * from bill where user_email='" . $_SESSION['session2'] . "' order by b_id desc";
                $res = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <tr class="text-center">
                        <td><?php echo ++$count ?></td>
                        <td><?php $dt = $row[4];
                            $arr = strtotime($dt);
                            echo date('D, d M Y', $arr) ?></td>
                        <td>
                            <?php echo $row[5] ?>
                        </td>
                        <td>
                            <?php echo $row[1] ?>
                        </td>
                        <td><?php echo $row[2] ?></td>
                        <td>
                            <?php
                            $addr = "select * from address where aid=" . $row[7];
                            $addr_res = mysqli_query($conn, $addr);
                            $addr_row = mysqli_fetch_array($addr_res);
                            ?>
                            <table class="table">
                                <tr>
                                    <th>Location :</th>
                                    <td><?php echo urldecode($addr_row[1]) ?></td>
                                </tr>
                                <tr>
                                    <th>Apartment :</th>
                                    <td><?php echo urldecode($addr_row[2]) ?></td>
                                </tr>
                                <tr>
                                    <th>Contact No. :</th>
                                    <td><?php echo $addr_row[3] ?></td>
                                </tr>
                                <tr>
                                    <th>City & State :</th>
                                    <td><?php echo ucwords($addr_row[4]) ?> (<?php echo $addr_row[5] ?>)</td>
                                </tr>
                            </table>
                        </td>
                        <td><?php echo $row[6] ?></td>
                        <?php
                        if ($row[6] == "pending") {
                            ?>
                            <td><a href="cancel_order.php?q=<?php echo $row[0] ?>">Cancel Order</a></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <th colspan="6" class="text-center">List of Products</th>
                    </tr>
                    <tr>
                        <th colspan="7">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Product Name</th>
                                            <th>Photo</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total Amt.</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $pcount = 0;
                                        $bd = "select product_id,qty,p_name,price,discount,photo from bill_details inner join products on bill_details.product_id=products.p_id where bill_id=$row[0]";
                                        $bd_res = mysqli_query($conn, $bd);
                                        while ($bd_row = mysqli_fetch_array($bd_res)) {
                                            ?>
                                            <thead>
                                            <tr class="text-center">
                                                <td><?php echo ++$pcount ?></td>
                                                <td><?php echo $bd_row[2] ?></td>
                                                <td>
                                                    <img src="<?php echo $bd_row[5] ?>" height="150" width="150"/>
                                                </td>
                                                <td>
                                                    <?php $disc = $bd_row[3] - ($bd_row[4] / 100) * $bd_row[3];
                                                    echo $disc; ?> (<?php echo (int)$bd_row[4] ?>% Off)<br>
                                                    <span
                                                        style="text-decoration: line-through;"> <?php echo $bd_row[3] ?></span>
                                                </td>
                                                <td><?php echo $bd_row[1] ?></td>
                                                <td>
                                                    <?php echo $disc * $bd_row[1] ?>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                        }
                                        ?>
                                        
                                        <tr class="text-center">
                                            <td></td>
                                        </tr>
                                    </table><hr style="color:black">
                                </div>
                                <div class="col-sm-2"></div>
                            </div>

                        </th>
                    </tr>
                    <?php
                }
                ?>
            </table>
            
        </div>
    </div>
</div>
<?php include "footer.html" ?>
