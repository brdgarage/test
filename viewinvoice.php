<?php
    include "model/data.php";
    $r = getData('jobs',$_GET['jobnumber']);
    $grandTotal = 0;
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css" />
    </head>
    <body>
		<div class="col-md-6">
		    <table class="table table-bordered jobitems">
		        <thead>
		            <tr>
		                <th width="60">Date</th>
		                <th width="460">Item</th>
		                <th width="60">Quantity</th>
		                <th width="60">Retail</th>
		                <th width="60">Total</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php 
		                foreach ($r as $value) {
		                    echo "<tr><td>";
		                    $date = date_create($value['datecreated']);
		                    echo date_format($date, 'd/m/y' );
		                    echo "</td><td>";
		                    echo $value['item'];
		                    echo "</td><td>";
		                    echo $value['quantity'];
		                    echo "</td><td>&pound;";
		                    echo $value['retail'];
		                    echo "</td><td>&pound;";
		                    echo $value['retail'] * $value['quantity'];
		                    echo "</td></tr>";
		                    $grandTotal = $grandTotal + ($value['retail'] * $value['quantity']);
		                };
		            ?>
		              <tr>
		                  <td colspan="4" class="right">VAT:</td>
		                  <td>
		                      <?php
		                          echo "&pound;";
		                          echo round( ($grandTotal * 0.2 ), 2);
		                      ?>
		                  </td>
		              </tr>
		              <tr>
                          <td colspan="4" class="right">Total:</td>
                          <td>
                              <?php
                                echo "&pound;";
                                  echo round( ($grandTotal * 1.2 ), 2); 
                              ?>
                          </td>
                      </tr>
		        </tbody>
		    </table>
		</div>
</body>