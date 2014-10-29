<?php
// Store data
function newCustomer(){
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
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $customercode = mysqli_real_escape_string($con, $_POST['customernumber']);
    mysqli_query($con,"INSERT INTO customer (FirstName, LastName, customercode)
    VALUES ('$firstname', '$lastname','$customercode')");
    mysqli_close($mysqli);
}
 
// Get data
function getData($tableName,$clientid){
	$server = "127.0.0.1";
    $user = "brd_data";
    $password = "3l3m3ntal#";
    $database = "brd";
    
    switch ($tableName) {
        case "vehicles":
            $idCol = "client_id";
            break;
        case "vehicle":
        	$tableName = "vehicles";
            $idCol = "id";
            break;
        case "customer":
            $idCol = "id";
            break;
        case "vehiclehistory":
            $idCol = "vehicleID";
            break;
        case "history":
            $idCol = "vehicleid";
            break;
        case "customerHistory":
            $idCol = "customerID";
            break;
        case "invoices":
            $idCol = "vehicleID";
            break;
        case "jobs":
            $idCol = "jobnumber";
            break;
        case "customertype";
            $idCol = "";
            break;
    }
    
    $mysqli = new MySQLi($server,$user,$password,$database);
    if($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    }
    $stack = array();
    
    if( $tableName == "customer" ){
    	$querySQL = "SELECT custom.*, (SELECT CONCAT_WS('\n',line1,line2,town,county,postcode) list from address where clientid = $clientid) as address FROM customer as custom WHERE custom.id = $clientid";
    }elseif($idCol != '' ){
    	$querySQL = "SELECT * FROM $tableName where $idCol = $clientid order by id desc";
    }else{
    	$querySQL = "SELECT * FROM $tableName order by id desc";
    };
    
    if ($data = $mysqli->query($querySQL)) {
	   while($row = mysqli_fetch_array($data)) {
	       array_push($stack, $row);
	   }
    }
    mysqli_close($mysqli);
    return $stack;
 }; 
?>