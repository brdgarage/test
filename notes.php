<?php
    include "model/data.php";
    $r = getData('history',$_GET['vehicleid']);
    $vehicleid = $_GET['vehicleid'];
    ?>

<div class="col-md-6">
    
    <table class="table table-bordered historyResults" id="historyRecord">
        <tbody>
            <?php 
                foreach ($r as $value) {
                    echo "<tr><td>";
                    $date = date_create($value['datecreated']);
                    echo date_format($date, 'd/m/y H:m:s' );
                    echo "</td><td>";
                    echo $value['history'];
                    echo "</td></tr>";
                };
            ?>
        </tbody>
    </table>
</div>