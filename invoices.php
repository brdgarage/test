<?php
    include "model/data.php";
    $r = getData('invoices',$_GET['vehicleid']);
?>
<div class="col-md-6">
    <table class="table table-bordered historyResults">
        <tbody>
            <?php 
                foreach ($r as $value) {
                    echo "<tr><td>";
                    $date = date_create($value['datecreated']);
                    echo date_format($date, 'd/m/y' );
                    echo "</td><td>&pound;";
                    echo $value['total'];
                    echo "</td><td>";
                    if( $value['datepaid'] != '' ){
                    	echo "Paid";
                    }else{
                    	echo "Out standing";
                    };
                    echo "</td><td><a target='_blank' href='viewinvoice.php?jobnumber=";
                    echo $value['jobnumber'];
                    echo "'>Invoice</a></td></tr>";
                };
            ?>
        </tbody>
    </table>
</div>