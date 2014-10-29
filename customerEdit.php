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
    $firstname =    mysqli_real_escape_string($mysqli, $_POST['firstname']);
    $lastname =     mysqli_real_escape_string($mysqli, $_POST['lastname']);
    $customertype = mysqli_real_escape_string($mysqli, $_POST['customertype']);
    $mobile =       mysqli_real_escape_string($mysqli, $_POST['mobile']);
    $line1 =        mysqli_real_escape_string($mysqli, $_POST['line1']);
    $line2 =        mysqli_real_escape_string($mysqli, $_POST['line2']);
    $town =         mysqli_real_escape_string($mysqli, $_POST['town']);
    $county =       mysqli_real_escape_string($mysqli, $_POST['county']);
    $postcode =     mysqli_real_escape_string($mysqli, $_POST['postcode']);
    mysqli_query($mysqli,"UPDATE customer SET FirstName = '$firstname', LastName = '$lastname', customertype = '$customertype',mobile = '$mobile'");
    mysqli_query($mysqli,"UPDATE address SET line1 = '$line1', line2 = '$line2', town = '$town',county = '$county',postcode = '$postcode'");
    echo "1 record added";
    mysqli_close($mysqli);
?>