<?php

require_once('FileMaker/FileMaker.php');

$fm = new FileMaker();

//Connect
$fm->FileMaker($database = 'aptg', $hostspec = 'n432.fmphost.com', $username = 'Admin', $password = 'Ernie123!');

$layouts = $fm->listLayouts();

foreach($layouts as $layout){
	$layObj = $fm->getLayout($layout);
	$layObj = $layObj->_impl;
	//echo 'Layout - '.$layout.' '.print_r($layObj,true).'<br/>'.'<br/>'.'<br/>'.'<br/>';
	$name = $layObj->_name;
	$fields = $layObj->_fields;
	echo 'Layout: '.$name.'<br/>';
	if(count($fields) > 0){
		foreach($fields as $field){
			echo $field->_impl->_name.'<br/>';
		}
	}
	
	switch($layout){
	
		case 'accounts': //$newAdd = $fm->newAddCommand($layout, array('contact_email' => 'tim@automationlab.com'));
					   	 //$result = $newAdd->execute(); 
					   	  //create record
   						$rec = $fm->createRecord($layout, array('contact_email' => 'tim@automationlab.com'));
						$result = $rec->commit();
					   	 break;
		
	}
	
	echo '<br/><br/>';
	echo 'Result: '.print_r($result, true).'<br/><br/>';
}



   
   
//echo 'test: '.print_r($fm->listLayouts(), true);


?>
