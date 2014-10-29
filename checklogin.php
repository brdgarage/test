<?php
ob_start();
$host="127.0.0.1"; // Host name 
$username="brd_data"; // Mysql username 
$password="3l3m3ntal#"; // Mysql password 
$db_name="brd"; // Database name 
$tbl_name="users"; // Table name 

// Connect to server and select databse.
$mysqli = new MySQLi($host,$username,$password,$db_name);
    if($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    };

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($mysqli,$myusername);
$mypassword = mysqli_real_escape_string($mysqli,$mypassword);
$querySQL = "SELECT * FROM users WHERE username='$myusername' and password='$mypassword'";
$data = $mysqli->query($querySQL);
$stack = array();
if ($data = $mysqli->query($querySQL)) {
   while($row = mysqli_fetch_array($data)) {
      array_push($stack, $row);
   }
}
mysqli_close($mysqli);
// Mysql_num_row is counting table row
$count=sizeof($stack);
//echo $count;exit;
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
header("location:index.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>