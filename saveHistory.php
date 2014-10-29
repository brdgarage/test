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
    $historyData = mysqli_real_escape_string($mysqli, $_POST['log']);
    $vehicleid = $_POST['vehicleid'];
    mysqli_query($mysqli,"INSERT INTO history (history, vehicleid)
    VALUES ('$historyData',$vehicleid)");
    mysqli_close($mysqli);
?>