<?php
    $server = "127.0.0.1";
    $user = "brd_data";
    $password = "3l3m3ntal#";
    $database = "brd";
    $vehicleid = $_GET['vehicleid'];
    
    $mysqli = new MySQLi($server,$user,$password,$database);
    if($mysqli->connect_error) {
        echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
        exit;
    } else {
        $mysqli->set_charset('utf8');
    }
    $querySQL = "SELECT group_concat(item SEPARATOR ',\n ')as item , sum(retail) as retail, jobnumber ,datecreated, ID FROM `jobs` WHERE  vehicleid = $vehicleid group by jobnumber ORDER BY datecreated, jobnumber DESC";
    $stack = array();
    if ($data = $mysqli->query($querySQL)) {
       while($row = mysqli_fetch_array($data)) {
           array_push($stack, $row);
       }
    }
    mysqli_close($mysqli);
    
    ?>

<div >
    <table class="table table-bordered " id="historyRecord">
        <thead>
            <th>Date:</th>
            <th>Job No:</th>
            <th>Work:</th>
            <th>Sub:</th>
            <th>Vat:</th>
            <th>Total:</th>
        </thead>
        <tbody>
            <?php 
                foreach ($stack as $value) {
                    echo "<tr><td>";
                    $date = date_create($value['datecreated']);
                    echo date_format($date, 'd/m/y' );
                    echo "</td><td>";
                    echo $value['jobnumber'];
                    echo "</td><td>";
                    echo $value['item'];
                    echo "</td><td>";
                    echo "&pound;";
                    echo number_format($value['retail'],2);
                    echo "</td><td>";
                    echo "&pound;";
                    $vat = round( $value['retail'] * 0.2 , 2 );
                    $total = round( $value['retail'] * 1.2 , 2 );
                    echo number_format($vat,2);
                    echo "</td><td>";
                    echo "&pound;";
                    echo number_format($total,2);
                    echo "</td></tr>";
                };
            ?>
        </tbody>
    </table>
</div>