<?php
    include "model/data.php";
    $customerid = $_GET['customerid'];
    $r = getData('customer',$customerid);
    //$ct = getData('customertype',$customerid);
    $addressBlock = explode("\n",$r[0][6]);
?>
<div id="wrapper">
    <div class="leftCol" id="customers">
        <form action="customerEdit.php" method="post">
            <table class="table table-bordered">
                <tr>
                    <td>Firstname:</td>
                    <td><input type="text" name="firstname" value="<?php echo $r[0]['firstname']?>" /></td>
                </tr>
                <tr>
                        <td>Lastname:</td>
                        <td><input type="text" name="lastname" value="<?php echo $r[0]['lastname']?>" /></td>
                    </tr>
                    <tr>
                            <td>Mobile:</td>
                            <td><input type="text" name="mobile" value="<?php echo $r[0]['mobile']?>" /></td>
                        </tr>
                    <tr>
                            <td>Address 1:</td>
                            <td><input type="text" name="line1" value="<?php echo $addressBlock[0] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Address 2:</td>
                            <td><input type="text" name="line2" value="<?php echo $addressBlock[1] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Town:</td>
                            <td><input type="text" name="town" value="<?php echo $addressBlock[2] ?>" /></td>
                        </tr>
                        <tr>
                            <td>County:</td>
                            <td><input type="text" name="county" value="<?php echo $addressBlock[3] ?>" /></td>
                        </tr>
                        <tr>
                            <td>Postcode:</td>
                            <td><input type="text" name="postcode" value="<?php echo $addressBlock[4] ?>" /></td>
                        </tr>
                    <tr>
                            <td>Customer Type:</td>
                            <td>
                                <input type="text" name="customertype" value="<?php echo $r[0]['customertype'] ?>" />
                            </td>
                        </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Save" /></td>
                    </tr>
            </table>
        </form>
    </div>
</div>