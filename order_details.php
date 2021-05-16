<?php
error_reporting(0);
session_start();
if (isset($_SESSION['session2']))
    include "user_header.php";
else
    include "public_header.php";
include "cart.php";
include "connection.php";
$ar1 = array();
$ar2 = array();
$ar1 = $_SESSION['cart'];
$srno = 0;
?>
<div class="wthreehome-latest">
    <div class="container">
        <h2>My Cart</h2>
        <?php
        if (isset($_SESSION['cart'])) {
            if (count($_SESSION['cart'])) {
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>

                        <tr>
                            <th>Sr. No.</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <?php
                        $count = count($ar1);
                        $gt = 0;
                        for ($i = 0; $i < $count; $i++) {
                            $ar2 = (array)$ar1[$i];
                            ?>
                            <tr>
                                <td><?php echo ++$srno ?></td>
                                <td><?php echo $ar2['pro_name'] ?></td>
                                <td><img src="<?php echo $ar2['pro_photo'] ?>" height="70" width="50" class="img-responsive" /></td>
                                <?php
                                $bselect = "select b_name from brands where b_id=" . $ar2['brand'];
                                $bres = mysqli_query($conn, $bselect);
                                $brow = mysqli_fetch_array($bres);
                                ?>
                                <td><?php echo $brow[0] ?></td>
                                <td>
                                <span
                                        style="text-decoration: line-through"> &#36; <?php echo $ar2['price'] ?></span><br>
                                    <?php
                                    $pr = $ar2['price'];
                                    $disc = $ar2['discount'];
                                    $amt = $pr - ($disc / 100) * $pr;
                                    echo "&#36; " . (int)$amt . ".00";
                                    ?>
                                </td>
                                <td>
                                    <?php echo $ar2['qty'] ?>
                                </td>
                                <td>&#36; <?php echo $amt * $ar2['qty'] . ".00";
                                    $gt += $amt * $ar2['qty']; ?></td>
                                <td><a onclick="delete_cart(<?php echo $ar2['srno'] ?>)" style="cursor: pointer">Delete</a></td>
                            </tr>
                            <?php

                        }
                        ?>
                        <tr>
                            <th colspan="6" class="text-right">Grand Total :</th>
                            <td colspan="2">&#36; <?php echo $gt; ?></td>
                        </tr>
                        <tr>
                            <th colspan="6"></th>
                            <td colspan="2">
                                <a href="#"><input type="button" value="PROCEED TO PAY"
                                                             class="btn btn-primary btn-lg"/></a>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php } else {
                echo "<div class='alert alert-danger'>No Item(s) added to the cart.</div>";
            }

        } else {
            echo "<div class='alert alert-danger'>No Item(s) added to the cart.</div>";
        }
        ?>
    </div>
</div>
<?php include "footer.html" ?>