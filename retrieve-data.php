<?php
	require 'trade-gecko-api.php';
	$tg = new Trade_Gecko_API();	

	require 'trade-gecko-db.php';
	$db = new Trade_Gecko_Db();		

	$objects = array('accounts',
					 'addresses',
					 'companies',
					 'contacts',
					 'fulfillments',
					 'fulfillment_line_items',
					 'images',
					 'locations',
					 'invoices',
					 'invoice_line_items',
					 'orders',
					 'order_line_items',
					 'payment_terms',
					 'products',
					 'purchase_orders',
					 'purchase_order_line_items');

	for($index=0; $index<sizeof($objects); $index++){
		$object 	= $objects[$index];
		$response 	= $tg->fetch($object);

		switch($object){
			case 'accounts' 					: $respObj = $db->insert_accounts($response); break;
			case 'addresses' 					: $respObj = $db->insert_addresses($response); break;
			case 'companies' 					: $respObj = $db->insert_companies($response); break;
			case 'contacts' 					: $respObj = $db->insert_contacts($response); break;
			case 'fulfillments'					: $respObj = $db->insert_fulfillments($response); break;
			case 'fulfillment_line_items' 		: $respObj = $db->insert_fulfillment_line_items($response); break;
			case 'images' 						: $respObj = $db->insert_images($response); break;
			case 'locations' 					: $respObj = $db->insert_locations($response); break;
			case 'invoices' 					: $respObj = $db->insert_invoices($response); break;
			case 'invoice_line_items' 			: $respObj = $db->insert_invoice_line_items($response); break;
			case 'orders' 						: $respObj = $db->insert_orders($response); break;
			case 'order_line_items' 			: $respObj = $db->insert_order_line_items($response); break;
			case 'payment_terms' 				: $respObj = $db->insert_payment_terms($response); break;
			case 'products' 					: $respObj = $db->insert_products($response); break;
			case 'purchase_orders' 				: $respObj = $db->insert_purchase_orders($response); break;
			case 'purchase_order_line_items' 	: $respObj = $db->insert_purchase_order_line_items($response); break;
		}		

		echo $respObj['message'].'<br>';
	}
?>