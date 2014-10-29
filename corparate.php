<?php
session_start();
if(!$_SESSION['myusername']){
    header("location:main_login.php");
}
include "menuData.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
        <script src="assets/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="assets/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <script src="assets/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        
        <script type="text/javascript"><!--
	        $(document).ready(function($){
		        
	        	waitForMsg();
	        	
	            $('#customerAutocomplte').autocomplete({
	                source:'suggest_name.php?clienttype=corparate', 
	                minLength:2,
	                select: function(event,ui){
	                    var id = ui.item.id;
	                    if(id != '') {
	                        updateCustomer(id);
	                        updateVehicles(id);
	                        $("#newvehicle").attr("href", "newVehicle.php?clientid="+id);
	                        $("#newvehicle").show();
	                    }
	                },
	                html: true
	            });
	        });

	        var newHistoryEntry = function(vehicleid){
	            $('#notes').html();
	            $.ajax({
	                url: "newHistory.php?",
	                data: "vehicleid=" + vehicleid,
	                success: function(data){
	                 $( "#notes" ).html( data );
	                }
	              });
	        };

	        var saveHistory = function(){
	            var vehicleid = $('#vehicleid').val();
	        	$.post("saveHistory.php",{log:$('#newHistoryRecord').val(),vehicleid:$('#vehicleid').val()});
	        	getHistory(vehicleid);
	        }
        
	        var updateVehicles = function(clientid){
	        	$.ajax({
	        		  url: "vehicles.php?",
	        		  data: "clientid=" + clientid,
	        		  success: function(data){
	        		   $( "#vehicleResults" ).html( data );
	        		  }
	        		});
	        }
	        var updateCustomer = function(clientid){
	            $.ajax({
	                  url: "customers.php?",
	                  data: "clientid=" + clientid,
	                  success: function(data){
	                   $( "#customerResults" ).html( data );
	                  }
	                });
	        }
	        var getHistory = function(vehicleid){
	            $('.v_tr').css("background","");
	        	$('#v_'+vehicleid).css("background","#b3b3b3");
	        	$.ajax({
	                url: "notes.php?1=1",
	                data: "vehicleid=" + vehicleid,
	                success: function(data){
	                 $( "#notes" ).html( data );
	                }
	              });
	        	$.ajax({
	                url: "history.php?1=1",
	                data: "vehicleid=" + vehicleid,
	                success: function(data){
	                 $( "#TimelineResultsBlock" ).html( data );
	                }
	              });
	
	        	$.ajax({
	                url: "invoices.php?1=1",
	                data: "vehicleid=" + vehicleid,
	                success: function(data){
	                 $( "#invoiceResultsBlock" ).html( data );
	                }
	              });
	        }

	        // Popup notification code
	        var timestamp = null;

	        function waitForMsg(){      
	            $.ajax({
	                type: "GET",
	                url: "getData.php?timestamp=" + timestamp +"filetouse=hassan",
	                async: true,
	                cache: false,

	                success: function(data){
	                    var json = eval('(' + data + ')');
	                    
	                    if( json.msg.length != 0 ){
	                    	var read = window.confirm(json.msg);
	                    	if( read ){
	                    	    clearMessages('hassan');
	                    	};
		                };
	                    
	                    timestamp = json['timestamp'];
	                    setTimeout('waitForMsg()',15000);
	                }
	            });
	        };

	        function clearMessages( filetoclear ){
	        	$.ajax({
                    type: "GET",
                    url: "clearData.php?filename=" + filetoclear,
                    async: true,
                    cache: false
	        	});
	        };
        </script>
    </head>
    <body role="document">
        <div id="wrapper">
            <div class="fullWidth header">
	            <nav>  
		          <ul class="menu">
		              <li><a href="index.php">Customers</a></li>
		              <li><a href="corparate.php" class="selected">corparate</a></li>
		              <li><a href="signout.php">Sign Out</a></li>
		           </ul>
	               <div class="clear"></div>
	           </nav>
            </div>
            <div class="leftCol">
                <div id="customers" class="MainTable">
                    <h4>Customers</h4>
                    <a href="newCustomer.php" target="_blank">New Customer</a>
                    <form method="post">
                        <input type="text" placeholder="Name" id="customerAutocomplte" class="ui-autocomplete-input" autocomplete="off" />
                    </form>
                    <div id="customerResults"></div>
                </div>
                <div id="vehicles" class="SubTable">
                    <table style="width:650px;">
                        <tr>
                            <td style="width:200px;"><h4>Vehicles</h4></td>
                            <td style="width:200px;"></td>
                            <td><a href="newVehicle.php" target="_blank" id="newvehicle" style="display:none;">New Vehicle</a></td>
                        </tr>
                    </table>
                    <div id="vehicleResults"></div>
                </div>
            </div>
            <div class="rightCol">
                <div id="history">
                    <div id="timeLine">
                        <h4>Jobs</h4>
                        <div id="TimelineResultsBlock"></div>
                    </div>
                    <div id="invoices">
                        <h4>Invoices</h4>
                        <div id="invoiceResultsBlock"></div>
                    </div>
                </div>
            </div>
            <br style="clear:both;" />
            <div class="fullWidth">
                <div id="notes">
                    Notes
                </div>
            </div>
        </div>
    </body>
</html>