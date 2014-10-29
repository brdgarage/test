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
    
    
    $motFormDate = explode('/',$_POST['mot']);
    $mdate = "$motFormDate[0]/$motFormDate[1]/$motFormDate[2]";
    $motDate = new DateTime($mdate);
    
    $serviceFormDate = explode('/',$_POST['service']);
    $sdate = "$serviceFormDate[0]/$serviceFormDate[1]/$serviceFormDate[2]";
    $serviceDate = new DateTime($sdate);
    
    
    
    $make = mysqli_real_escape_string($mysqli, strtoupper($_POST['make']));
    $model = mysqli_real_escape_string($mysqli, strtoupper($_POST['model']));
    $trim = mysqli_real_escape_string($mysqli, strtoupper($_POST['trim']));
    $enginesize = mysqli_real_escape_string($mysqli, $_POST['enginesize']);
    $clientid = mysqli_real_escape_string($mysqli, strtoupper($_POST['clientid']));
    $registration = mysqli_real_escape_string($mysqli, strtoupper($_POST['registration']));
    $fuel = mysqli_real_escape_string($mysqli, strtoupper($_POST['fuel']));
    $sql = "INSERT INTO vehicles (make, model, trim,engine_size,registration,fuel,mot,service,client_id)
    VALUES ('$make', '$model','$trim','$enginesize','$registration','$fuel','" . date_format($motDate,'Y-m-d') . "','" . date_format($serviceDate,'Y-m-d') . "','$clientid')";
    if (!mysqli_query($mysqli,$sql)) {
        die('Error: ' . mysqli_error($mysqli));
    }
    echo "1 record added";
    mysqli_close($mysqli);
?>