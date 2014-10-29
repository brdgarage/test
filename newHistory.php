<?php 
    
?>

<form >
    <input type="hidden" name="vehicleid" id="vehicleid" value="<?php echo $_GET['vehicleid']; ?>" />
    <table>
        <tr>
            <td style="backgound-color:#b3b3b3;" colspan="2">
                <textarea rows="10" cols="213" name="newHistoryRecord" id="newHistoryRecord"></textarea>
            </td>
        </tr>
        <tr>
            <td><a href="javascript:saveHistory()">Save</a></td>
            <td text-align="right"><a href="javascript:closeHistory()">Close</a></td>
        </tr>
    </table>
</form>