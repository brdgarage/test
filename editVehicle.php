<?php 
    include "model/data.php";
    $r = getData('vehicle',$_GET['vehicleid']);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css" />
        <link rel="stylesheet" type="text/css" href="assets/jquery-ui-1.11.1.custom/jquery-ui.min.css" />
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function($){
            $(function() {
                $( "#mot" ).datepicker();
                $( "#service" ).datepicker();
            });
        });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div class="leftCol" id="newvehicles">
		        <form action="insertNewVehicle.php" method="post">
		            <table class="table table-bordered">
		              <input type="hidden" name="clientid" value="<?php echo $_GET['vehicleid'] ?>" />
		                <tr>
                            <td>Registration:</td>
                            <td><input type="text" name="registration" value="<?php echo $r[0]['registration'] ?>" /></td>
                        </tr>
		                <tr>
		                    <td>Make:</td>
		                    <td><input type="text" name="make" value="<?php echo $r[0]['make'] ?>" /></td>
		                </tr>
		                <tr>
	                        <td>Model:</td>
	                        <td><input type="text" name="model" value="<?php echo $r[0]['model'] ?>" /></td>
	                    </tr>
	                    <tr>
                            <td>Fuel:</td>
                            <td><input type="text" name="fuel" value="<?php echo $r[0]['fuel'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Trim:</td>
                            <td><input type="text" name="trim" value="<?php echo $r[0]['trim'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Engine Size:</td>
                            <td><input type="text" name="enginesize" value="<?php echo $r[0]['engine_size'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>MOT:</td>
                            <td><input type="text" name="mot" id="mot" value="<?php echo $r[0]['mot'] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Service:</td>
                            <td><input type="text" name="service" id="service" value="<?php echo $r[0]['service'] ?>" /></td>
                        </tr>
	                    <tr>
	                        <td></td>
	                        <td><input type="submit" name="submit" value="Save" /></td>
	                    </tr>
		            </table>
		        </form>
	        </div>
        </div>
    </body>
</html>