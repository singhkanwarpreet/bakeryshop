<?php
include "admin_header.php";
include "connection.php";
?>
<div class="wthreehome-latest">
    <div class="container">
        <h2>Dispatched Orders</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center">Sr. No.</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Order Date</th>
                    <th class="text-center">Order Time</th>
                    <th class="text-center">Total Amount</th>
                    <th class="text-center">Payment Type</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <?php
                $count = 0;
                $select = "select * from bill where status='dispatched'";
                $res = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <tr class="text-center">
                        <td><?php echo ++$count ?></td>
                        <td><?php echo $row[3] ?></td>
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
                        <td>Dispatched</td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php include "admin_footer.php" ?>
