<?php
  $data = array();
  
	function add_person( $cell1, $cell2, $cell3, $cell4, $cell5, $cell6, $cell7, $cell8 ){
	    global $data;
	    global $cname;
	    
	    $data []= array(
	        'cell1' => $cell1,
	        'cell2' => $cell2,
	        'cell3' => $cell3,
	        'cell4' => $cell4,
	        'cell5' => $cell5 ,
	        'cell6' => $cell6,
	        'cell7' => $cell7,
	        'cell8' => $cell8
	    );
	    
	    if($cell1 =='INVOICE'){
	    	$cname = $cell3;
	    }
	    
	}
	  
	if ( $_FILES['file']['tmp_name'] ){
		$dom = new DOMDocument();
        $dom->load( $_FILES['file']['tmp_name'] );
	    $rows = $dom->getElementsByTagName( 'Row' );
	    $first_row = true;
	    foreach ($rows as $row){
	        if ( !$first_row ){
	            $cell1 = "";
	            $cell2 = "";
	            $cell3 = "";
	            $cell4 = "";
	            $cell5 = "";
	            $cell6 = "";
	            $cell7 = "";
	            $cell8 = "";
	            
	            $index = 1;
	            $cells = $row->getElementsByTagName( 'Cell' );
	            foreach( $cells as $cell ){ 
	                $ind = $cell->getAttribute( 'Index' );
	                if ( $ind != null ) $index = $ind;
	  
	                if ( $index == 1 ) $cell1 = $cell->nodeValue;
	                if ( $index == 2 ) $cell2 = $cell->nodeValue;
	                if ( $index == 3 ) $cell3 = $cell->nodeValue;
	                if ( $index == 4 ) $cell4 = $cell->nodeValue;
	                if ( $index == 5 ) $cell5 = $cell->nodeValue;
	                if ( $index == 6 ) $cell6 = $cell->nodeValue;
	                if ( $index == 7 ) $cell7 = $cell->nodeValue;
	                if ( $index == 8 ) $cell8 = $cell->nodeValue;
	                $index += 1;
	            }
	            $t = add_person( $cell1, $cell2, $cell3, $cell4,$cell5, $cell6, $cell7, $cell8 );
	            
	        }
	        $first_row = false;
	    }
	    $local['cname'] = $data[0]['cell3'];
	    $local['vehicle'] = $data[1]['cell1'];
	    $local['jobno'] = str_replace("NO: ","",$data[2]['cell1']);
	    $local['reg'] = str_replace("REG: ","",$data[2]['cell2']);
	    $local['tel'] = str_replace("TEL: ","",$data[2]['cell3']);
	    $local['date'] = $data[3]['cell1'];
	    $local['milage'] = $data[3]['cell2'];
	    
	    //5 - 28l
	    //var_dump($local);
	    var_dump($data);
	    global $items;
	    for($x=5;$x<=28;$x++){
	       $dataCell = $data[$x];
	       if( $dataCell['cell1'] != '' or 
	           $dataCell['cell2'] != '' or 
	           $dataCell['cell3'] != '' or
	           $dataCell['cell4'] != '' or
	           $dataCell['cell5'] != '' or
	           $dataCell['cell6'] != '' or
	           $dataCell['cell7'] != '' or
	           $dataCell['cell8'] != ''
	           ){
	           	if($dataCell['cell1'] == ''){
	           		$items[$x]['count'] = 1;
	           	}else{
	           		$items[$x]['count'] = $dataCell['cell1'];
	           	}
	           	$items[$x]['description'] = $dataCell['cell2'];
                $items[$x]['price'] = $dataCell['cell3'];
	           }
	    }
	    
	    
	}
	var_dump($items);
?>