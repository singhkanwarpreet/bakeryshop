<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- jQuery JS -->
    <script src="../js/vendor/jquery-1.12.0.min.js"></script>
    <!-- jQuery Validate JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
            integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
            crossorigin="anonymous"></script>
</head>
<!-- Body -->
<body>
<?php include "public_header.php";
include "slider.html"; 
if (isset($_REQUEST['msg'])) {
    ?>
    <script>alert('<?php echo $_REQUEST['msg'] ?>');</script>
    <?php
}
?>
<!-- Latest-Arrivals -->
<div class="wthreehome-latest">
    <div class="container">

        <div class="wthreehome-latest-grids">
            <?php
            $pro = "select * from products order by p_id desc";
            $pro_res = mysqli_query($conn, $pro);
            while ($pro_row = mysqli_fetch_array($pro_res)) {
                ?>
                <div class="col-md-4 wthreehome-latest-grid wthreehome-latest-grid1">
                    <div class="grid">
                        <figure class="effect-apollo">
                            <img src="<?php echo $pro_row[3] ?>" style="width:350px;height: 350px;"
                                 alt="3P"><br>
                            <a href="product_details.php?q=<?php echo $pro_row[0] ?>">
                                <figcaption></figcaption>
                            </a>
                        </figure>
                    </div>
                    <h4 class="text-uppercase"><?php echo $pro_row[1] ?></h4>
                    <?php $amt = ($pro_row[4] / 100) * $pro_row[2]; ?>
                    <h5>&#36; <?php echo $pro_row[2] - $amt ?></h5>
                    <?php
                    if ($pro_row[4] != "0.00") {
                        ?>
                        <p class="text-center text-info" style="font-weight: 600;">
                            <?php echo (int)$pro_row[4] . "% Off"; ?></p>
                        <p class="text-center " style="font-weight: 600;text-decoration:line-through;">
                              &#36; <?php echo $pro_row[2] ?></p>
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
                                <button class="btn btn-primary" onclick="addtocart(<?php echo $pro_row[0] ?>)">Add to
                                    Cart
                                    <span class="glyphicon glyphicon-shopping-cart"></span></button>
                            </h6>
                        </div>
                    </div>


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
</body>
<!-- //Body -->


</html>