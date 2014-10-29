<?php
$server = "127.0.0.1";
$user = "brd_data";
$password = "3l3m3ntal#";
$database = "brd";
$ct = $_GET['clienttype'];
$mysqli = new MySQLi($server,$user,$password,$database);
/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
$a_json = array();
$a_json_row = array();
if ($data = $mysqli->query("SELECT  C.firstname as firstname, 
                                    C.lastname as lastname, 
                                    C.id as id, 
                                    C.mobile as mobile 
                            FROM Customer AS C 
                            INNER JOIN address as A ON C.id = A.clientid
                            LEFT JOIN vehicles AS V ON c.id = V.client_id
                            WHERE C.customertype = '$ct'
                            AND (C.firstname COLLATE UTF8_GENERAL_CI LIKE '%$term%'
                            OR V.registration COLLATE UTF8_GENERAL_CI LIKE '%$term%' 
                            OR C.lastname COLLATE UTF8_GENERAL_CI LIKE '%$term%'
                            OR A.postcode COLLATE UTF8_GENERAL_CI LIKE '%$term%'
                            OR C.mobile COLLATE UTF8_GENERAL_CI LIKE '%$term%'
                            OR A.line1 COLLATE UTF8_GENERAL_CI LIKE '%$term%')
                            GROUP BY C.firstname
                            ORDER BY C.firstname , C.lastname, A.postcode
                            ")) {
    while($row = mysqli_fetch_array($data)) {
        $firstname = htmlentities(stripslashes($row['firstname']));
        $lastname = htmlentities(stripslashes($row['lastname']));
        $id = htmlentities(stripslashes($row['id']));
        $a_json_row["id"] = $id;
        $a_json_row["value"] = $firstname.' '.$lastname;
        $a_json_row["label"] = $firstname.' '.$lastname;
        array_push($a_json, $a_json_row);
    }
}
// jQuery wants JSON data
echo json_encode($a_json);
flush();
 
$mysqli->close();
?>