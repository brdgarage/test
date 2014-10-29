<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css" />
    </head>
    <body>
        <div id="wrapper">
            <div class="leftCol" id="customers">
		        <form action="insertNewCustomer.php" method="post">
		        <input type="hidden" name="customertype" value="private" />
		            <table class="table table-bordered">
		                <tr>
		                    <td>Firstname:</td>
		                    <td><input type="text" name="firstname" /></td>
		                </tr>
		                <tr>
	                        <td>Lastname:<span class="required">*</span></td>
	                        <td><input type="text" name="lastname" /></td>
	                    </tr>
	                    <tr>
                            <td>Mobile<span class="required">*</span>:</td>
                            <td><input type="text" name="mobile" /></td>
                        </tr>
	                    <tr>
                            <td>Address 1<span class="required">*</span>:</td>
                            <td><input type="text" name="line1" /></td>
                        </tr>
                        <tr>
                            <td>address 2:</td>
                            <td><input type="text" name="line2" /></td>
                        </tr>
                        <tr>
                            <td>Town:</td>
                            <td><input type="text" name="town" /></td>
                        </tr>
                        <tr>
                            <td>County:</td>
                            <td><input type="text" name="county" /></td>
                        </tr>
                        <tr>
                            <td>Postcode<span class="required">*</span>:</td>
                            <td><input type="text" name="postcode" /></td>
                        </tr>
	                    <tr>
                            <td>Customer Number:</td>
                            <td><input type="text" name="customernumber" /></td>
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