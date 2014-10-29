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
    $firstname =    mysqli_real_escape_string($mysqli, strtoupper($_POST['firstname']));
    $lastname =     mysqli_real_escape_string($mysqli, strtoupper($_POST['lastname']));
    $customertype = mysqli_real_escape_string($mysqli, strtoupper($_POST['customertype']));
    $mobile =       mysqli_real_escape_string($mysqli, strtoupper($_POST['mobile']));
    $line1 =        mysqli_real_escape_string($mysqli, strtoupper($_POST['line1']));
    $line2 =        mysqli_real_escape_string($mysqli, strtoupper($_POST['line2']));
    $town =         mysqli_real_escape_string($mysqli, strtoupper($_POST['town']));
    $county =       mysqli_real_escape_string($mysqli, strtoupper($_POST['county']));
    $postcode =     mysqli_real_escape_string($mysqli, strtoupper($_POST['postcode']));
    
    $customerData = "INSERT INTO customer (firstname,lastname,customertype,mobile) VALUES ('$firstname','$lastname','$customertype','$mobile')";
    $rv = $mysqli->query($customerData);
    $idval = $mysqli->insert_id;
    $adressData =   "INSERT INTO address (line1,line2,town,county,postcode,clientid) VALUES ('$line1','$line2','$town','$county','$postcode',$idval)";
    $rv2 = mysqli_query($mysqli,$adressData);
    
    if( $rv === false ){
    	echo "Error with customer insert";
    }
    if( $rv2 === false ){
    	echo "Error with address insert";
    }
    
    mysqli_close($mysqli);
?>