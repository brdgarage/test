<?php
    set_time_limit(0);
    @ini_set("memory_limit",'64M');
    $filenametoread = "/data/hassan.txt";
    $filename = dirname(__file__).$filenametoread;
    
    $lastmodified = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;
    $currentmodif = filemtime($filename);
    
    while($currentmodif <= $lastmodified){
    	usleep(10000);
    	clearstatcache();
    	$currentmodif = filemtime($filename);
    }
    
    $responce = array();
    $responce['msg'] = file_get_contents($filename);
    $responce['timestamp'] = $currentmodif;
    echo json_encode($responce);
?>