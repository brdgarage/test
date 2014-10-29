<?php
    $file_x = "data/".$_GET['filename'].".txt"; 
    //create a file handler by opening the file
    $myTextFileHandler = @fopen($file_x,"r+");

	//truncate the file to zero
	//or you could have used the write method and written nothing to it
	@ftruncate($myTextFileHandler, 0);
?>