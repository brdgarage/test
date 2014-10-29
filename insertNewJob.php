<?php
    $server = "127.0.0.1";
    $user = "brd_data";
    $password = "3l3m3ntal#";
    $database = "brd";
    $mysqli = new MySQLi($server,$user,$password,$database);
    if($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    };
    
    $querySQL = "SELECT distinct(jobnumber) FROM jobs order by datecreated, jobnumber desc limit 1";
    $stack = array();
    if ($data = $mysqli->query($querySQL)) {
        while($row = mysqli_fetch_array($data)) {
           $lastJobNum = intval($row['jobnumber'])+1;
       };
    }

    // Loop over the form and get the values for DB insertion
    $wdate = new DateTime();
    $wdate->modify("+1 year");
    $wdate = date_format($wdate,'Y-m-d');
    
    for( $x=1;$x<=$_POST['itemCount'];$x++){
    	$item = "item_{$x}";
    	$trade = "trade_{$x}";
    	$retail = "retail_{$x}";
    	$quantity = "qnt_{$x}";
    	$supplier = "supplier_{$x}";
    	
        $item = mysqli_real_escape_string($mysqli, strtoupper($_POST[$item]));
	    $jobnumber = $lastJobNum;
	    $trade = mysqli_real_escape_string($mysqli, $_POST[$trade]);
	    $retail = mysqli_real_escape_string($mysqli, $_POST[$retail]);
	    $warrentyexpires = mysqli_real_escape_string($mysqli, $wdate);
	    $quantity = mysqli_real_escape_string($mysqli, $_POST[$quantity]);
	    $supplier = mysqli_real_escape_string($mysqli, strtoupper($_POST[$supplier]));
	    $vehicleid = mysqli_real_escape_string($mysqli, $_POST['vehicleid']);
        
	    $sql = "INSERT INTO jobs (item, jobnumber, trade,retail,warrentyexpires,quantity,supplier,vehicleid)
        VALUES ('$item', '$jobnumber','$trade','$retail','$warrentyexpires','$quantity','$supplier','$vehicleid')";
        if (!mysqli_query($mysqli,$sql)) {
            die('Error: ' . mysqli_error($mysqli));
        }
    }
    // End of insertion
    
    echo "1 record added";
    mysqli_close($mysqli);
?>