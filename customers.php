<?php
    include "model/data.php";
    $customerid = $_GET['clientid'];
    $r = getData('customer',$customerid);
?>
<div class="col-md-6">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Code</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($r as $value) {
                    echo "<tr><td>";
                    echo $value['id'];
                    echo "</td><td>";
                    echo $value['firstname'];
                    echo "</td><td>";
                    echo $value['lastname'];
                    echo "</td><td>";
                    echo $value['mobile'];
                    echo "</td><td style='min-width: 100px;'>";
                    echo $value['address'];
                    echo "</td><td>";
                    echo $value['customercode'];
                    echo "</td><td>";
                    echo "<a href='editCustomer.php?customerid=$customerid' target='_blank'><img src='assets/images/edit.jpg' alt='Edit' title='Edit' width='20' height='20' class='img' /></a>";
                    echo "</td></tr>";
                };
            ?>
        </tbody>
    </table>
</div>