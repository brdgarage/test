<?php
    
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

        function updateVals( rowID ){
        	var qnt = $('input[name=qnt_'+rowID+']').val();
        	var retail = $('input[name=retail_'+rowID+']').val();
        	var cost = qnt * retail;
        	var vat = cost * 0.2;
            $('input[name=vat_'+rowID+']').val( vat.toFixed(2) );
            $('input[name=sub_'+rowID+']').val( (vat + cost).toFixed(2) );
        }

        function addRow(){
            var rowCount = $('#formBody tr').length + 1;
            $('#formBody').append('<tr><td><input type="text" name="item_'+rowCount+'" class="largeInput" /></td><td><input type="text" name="supplier_'+rowCount+'" class="smallInput" /></td><td><input type="text" name="trade_'+rowCount+'" class="smallInput" /></td><td><input type="text" name="retail_'+rowCount+'" class="smallInput" /></td><td><input type="text" name="qnt_'+rowCount+'" onBlur="javascript:updateVals('+rowCount+')" class="smallInput qnt" /></td><td><input type="text" name="vat_'+rowCount+'" class="smallInput" /></td><td><input type="text" name="sub_'+rowCount+'" class="smallInput" /></td></tr>')
            $('#itemCount').val(rowCount);
        };
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div class="leftCol" id="newvehicles">
                
                <form action="insertNewJob.php" method="post">
                    <label for="milage">Milage:</label>
                    <input type="text" name="milage" value="" id="milage"/>
                    <br>
                    <a href="javascript:addRow()">Add Row</a>
                    <table class="table table-bordered" id="jobForm">
                      <thead>
                        <th>Item:</th>
                        <th>Supplier</th>
                        <th>Trade:</th>
                        <th>Retail:</th>
                        <th>Quantity:</th>
                        <th>Vat:</th>
                        <th>Sub:</th>
                      </thead>
                      <tbody id="formBody">
                        <tr>
                            <td>
                                <input type="hidden" name="vehicleid" value="<?php echo $_GET['vehicleid'] ?>" />
                                <input type="hidden" name="itemCount" id="itemCount" value="1" />
                                <input type="text" name="item_1" class="largeInput" />
                            </td>
                            <td><input type="text" name="supplier_1" class="smallInput" /></td>
                            <td><input type="text" name="trade_1" class="smallInput" /></td>
                            <td><input type="text" name="retail_1" class="smallInput" /></td>
                            <td><input type="text" name="qnt_1" onBlur="javascript:updateVals(1)" class="smallInput qnt" /></td>
                            <td><input type="text" name="vat_1" class="smallInput" /></td>
                            <td><input type="text" name="sub_1" class="smallInput" /></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table ">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="submit" value="Save" style="float: right;" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>