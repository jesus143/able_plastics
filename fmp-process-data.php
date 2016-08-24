<?php
error_reporting(0);

define('filter_limit', 200);

/**
 * Script Name: Generate Trade Geko Data to FMP DB
 * Author: Michael Barbecho, Adrian and Tim Foster
 * Company: Automation Lab
 * Version: 1.0
 * Email: michael@automationlab.com.au
 * Website: https://www.automationlab.com.au
 */

// Require file needed
require ('trade-gecko-api.php');
require('FileMaker/FileMaker.php');
require('fmp-process-data-db.php');

// Instantiate
$tg                = new Trade_Gecko_API();
$fm                = new FileMaker();
$fMP_DB_Controller = new FMP_DB_Controller($fm);
$fm->FileMaker($database = 'aptg', $hostspec = 'n432.fmphost.com', $username = 'Admin', $password = 'Ernie123!');

// Add layout in array
$layoutList = array(
    'accounts',
    'addresses',
    'purchase_order_line_items',
    'purchase_orders',
    'products',
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

// Start processing data this will execute insert and update of each layout rows
foreach ($layoutList as $key => $layout) {
    echo "<h1>Layout: $layout </h1>";
    $response   = $tg->fetch($layout);

    echo "<br> <h3> total " . $layout . ' = ' . count($response[$layout]) . ' </h3><br>';


    $fMP_DB_Controller->processData($response,$layout);
}


$to      = 'michael@automationlab.com.au';
$subject = 'fmp-process-data.php is running now via cronjobs';
$message = 'fmp-process-data.php is running now via cronjobs';
$headers = 'From: noreply@automationlab.com.au' . "\r\n" .
    'Reply-To: tim@automationlab.com.au' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
