<?php

	define('filter_limit', 200);


	echo "<pre>";
	require ('trade-gecko-api.php');

	$tg = new Trade_Gecko_API();	
	 
	require('FileMaker/FileMaker.php');

	$fm = new FileMaker();
	$fm->FileMaker($database = 'aptg', $hostspec = 'n432.fmphost.com', $username = 'Admin', $password = 'Ernie123!');


	require('fmp-get-layouts-db-dev.php');

	$fMP_DB_Controller = new FMP_DB_Controller($fm);


echo "<pre>";


$layoutList = array(
		'products',
		'accounts',
		'addresses',
		'purchase_order_line_items',
		'purchase_orders',

		'payment_terms',
		'order_line_items',
		'orders',
		'locations',
		'invoice_line_items',
		'invoices',
		'images',
		'fulfillment_line_items',
		'fulfillments',
		'contacts',
		'companies'
);


foreach ($layoutList as $key => $layout) {

	echo "<h1>Layout: $layout </h1>";
	$response 	= $tg->fetch($layout);
	// print_r($fMP_DB_Controller->getTableFields($layout));
	// print_r($response);

	echo "<br> total " . $layout . ' = ' . count($response[$layout]) . '<br>';

	$fMP_DB_Controller->processData($response,$layout);

	break;

}






/**
 * Issue
 * @todo in account layout stock_level_warn field is not saving with any data from trade geko
 * @todo in payment_terms tg field from and in fmp db is payment_from they didn't match and can cause not saving -> done
 * @todo in locations field holds_stock field is not saving with data from trade geko
 * @todo in contacts field online_ordering is not saving with data from trade geko
 */









exit;



exit;


	$layout = 'accounts';
	$id = 39350;
	$values = array(
		'contact_email' => 'update - greg.foster@ableplastics.com.au',
	 	'country' => 'update - AU'
	);


$request = $fm->newFindCommand($layout);

$request->addFindCriterion('id', $id); // 'id' is a random, alphanumeric field

$result = $request->execute();

if (FileMaker::isError($result)) {

	echo '<br>Error: (' . $result->getCode() . ') ' . $result->getMessage() . "n";
	echo "<br>nothing to updated";

} else {

	$attendees = $result->getRecords();

	$attendee = $attendees[0];

	print_r($attendee);

	$attendee->setField('contact_email', 'jesus@gmail.com');
	$attendee->setField('country', 'PHP');

	$update = $attendee->commit();


	if (FileMaker::isError($update)) {

		echo ' Error: (' . $update->getCode() . ') ' . $update->getMessage() . "";

	}else{

		echo   "<br>updated";

	}


}
































exit;

	$edit = $fm->newEditCommand('accounts', $id);
	$edit->setField('country', 'UA');
	if($edit->execute()) {
		echo "<br>Updated";
	} else {
		echo "<br> not updated";
	}




exit;
$edit = $fm->newEditCommand('accounts', 39350, $values);
$result = $edit->execute();

	if($result) {
		echo "<br>updated ";
	}  else {
		echo "<br> failed to update";
	}





exit;





    echo "<br><br><br><br> print layout <br><br><br>";


$layouts = $fm->listLayouts();
	
$layoutFields = array(); 

foreach($layouts as $layout) {
	$layObj = $fm->getLayout($layout);
	$layObj = $layObj->_impl;
	//echo 'Layout - '.$layout.' '.print_r($layObj,true).'<br/>'.'<br/>'.'<br/>'.'<br/>';
	$name = $layObj->_name;
	$fields = $layObj->_fields;
	echo 'Layout: '.$name.'<br/>';
	if(count($fields) > 0){
		foreach($fields as $field){
			// echo $field->_impl->_name.'<br/>'; 
			$layoutFields[] = $field->_impl->_name;
		}
	} 

} 

exit;





 
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

 

	// This will get the data from Trade Geko
	$response 	= $tg->fetch($object);

 
	switch($layout) {
	
		case 'accounts':    
				// insert accounts via for each 
				$fMP_DB_Controller->insertAccounts($response, $layout);   

			break;

			case 'accounts': 
				 
				break;

			case 'addresses': 
				  
				break;

			case 'companies': 
				 
				break;

			case 'contacts': 
				 

				break;

			case 'fulfillments':  

				break;

			case 'fulfillment_line_items':  

				break;

			case 'images':  

				break;

			case 'locations':  

				break;

			case 'invoices':  

				break;

			case 'invoice_line_items':  

				break;

			case 'orders':  

				break;

			case 'order_line_items':  

				break;

			case 'payment_terms':  

				break;

			case 'products':  

				break;

			case 'purchase_orders':  

				break;

			case 'purchase_order_line_items':  

				break; 
	}
	
	echo '<br/><br/>';
	echo 'Result: '.print_r($result, true).'<br/><br/>';
}



   
   
//echo 'test: '.print_r($fm->listLayouts(), true);


?>
