<?php
    include "model/data.php";
    $r = getData('vehicles',$_GET['clientid']);
?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
        <script src="assets/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="assets/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <script src="assets/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(document).ready(function($){
    $("a[rel^='prettyPhoto']").prettyPhoto({social_tools:false,
        keyboard_shortcuts:false});
});
</script>
<div class="col-md-6">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Registration</th>
                <th>Make</th>
                <th>Model</th>
                <th>Fuel</th>
                <th>Engine Size</th>
                <th>Trim</th>
                <th>Edit</th>
                <th>History</th>
                <th>Job</th>
                <th>New Note</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($r as $value) {
                	$vid = $value['id'];
                    echo "<tr id='v_$vid' class='v_tr'><td>";
                    echo $value['id'];
                    echo "</td><td>";
                    echo $value['registration'];
                    echo "</td><td>";
                    echo $value['make'];
                    echo "</td><td>";
                    echo $value['model'];
                    echo "</td><td>";
                    echo $value['fuel'];
                    echo "</td><td style='width:150px;'>";
                    echo $value['engine_size'];
                    echo "</td><td>";
                    echo $value['trim'];
                    echo "</td><td>";
                    $vehicleID = $value['id'];
                    echo "<a href='editvehicle.php?vehicleid=$vehicleID' target='_blank' rel='pretyPhoto'><img src='assets/images/edit.jpg' alt='Edit' title='Edit' width='20' height='20' class='img'  /></a>"; //onclick='javascript:editVehicle($vehicleID)'
                    echo "</td><td>";
                    echo "<img src='assets/images/history.jpg' alt='History' title='History' width='20' height='20' class='img' onclick='javascript:getHistory($vehicleID)' />";
                    echo '</td><td><a href="newJob.php?vehicleid='.$vehicleID.'&amp;iframe=true&amp;width=800&amp;height=400" rel="prettyPhoto[iframes]" target="_blank">New</a>';
                    echo "</td><td ><a href='javascript:newHistoryEntry($vid)'>New History</a>";
                    echo "</td></tr>";
                };
            ?>
        </tbody>
    </table>
</div>