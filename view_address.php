<?php
include "connection.php";
include "user_header.php";
$addr = "select * from address where user_email='" . $_SESSION['session2'] . "'";
//echo $addr;
$addr_res = mysqli_query($conn, $addr);
?>
<div class="container">
    <br>
    <br>
    <h2>My Address</h2>
    <table class="table table-responsive">
        <tr>
            <th class="text-center">Sr. No.</th>
            <th class="text-center">Location</th>
            <th class="text-center">Apartment</th>
            <th class="text-center">Contact No.</th>
            <th class="text-center">City & State</th>
        </tr>
        <?php
        $count=0;
        while ($addr_row=mysqli_fetch_array($addr_res)){
            ?>
            <tr class="text-center">
                <td><?php echo ++$count ?></td>
                <td><?php echo ucwords(urldecode($addr_row[1])) ?></td>
                <td><?php echo ucwords(urldecode($addr_row[2])) ?></td>
                <td><?php echo $addr_row[3] ?></td>
                <td><?php echo $addr_row[4]." (".$addr_row[5] ?>)</td>
                <td><a href="edit_address.php?q=<?php echo $addr_row[0] ?>">Edit</a></td>
                <td><a href="delete_address.php?q=<?php echo $addr_row[0] ?>">Delete</a></td>
            </tr>
        <?php
        }


        ?>
    </table>
</div>
<?php include "footer.html" ?>