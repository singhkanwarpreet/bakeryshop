<?php
error_reporting(0);
session_start();
if (isset($_SESSION['session2']))
    include "user_header.php";
else
{
    include "public_header.php";
}

$subcat = $_REQUEST['sc'];
$category = $_REQUEST['c'];
?>
<!-- Latest-Arrivals -->
<div class="wthreehome-latest">
    <div class="container">

        <div class="wthreehome-latest-grids">
            <?php
            $pro = "select * from products where  sub_id=$subcat";
            $pro_res = mysqli_query($conn, $pro);
            if (mysqli_num_rows($pro_res)) {
                while ($pro_row = mysqli_fetch_array($pro_res)) {
                    ?>
                    <div class="col-md-4 wthreehome-latest-grid wthreehome-latest-grid1">
                        <div class="grid">
                            <figure class="effect-apollo">
                                <img src="<?php echo $pro_row[3] ?>" style="width:350px;height: 350px;"
                                     alt="Urban Crave- Bakery Store"><br>
                                <figcaption></figcaption>
                            </figure>
                        </div>
                        <h4 class="text-uppercase"><?php echo $pro_row[1] ?></h4>
                        <?php $amt = ($pro_row[4] / 100) * $pro_row[2]; ?>
                        <h5>&#8377; <?php echo $pro_row[2] - $amt ?></h5>
                        <?php
                        if ($pro_row[4] != "0.00") {
                            ?>
                            <p class="text-center text-info" style="font-weight: 600;">
                                <?php echo (int)$pro_row[4] . "% Off"; ?></p>
                            <p class="text-center " style="font-weight: 600;text-decoration:line-through;">
                                &#8377; <?php echo $pro_row[2] ?></p>
                        <?php } else {
                            echo "<br><br>";
                        } ?>
                        <div class="row">
                            <div class="col-sm-7 col-xs-7">
                                <select id="pqty<?php echo $pro_row[0] ?>" class="form-control">
                                    <option value="">Quantity</option>
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        ?>
                                        <option><?php echo $i ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <h6>
                                    <button class="btn btn-primary" onclick="addtocart(<?php echo $pro_row[0] ?>)">Add
                                        to Cart
                                        <span class="glyphicon glyphicon-shopping-cart"></span></button>
                                </h6>
                            </div>
                        </div>


                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="alert alert-danger">
                            No data found.

                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <?php
            }
            ?>


        </div>
        <div class="clearfix"></div>

    </div>
</div>
<!-- //Latest-Arrivals -->
<?php include "footer.html" ?>
