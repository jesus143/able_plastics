<?php
	class Trade_Gecko_Db{

		function __construct(){
			try {
				// $this->db = new PDO('mysql:host=localhost;dbname=tradegecko_db;charset=utf8mb4', 'root', '');
				$this->db = new PDO('mysql:host=localhost;dbname=tpocom_tradegecko;charset=utf8mb4', 'tpocom_adrian', 'adrian123!');
			}
			catch(PDOException $e){
			    echo $e->getMessage();
			    var_dump($e->getMessage());
			}
		}

		function insert_accounts($response){
			// print_r($response);
			try{				
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO accounts(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	contact_email, 
																	contact_mobile,
																	contact_phone,
																	country,
																	default_order_price_list_id,
																	default_purchase_order_price_list_id,
																	default_sales_ledger_account_on,
																	default_tax_treatment,
																	industry,
																	logo_url,
																	name,
																	stock_level_warn,
																	tax_label,
																	tax_number,
																	tax_number_label,
																	time_zone,
																	website,
																	primary_location_id,
																	primary_billing_location_id,
																	default_currency_id,
																	default_payment_term_id,
																	billing_contact_id,
																	default_sales_order_tax_type_id,
																	default_purchase_order_tax_type_id,
																	default_tax_exempt_id,
																	default_tax_rate,
																	default_tax_type,
																	default_tax_type_id,
																	default_order_price_type_id,
																	default_purchase_order_price_type_id
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:contact_email, 
																		:contact_mobile,
																		:contact_phone,
																		:country,
																		:default_order_price_list_id,
																		:default_purchase_order_price_list_id,
																		:default_sales_ledger_account_on,
																		:default_tax_treatment,
																		:industry,
																		:logo_url,
																		:name,
																		:stock_level_warn,
																		:tax_label,
																		:tax_number,
																		:tax_number_label,
																		:time_zone,
																		:website,
																		:primary_location_id,
																		:primary_billing_location_id,
																		:default_currency_id,
																		:default_payment_term_id,
																		:billing_contact_id,
																		:default_sales_order_tax_type_id,
																		:default_purchase_order_tax_type_id,
																		:default_tax_exempt_id,
																		:default_tax_rate,
																		:default_tax_type,
																		:default_tax_type_id,
																		:default_order_price_type_id,
																		:default_purchase_order_price_type_id
																		)");
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':contact_email', $contact_email);
				$stmt->bindParam(':contact_mobile', $contact_mobile);
				$stmt->bindParam(':contact_phone', $contact_phone);
				$stmt->bindParam(':country', $country);
				$stmt->bindParam(':default_order_price_list_id', $default_order_price_list_id);
				$stmt->bindParam(':default_purchase_order_price_list_id', $default_purchase_order_price_list_id);
				$stmt->bindParam(':default_sales_ledger_account_on', $default_sales_ledger_account_on);
				$stmt->bindParam(':default_tax_treatment', $default_tax_treatment);
				$stmt->bindParam(':industry', $industry);
				$stmt->bindParam(':logo_url', $logo_url);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':stock_level_warn', $stock_level_warn);
				$stmt->bindParam(':tax_label', $tax_label);
				$stmt->bindParam(':tax_number', $tax_number);
				$stmt->bindParam(':tax_number_label', $tax_number_label);
				$stmt->bindParam(':time_zone', $time_zone);
				$stmt->bindParam(':website', $website);
				$stmt->bindParam(':primary_location_id', $primary_location_id);
				$stmt->bindParam(':primary_billing_location_id', $primary_billing_location_id);
				$stmt->bindParam(':default_currency_id', $default_currency_id);
				$stmt->bindParam(':default_payment_term_id', $default_payment_term_id);
				$stmt->bindParam(':billing_contact_id', $billing_contact_id);
				$stmt->bindParam(':default_sales_order_tax_type_id', $default_sales_order_tax_type_id);
				$stmt->bindParam(':default_purchase_order_tax_type_id', $default_purchase_order_tax_type_id);
				$stmt->bindParam(':default_tax_exempt_id', $default_tax_exempt_id);
				$stmt->bindParam(':default_tax_rate', $default_tax_rate);
				$stmt->bindParam(':default_tax_type', $default_tax_type);
				$stmt->bindParam(':default_tax_type_id', $default_tax_type_id);
				$stmt->bindParam(':default_order_price_type_id', $default_order_price_type_id);
				$stmt->bindParam(':default_purchase_order_price_type_id', $default_purchase_order_price_type_id);

				foreach ($response['accounts'] as $account) {
					$id 									= $account['id'];
					$retrieval_date 						= date('Y-m-d H:i:s');
					$created_at 							= $account['created_at'];
					$updated_at 							= $account['updated_at'];
					$contact_email 							= $account['contact_email'];
					$contact_mobile 						= $account['contact_mobile'];
					$contact_phone 							= $account['contact_phone'];
					$country 								= $account['country'];
					$default_order_price_list_id 			= $account['default_order_price_list_id'];
					$default_purchase_order_price_list_id 	= $account['default_purchase_order_price_list_id'];
					$default_sales_ledger_account_on 		= $account['default_sales_ledger_account_on'];
					$default_tax_treatment 					= $account['default_tax_treatment'];
					$industry 								= $account['industry'];
					$logo_url 								= $account['logo_url'];
					$name 									= $account['name'];
					$stock_level_warn 						= $account['stock_level_warn'];
					$tax_label 								= $account['tax_label'];
					$tax_number 							= $account['tax_number'];
					$tax_number_label 						= $account['tax_number_label'];
					$time_zone 								= $account['time_zone'];
					$website 								= $account['website'];
					$primary_location_id 					= $account['primary_location_id'];
					$primary_billing_location_id 			= $account['primary_billing_location_id'];
					$default_currency_id 					= $account['default_currency_id'];
					$default_payment_term_id 				= $account['default_payment_term_id'];
					$billing_contact_id 					= $account['billing_contact_id'];
					$default_sales_order_tax_type_id 		= $account['default_sales_order_tax_type_id'];
					$default_purchase_order_tax_type_id 	= $account['default_purchase_order_tax_type_id'];
					$default_tax_exempt_id 					= $account['default_tax_exempt_id'];
					$default_tax_rate 						= $account['default_tax_rate'];
					$default_tax_type 						= $account['default_tax_type'];
					$default_tax_type_id 					= $account['default_tax_type_id'];
					$default_order_price_type_id 			= $account['default_order_price_type_id'];
					$default_purchase_order_price_type_id 	= $account['default_purchase_order_price_type_id'];					

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Accounts successfully inserted.');
			}catch(PDOException $ex){
				var_dump($ex->getMessage());
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}
		} // END function insert_account($response){

		function insert_addresses($response){
			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO addresses(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	company_id,
																	address1,
																	address2,
																	city,
																	company_name,
																	country,
																	email,
																	first_name,
																	last_name,
																	label,
																	phone_number,
																	state,
																	status,
																	suburb,
																	zip_code
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:company_id, 
																		:address1,
																		:address2,
																		:city,
																		:company_name,
																		:country,
																		:email,
																		:first_name,
																		:last_name,
																		:label,
																		:phone_number,
																		:state,
																		:status,
																		:suburb,
																		:zip_code																	
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':company_id', $company_id);
				$stmt->bindParam(':address1', $address1);
				$stmt->bindParam(':address2', $address2);
				$stmt->bindParam(':city', $city);
				$stmt->bindParam(':company_name', $company_name);
				$stmt->bindParam(':country', $country);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':first_name', $first_name);
				$stmt->bindParam(':last_name', $last_name);
				$stmt->bindParam(':label', $label);
				$stmt->bindParam(':phone_number', $phone_number);
				$stmt->bindParam(':state', $state);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':suburb', $suburb);
				$stmt->bindParam(':zip_code', $zip_code);

				foreach ($response['addresses'] as $address) {
					$id 			= $address['id'];
					$retrieval_date = date('Y-m-d H:i:s');
					$created_at 	= $address['created_at'];
					$updated_at 	= $address['updated_at'];
					$company_id 	= $address['company_id'];
					$address1 		= $address['address1'];
					$address2 		= $address['address2'];
					$city 			= $address['city'];
					$company_name 	= $address['company_name'];
					$country 		= $address['country'];
					$email 			= $address['email'];
					$first_name 	= $address['first_name'];
					$last_name 		= $address['last_name'];
					$label 			= $address['label'];
					$phone_number 	= $address['phone_number'];
					$state 			= $address['state'];
					$status 		= $address['status'];
					$suburb 		= $address['suburb'];
					$zip_code 		= $address['zip_code'];		

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Addresses successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}
		} // END function insert_addresses($response){

		function insert_companies($response){
			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO companies(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	assignee_id,
																	default_ledger_account_id,
																	default_payment_term_id,
																	default_payment_method_id,
																	default_stock_location_id,
																	default_tax_type_id,
																	company_code,
																	company_type,
																	default_discount_rate,
																	default_price_list_id,
																	default_tax_rate,
																	default_document_theme_id,
																	description,
																	email,
																	fax,
																	name,
																	phone_number,
																	status,
																	tax_number,
																	website,
																	default_price_type_id																	
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:assignee_id, 
																		:default_ledger_account_id,
																		:default_payment_term_id,
																		:default_payment_method_id,
																		:default_stock_location_id,
																		:default_tax_type_id,
																		:company_code,
																		:company_type,
																		:default_discount_rate,
																		:default_price_list_id,
																		:default_tax_rate,
																		:default_document_theme_id,
																		:description,
																		:email,
																		:fax,
																		:name,
																		:phone_number,
																		:status,
																		:tax_number,
																		:website,
																		:default_price_type_id																																		
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':assignee_id', $assignee_id);
				$stmt->bindParam(':default_ledger_account_id', $default_ledger_account_id);
				$stmt->bindParam(':default_payment_term_id', $default_payment_term_id);
				$stmt->bindParam(':default_payment_method_id', $default_payment_method_id);
				$stmt->bindParam(':default_stock_location_id', $default_stock_location_id);
				$stmt->bindParam(':default_tax_type_id', $default_tax_type_id);
				$stmt->bindParam(':company_code', $company_code);
				$stmt->bindParam(':company_type', $company_type);
				$stmt->bindParam(':default_discount_rate', $default_discount_rate);
				$stmt->bindParam(':default_price_list_id', $default_price_list_id);
				$stmt->bindParam(':default_tax_rate', $default_tax_rate);
				$stmt->bindParam(':default_document_theme_id', $default_document_theme_id);
				$stmt->bindParam(':description', $description);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':fax', $fax);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':phone_number', $phone_number);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':tax_number', $tax_number);
				$stmt->bindParam(':website', $website);				
				$stmt->bindParam(':default_price_type_id', $default_price_type_id);	

				foreach ($response['companies'] as $company) {
					$id 						= $company['id'];
					$retrieval_date 			= date('Y-m-d H:i:s');
					$created_at 				= $company['created_at'];
					$updated_at 				= $company['updated_at'];
					$assignee_id 				= $company['assignee_id'];
					$default_ledger_account_id 	= $company['default_ledger_account_id'];
					$default_payment_term_id 	= $company['default_payment_term_id'];
					$default_payment_method_id 	= $company['default_payment_method_id'];
					$default_stock_location_id 	= $company['default_stock_location_id'];
					$default_tax_type_id 		= $company['default_tax_type_id'];
					$company_code 				= $company['company_code'];
					$company_type 				= $company['company_type'];
					$default_discount_rate 		= $company['default_discount_rate'];
					$default_price_list_id 		= $company['default_price_list_id'];
					$default_tax_rate 			= $company['default_tax_rate'];
					$default_document_theme_id 	= $company['default_document_theme_id'];
					$description 				= $company['description'];
					$email 						= $company['email'];
					$fax 						= $company['fax'];		
					$name 						= $company['name'];
					$phone_number 				= $company['phone_number'];
					$status 					= $company['status'];
					$tax_number 				= $company['tax_number'];
					$website 					= $company['website'];						
					$default_price_type_id 		= $company['default_price_type_id'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Companies successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_companies($response){

		function insert_contacts($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO contacts(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	company_id,
																	email,
																	fax,
																	first_name,
																	last_name,
																	location,
																	mobile,
																	notes,
																	phone_number,
																	position,
																	status,
																	iguana_admin,
																	online_ordering,
																	invitation_accepted_at,
																	phone
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:company_id, 
																		:email,
																		:fax,
																		:first_name,
																		:last_name,
																		:location,
																		:mobile,
																		:notes,
																		:phone_number,
																		:position,
																		:status,
																		:iguana_admin,
																		:online_ordering,
																		:invitation_accepted_at,
																		:phone
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':company_id', $company_id);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':fax', $fax);
				$stmt->bindParam(':first_name', $first_name);
				$stmt->bindParam(':last_name', $last_name);
				$stmt->bindParam(':location', $location);
				$stmt->bindParam(':mobile', $mobile);
				$stmt->bindParam(':notes', $notes);
				$stmt->bindParam(':phone_number', $phone_number);
				$stmt->bindParam(':position', $position);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':iguana_admin', $iguana_admin);
				$stmt->bindParam(':online_ordering', $online_ordering);
				$stmt->bindParam(':invitation_accepted_at', $invitation_accepted_at);
				$stmt->bindParam(':phone', $phone);

				foreach ($response['contacts'] as $contact) {				

					$id 					= $contact['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $contact['created_at'];
					$updated_at 			= $contact['updated_at'];
					$company_id 			= $contact['company_id'];
					$email 					= $contact['email'];
					$fax 					= $contact['fax'];
					$first_name 			= $contact['first_name'];
					$last_name 				= $contact['last_name'];
					$location 				= $contact['location'];
					$mobile 				= $contact['mobile'];
					$notes 					= $contact['notes'];
					$phone_number 			= $contact['phone_number'];
					$position 				= $contact['position'];
					$status 				= $contact['status'];
					$iguana_admin 			= $contact['iguana_admin'];
					$online_ordering 		= $contact['online_ordering'];
					$invitation_accepted_at = $contact['invitation_accepted_at'];
					$phone 					= $contact['phone'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Contacts successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_contacs($response){

		function insert_fulfillments($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO fulfillments(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	order_id,
																	shipping_address_id,
																	billing_address_id,
																	stock_location_id,
																	delivery_type,
																	exchange_rate,
																	notes,
																	packed_at,
																	received_at,
																	service,
																	shipped_at,
																	status,
																	tracking_company,
																	tracking_number,
																	tracking_url,
																	order_number,
																	company_id
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:order_id, 
																		:shipping_address_id,
																		:billing_address_id,
																		:stock_location_id,
																		:delivery_type,
																		:exchange_rate,
																		:notes,
																		:packed_at,
																		:received_at,
																		:service,
																		:shipped_at,
																		:status,
																		:tracking_company,
																		:tracking_number,
																		:tracking_url,
																		:order_number,
																		:company_id
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':order_id', $order_id);
				$stmt->bindParam(':shipping_address_id', $shipping_address_id);
				$stmt->bindParam(':billing_address_id', $billing_address_id);
				$stmt->bindParam(':stock_location_id', $stock_location_id);
				$stmt->bindParam(':delivery_type', $delivery_type);
				$stmt->bindParam(':exchange_rate', $exchange_rate);
				$stmt->bindParam(':notes', $notes);
				$stmt->bindParam(':packed_at', $packed_at);
				$stmt->bindParam(':received_at', $received_at);
				$stmt->bindParam(':service', $service);
				$stmt->bindParam(':shipped_at', $shipped_at);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':tracking_company', $tracking_company);
				$stmt->bindParam(':tracking_number', $tracking_number);
				$stmt->bindParam(':tracking_url', $tracking_url);
				$stmt->bindParam(':order_number', $order_number);
				$stmt->bindParam(':company_id', $company_id);

				foreach ($response['fulfillments'] as $fulfillment) {				

					$id 					= $fulfillment['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $fulfillment['created_at'];
					$updated_at 			= $fulfillment['updated_at'];
					$order_id 				= $fulfillment['order_id'];
					$shipping_address_id 	= $fulfillment['shipping_address_id'];
					$billing_address_id 	= $fulfillment['billing_address_id'];
					$stock_location_id 		= $fulfillment['stock_location_id'];
					$delivery_type 			= $fulfillment['delivery_type'];
					$exchange_rate 			= $fulfillment['exchange_rate'];
					$notes 					= $fulfillment['notes'];
					$packed_at 				= $fulfillment['packed_at'];
					$received_at 			= $fulfillment['received_at'];
					$service 				= $fulfillment['service'];
					$shipped_at 			= $fulfillment['shipped_at'];
					$status 				= $fulfillment['status'];
					$tracking_company 		= $fulfillment['tracking_company'];
					$tracking_number 		= $fulfillment['tracking_number'];
					$tracking_url 			= $fulfillment['tracking_url'];
					$order_number 			= $fulfillment['order_number'];
					$company_id 			= $fulfillment['company_id'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Fulfillments successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_fulfillments($response){

		function insert_fulfillment_line_items($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO fulfillment_line_items(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	fulfillment_id,
																	order_line_item_id,
																	base_price,
																	position,
																	quantity
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:fulfillment_id, 
																		:order_line_item_id,
																		:base_price,
																		:position,
																		:quantity
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':fulfillment_id', $fulfillment_id);
				$stmt->bindParam(':order_line_item_id', $order_line_item_id);
				$stmt->bindParam(':base_price', $base_price);
				$stmt->bindParam(':position', $position);
				$stmt->bindParam(':quantity', $quantity);

				foreach ($response['fulfillment_line_items'] as $fulfillment_line_item) {				

					$id 					= $fulfillment_line_item['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $fulfillment_line_item['created_at'];
					$updated_at 			= $fulfillment_line_item['updated_at'];
					$fulfillment_id 		= $fulfillment_line_item['fulfillment_id'];
					$order_line_item_id 	= $fulfillment_line_item['order_line_item_id'];
					$base_price 			= $fulfillment_line_item['base_price'];
					$position 				= $fulfillment_line_item['position'];
					$quantity 				= $fulfillment_line_item['quantity'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Fulfillment Line Items successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_fulfillments($response){

		function insert_images($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO images(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	variant_id,
																	uploader_id,
																	name,
																	position,
																	base_path,
																	file_name,
																	image_processing
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:variant_id, 
																		:uploader_id,
																		:name,
																		:position,
																		:base_path,
																		:file_name,
																		:image_processing
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':variant_id', $variant_id);
				$stmt->bindParam(':uploader_id', $uploader_id);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':position', $position);
				$stmt->bindParam(':base_path', $base_path);
				$stmt->bindParam(':file_name', $file_name);
				$stmt->bindParam(':image_processing', $image_processing);

				foreach ($response['images'] as $image) {				

					// print_r($image);echo '<br>';

					$id 				= $image['id'];
					$retrieval_date 	= date('Y-m-d H:i:s');
					$created_at 		= $image['created_at'];
					$updated_at 		= $image['updated_at'];
					$variant_id 		= $image['variant_id'];
					$uploader_id 		= $image['uploader_id'];
					$name 				= $image['name'];
					$position 			= $image['position'];
					$base_path 			= $image['base_path'];
					$file_name 			= $image['file_name'];
					$image_processing 	= $image['image_processing'];

					// print_r($stmt);

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Images successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_images($response){			

		function insert_locations($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO locations(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	address1,
																	address2,
																	city,
																	country,
																	holds_stock,
																	label,
																	state,
																	status,
																	suburb,
																	zip_code
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:address1, 
																		:address2,
																		:city,
																		:country,
																		:holds_stock,
																		:label,
																		:state,
																		:status,
																		:suburb,
																		:zip_code
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':address1', $address1);
				$stmt->bindParam(':address2', $address2);
				$stmt->bindParam(':city', $city);
				$stmt->bindParam(':country', $country);
				$stmt->bindParam(':holds_stock', $holds_stock);
				$stmt->bindParam(':label', $label);
				$stmt->bindParam(':state', $state);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':suburb', $suburb);
				$stmt->bindParam(':zip_code', $zip_code);				

				foreach ($response['locations'] as $location) {				

					$id 			= $location['id'];
					$retrieval_date = date('Y-m-d H:i:s');
					$created_at 	= $location['created_at'];
					$updated_at 	= $location['updated_at'];
					$address1 		= $location['address1'];
					$address2 		= $location['address2'];
					$city 			= $location['city'];
					$country 		= $location['country'];
					$holds_stock 	= $location['holds_stock'];
					$label 			= $location['label'];
					$state 			= $location['state'];
					$status 		= $location['status'];
					$suburb 		= $location['suburb'];
					$zip_code 		= $location['zip_code'];					

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Locations successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_locations($response){	

		function insert_invoices($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO invoices(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	document_url,
																	order_id,
																	shipping_address_id,
																	billing_address_id,
																	payment_term_id,
																	due_at,
																	exchange_rate,
																	invoice_number,
																	invoiced_at,
																	notes,
																	total,
																	payment_status,
																	order_number,
																	company_id,
																	currency_id,
																	status
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:document_url, 
																		:order_id,
																		:shipping_address_id,
																		:billing_address_id,
																		:payment_term_id,
																		:due_at,
																		:exchange_rate,
																		:invoice_number,
																		:invoiced_at,
																		:notes,
																		:total,
																		:payment_status,
																		:order_number,
																		:company_id,
																		:currency_id,
																		:status																		
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':document_url', $document_url);
				$stmt->bindParam(':order_id', $order_id);
				$stmt->bindParam(':shipping_address_id', $shipping_address_id);
				$stmt->bindParam(':billing_address_id', $billing_address_id);
				$stmt->bindParam(':payment_term_id', $payment_term_id);
				$stmt->bindParam(':due_at', $due_at);
				$stmt->bindParam(':exchange_rate', $exchange_rate);
				$stmt->bindParam(':invoice_number', $invoice_number);
				$stmt->bindParam(':invoiced_at', $invoiced_at);
				$stmt->bindParam(':notes', $notes);				
				$stmt->bindParam(':total', $total);
				$stmt->bindParam(':payment_status', $payment_status);
				$stmt->bindParam(':order_number', $order_number);
				$stmt->bindParam(':company_id', $company_id);
				$stmt->bindParam(':currency_id', $currency_id);
				$stmt->bindParam(':status', $status);

				foreach ($response['invoices'] as $invoice) {				

					$id 					= $invoice['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $invoice['created_at'];
					$updated_at 			= $invoice['updated_at'];
					$document_url 			= $invoice['document_url'];
					$order_id 				= $invoice['order_id'];
					$shipping_address_id 	= $invoice['shipping_address_id'];
					$billing_address_id 	= $invoice['billing_address_id'];
					$payment_term_id 		= $invoice['payment_term_id'];
					$due_at 				= $invoice['due_at'];
					$exchange_rate 			= $invoice['exchange_rate'];
					$invoice_number 		= $invoice['invoice_number'];
					$invoiced_at 			= $invoice['invoiced_at'];
					$notes 					= $invoice['notes'];					
					$total 					= $invoice['total'];
					$payment_status 		= $invoice['payment_status'];
					$order_number 			= $invoice['order_number'];
					$company_id 			= $invoice['company_id'];
					$currency_id 			= $invoice['currency_id'];
					$status 				= $invoice['status'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Invoices successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_invoices($response){								

		function insert_invoice_line_items($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO invoice_line_items(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	invoice_id,
																	order_line_item_id,
																	ledger_account_id,
																	position,
																	quantity
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:invoice_id, 
																		:order_line_item_id,
																		:ledger_account_id,
																		:position,
																		:quantity																	
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':invoice_id', $invoice_id);
				$stmt->bindParam(':order_line_item_id', $order_line_item_id);
				$stmt->bindParam(':ledger_account_id', $ledger_account_id);
				$stmt->bindParam(':position', $position);
				$stmt->bindParam(':quantity', $quantity);

				foreach ($response['invoice_line_items'] as $invoice_line_item) {				

					$id 					= $invoice_line_item['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $invoice_line_item['created_at'];
					$updated_at 			= $invoice_line_item['updated_at'];
					$invoice_id 			= $invoice_line_item['invoice_id'];
					$order_line_item_id 	= $invoice_line_item['order_line_item_id'];
					$ledger_account_id 		= $invoice_line_item['ledger_account_id'];
					$position 				= $invoice_line_item['position'];
					$quantity 				= $invoice_line_item['quantity'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Invoice Line Items successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_invoice_line_items($response){		

		function insert_orders($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO orders(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	document_url,
																	assignee_id,
																	billing_address_id,
																	company_id,
																	contact_id,
																	currency_id,
																	shipping_address_id,
																	stock_location_id,
																	user_id,
																	default_price_list_id,
																	email,
																	fulfillment_status,
																	invoice_status,
																	issued_at,
																	notes,
																	order_number,
																	packed_status,
																	payment_status,
																	phone_number,
																	reference_number,
																	return_status,
																	returning_status,
																	ship_at,
																	source_url,
																	status,
																	tax_label,
																	tax_override,
																	tax_treatment,
																	total,
																	default_price_type_id,
																	source,
																	tax_type,
																	tracking_number,
																	url,
																	source_id
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:document_url, 
																		:assignee_id,
																		:billing_address_id,
																		:company_id,
																		:contact_id,
																		:currency_id,
																		:shipping_address_id,
																		:stock_location_id,
																		:user_id,
																		:default_price_list_id,
																		:email,
																		:fulfillment_status,
																		:invoice_status,
																		:issued_at,
																		:notes,
																		:order_number,
																		:packed_status,
																		:payment_status,
																		:phone_number,
																		:reference_number,
																		:return_status,
																		:returning_status,
																		:ship_at,
																		:source_url,
																		:status,
																		:tax_label,
																		:tax_override,
																		:tax_treatment,
																		:total,
																		:default_price_type_id,
																		:source,
																		:tax_type,
																		:tracking_number,
																		:url,
																		:source_id																	
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':document_url', $document_url);
				$stmt->bindParam(':assignee_id', $assignee_id);
				$stmt->bindParam(':billing_address_id', $billing_address_id);
				$stmt->bindParam(':company_id', $company_id);
				$stmt->bindParam(':contact_id', $contact_id);
				$stmt->bindParam(':currency_id', $currency_id);
				$stmt->bindParam(':shipping_address_id', $shipping_address_id);
				$stmt->bindParam(':stock_location_id', $stock_location_id);
				$stmt->bindParam(':user_id', $user_id);
				$stmt->bindParam(':default_price_list_id', $default_price_list_id);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':fulfillment_status', $fulfillment_status);
				$stmt->bindParam(':invoice_status', $invoice_status);
				$stmt->bindParam(':issued_at', $issued_at);
				$stmt->bindParam(':notes', $notes);
				$stmt->bindParam(':order_number', $order_number);
				$stmt->bindParam(':packed_status', $packed_status);
				$stmt->bindParam(':payment_status', $payment_status);
				$stmt->bindParam(':phone_number', $phone_number);
				$stmt->bindParam(':reference_number', $reference_number);
				$stmt->bindParam(':return_status', $return_status);
				$stmt->bindParam(':returning_status', $returning_status);
				$stmt->bindParam(':ship_at', $ship_at);
				$stmt->bindParam(':source_url', $source_url);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':tax_label', $tax_label);
				$stmt->bindParam(':tax_override', $tax_override);
				$stmt->bindParam(':tax_treatment', $tax_treatment);
				$stmt->bindParam(':total', $total);
				$stmt->bindParam(':default_price_type_id', $default_price_type_id);
				$stmt->bindParam(':source', $source);
				$stmt->bindParam(':tax_type', $tax_type);
				$stmt->bindParam(':tracking_number', $tracking_number);
				$stmt->bindParam(':url', $url);
				$stmt->bindParam(':source_id', $source_id);

				foreach ($response['orders'] as $order) {				

					$id 					= $order['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $order['created_at'];
					$updated_at 			= $order['updated_at'];
					$document_url 			= $order['document_url'];
					$assignee_id 			= $order['assignee_id'];
					$billing_address_id 	= $order['billing_address_id'];
					$company_id 			= $order['company_id'];
					$contact_id 			= $order['contact_id'];
					$currency_id 			= $order['currency_id'];
					$shipping_address_id 	= $order['shipping_address_id'];
					$stock_location_id 		= $order['stock_location_id'];
					$user_id 				= $order['user_id'];
					$default_price_list_id 	= $order['default_price_list_id'];
					$email 					= $order['email'];
					$fulfillment_status 	= $order['fulfillment_status'];
					$invoice_status 		= $order['invoice_status'];
					$issued_at 				= $order['issued_at'];
					$notes 					= $order['notes'];
					$order_number 			= $order['order_number'];
					$packed_status 			= $order['packed_status'];
					$payment_status 		= $order['payment_status'];
					$phone_number 			= $order['phone_number'];
					$reference_number 		= $order['reference_number'];
					$return_status 			= $order['return_status'];
					$returning_status 		= $order['returning_status'];
					$ship_at 				= $order['ship_at'];
					$source_url 			= $order['source_url'];
					$status 				= $order['status'];
					$tax_label 				= $order['tax_label'];
					$tax_override 			= $order['tax_override'];
					$tax_treatment 			= $order['tax_treatment'];
					$total 					= $order['total'];
					$default_price_type_id 	= $order['default_price_type_id'];
					$source 				= $order['source'];
					$tax_type 				= $order['tax_type'];
					$tracking_number 		= $order['tracking_number'];
					$url 					= $order['url'];
					$source_id 				= $order['source_id'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Orders successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_orders($response){			

		function insert_order_line_items($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO order_line_items(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	order_id,
																	variant_id,
																	tax_type_id,
																	discount,
																	discount_amount,
																	freeform,
																	image_url,
																	label,
																	line_type,
																	position,
																	price,
																	quantity,
																	tax_rate_override,
																	tax_rate
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:order_id, 
																		:variant_id,
																		:tax_type_id,
																		:discount,
																		:discount_amount,
																		:freeform,
																		:image_url,
																		:label,
																		:line_type,
																		:position,
																		:price,
																		:quantity,
																		:tax_rate_override,
																		:tax_rate																
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':order_id', $order_id);
				$stmt->bindParam(':variant_id', $variant_id);
				$stmt->bindParam(':tax_type_id', $tax_type_id);
				$stmt->bindParam(':discount', $discount);
				$stmt->bindParam(':discount_amount', $discount_amount);
				$stmt->bindParam(':freeform', $freeform);
				$stmt->bindParam(':image_url', $image_url);
				$stmt->bindParam(':label', $label);
				$stmt->bindParam(':line_type', $line_type);
				$stmt->bindParam(':position', $position);				
				$stmt->bindParam(':price', $price);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':tax_rate_override', $tax_rate_override);
				$stmt->bindParam(':tax_rate', $tax_rate);

				foreach ($response['order_line_items'] as $order_line_item) {				

					$id 				= $order_line_item['id'];
					$retrieval_date 	= date('Y-m-d H:i:s');
					$created_at 		= $order_line_item['created_at'];
					$updated_at 		= $order_line_item['updated_at'];
					$order_id 			= $order_line_item['order_id'];
					$variant_id 		= $order_line_item['variant_id'];
					$tax_type_id 		= $order_line_item['tax_type_id'];
					$discount 			= $order_line_item['discount'];
					$discount_amount 	= $order_line_item['discount_amount'];
					$freeform 			= $order_line_item['freeform'];
					$image_url 			= $order_line_item['image_url'];
					$label 				= $order_line_item['label'];
					$line_type 			= $order_line_item['line_type'];
					$position 			= $order_line_item['position'];					
					$price 				= $order_line_item['price'];
					$quantity 			= $order_line_item['quantity'];
					$tax_rate_override 	= $order_line_item['tax_rate_override'];
					$tax_rate 		   	= $order_line_item['tax_rate'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Order Line Items successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_order_line_items($response){

		function insert_payment_terms($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO payment_terms(
																	id, 
																	retrieval_date,
																	name,
																	due_in_days,
																	status,
																	payment_from
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:name, 
																		:due_in_days,
																		:status,
																		:payment_from																
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':due_in_days', $due_in_days);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':payment_from', $from);

				foreach ($response['payment_terms'] as $payment_term) {				

					$id 			= $payment_term['id'];
					$retrieval_date = date('Y-m-d H:i:s');
					$name 			= $payment_term['name'];
					$due_in_days 	= $payment_term['due_in_days'];
					$status 		= $payment_term['status'];
					$from 			= $payment_term['from'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Payment Terms successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_payment_terms($response){	

		function insert_products($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO products(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	brand,
																	description,
																	image_url,
																	name,
																	opt1,
																	opt2,
																	opt3,
																	product_type,
																	quantity,
																	status,
																	supplier,
																	tags,
																	vendor
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:brand, 
																		:description,
																		:image_url,
																		:name,
																		:opt1,
																		:opt2,
																		:opt3,
																		:product_type,
																		:quantity,
																		:status,
																		:supplier,
																		:tags,
																		:vendor														
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':brand', $brand);
				$stmt->bindParam(':description', $description);
				$stmt->bindParam(':image_url', $image_url);
				$stmt->bindParam(':name', $name);
				$stmt->bindParam(':opt1', $opt1);
				$stmt->bindParam(':opt2', $opt2);
				$stmt->bindParam(':opt3', $opt3);
				$stmt->bindParam(':product_type', $product_type);
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':status', $status);				
				$stmt->bindParam(':supplier', $supplier);
				$stmt->bindParam(':tags', $tags);
				$stmt->bindParam(':vendor', $vendor);

				foreach ($response['products'] as $product) {				

					$id 			= $product['id'];
					$retrieval_date = date('Y-m-d H:i:s');
					$created_at 	= $product['created_at'];
					$updated_at 	= $product['updated_at'];
					$brand 			= $product['brand'];
					$description 	= $product['description'];
					$image_url 		= $product['image_url'];
					$name 			= $product['name'];
					$opt1 			= $product['opt1'];
					$opt2 			= $product['opt2'];
					$opt3 			= $product['opt3'];
					$product_type 	= $product['product_type'];
					$quantity 		= $product['quantity'];
					$status 		= $product['status'];					
					$supplier 		= $product['supplier'];
					$tags 			= $product['tags'];
					$vendor 		= $product['vendor'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Products successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_products($response){

		function insert_purchase_orders($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO purchase_orders(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	document_url,
																	billing_address_id,
																	company_id,
																	currency_id,
																	stock_location_id,
																	supplier_address_id,
																	default_price_list_id,
																	due_at,
																	email,
																	notes,
																	order_number,
																	procurement_status,
																	reference_number,
																	status,
																	tax_treatment,
																	received_at,
																	total,
																	cached_quantity,
																	default_price_type_id,
																	tax_type
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:document_url, 
																		:billing_address_id,
																		:company_id,
																		:currency_id,
																		:stock_location_id,
																		:supplier_address_id,
																		:default_price_list_id,
																		:due_at,
																		:email,
																		:notes,
																		:order_number,
																		:procurement_status,
																		:reference_number,
																		:status,
																		:tax_treatment,
																		:received_at,
																		:total,
																		:cached_quantity,
																		:default_price_type_id,
																		:tax_type														
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':document_url', $document_url);
				$stmt->bindParam(':billing_address_id', $billing_address_id);
				$stmt->bindParam(':company_id', $company_id);
				$stmt->bindParam(':currency_id', $currency_id);
				$stmt->bindParam(':stock_location_id', $stock_location_id);
				$stmt->bindParam(':supplier_address_id', $supplier_address_id);
				$stmt->bindParam(':default_price_list_id', $default_price_list_id);
				$stmt->bindParam(':due_at', $due_at);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':notes', $notes);				
				$stmt->bindParam(':order_number', $order_number);
				$stmt->bindParam(':procurement_status', $procurement_status);
				$stmt->bindParam(':reference_number', $reference_number);
				$stmt->bindParam(':status', $status);
				$stmt->bindParam(':tax_treatment', $tax_treatment);
				$stmt->bindParam(':received_at', $received_at);
				$stmt->bindParam(':total', $total);
				$stmt->bindParam(':cached_quantity', $cached_quantity);
				$stmt->bindParam(':default_price_type_id', $default_price_type_id);
				$stmt->bindParam(':tax_type', $tax_type);

				foreach ($response['purchase_orders'] as $purchase_order) {				

					$id 					= $purchase_order['id'];
					$retrieval_date 		= date('Y-m-d H:i:s');
					$created_at 			= $purchase_order['created_at'];
					$updated_at 			= $purchase_order['updated_at'];
					$document_url 			= $purchase_order['document_url'];
					$billing_address_id 	= $purchase_order['billing_address_id'];
					$company_id 			= $purchase_order['company_id'];
					$currency_id 			= $purchase_order['currency_id'];
					$stock_location_id 		= $purchase_order['stock_location_id'];
					$supplier_address_id 	= $purchase_order['supplier_address_id'];
					$default_price_list_id 	= $purchase_order['default_price_list_id'];
					$due_at 				= $purchase_order['due_at'];
					$email 					= $purchase_order['email'];
					$notes 					= $purchase_order['notes'];					
					$order_number 			= $purchase_order['order_number'];
					$procurement_status 	= $purchase_order['procurement_status'];
					$reference_number 		= $purchase_order['reference_number'];
					$status 		   		= $purchase_order['status'];
					$tax_treatment 		   	= $purchase_order['tax_treatment'];
					$received_at 		   	= $purchase_order['received_at'];
					$total 		   			= $purchase_order['total'];
					$cached_quantity 		= $purchase_order['cached_quantity'];
					$default_price_type_id 	= $purchase_order['default_price_type_id'];
					$tax_type 		   		= $purchase_order['tax_type'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Purchase Orders successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_purchase_orders($response){	

		function insert_purchase_order_line_items($response){

			try{
				$this->db->beginTransaction();
				$stmt = $this->db->prepare("INSERT INTO purchase_order_line_items(
																	id, 
																	retrieval_date,
																	created_at, 
																	updated_at, 
																	procurement_id,
																	purchase_order_id,
																	tax_type_id,
																	variant_id,
																	base_price,
																	freeform,
																	image_url,
																	label,
																	position,
																	price,
																	quantity,
																	tax_rate_override,
																	extra_cost_value,
																	tax_rate
																	) 
																	VALUES(
																		:id,
																		:retrieval_date,
																		:created_at, 
																		:updated_at, 
																		:procurement_id, 
																		:purchase_order_id,
																		:tax_type_id,
																		:variant_id,
																		:base_price,
																		:freeform,
																		:image_url,
																		:label,
																		:position,
																		:price,
																		:quantity,
																		:tax_rate_override,
																		:extra_cost_value,
																		:tax_rate													
																		)");

				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':retrieval_date', $retrieval_date);
				$stmt->bindParam(':created_at', $created_at);
				$stmt->bindParam(':updated_at', $updated_at);
				$stmt->bindParam(':procurement_id', $procurement_id);
				$stmt->bindParam(':purchase_order_id', $purchase_order_id);
				$stmt->bindParam(':tax_type_id', $tax_type_id);
				$stmt->bindParam(':variant_id', $variant_id);
				$stmt->bindParam(':base_price', $base_price);
				$stmt->bindParam(':freeform', $freeform);
				$stmt->bindParam(':image_url', $image_url);
				$stmt->bindParam(':label', $label);
				$stmt->bindParam(':position', $position);
				$stmt->bindParam(':price', $price);				
				$stmt->bindParam(':quantity', $quantity);
				$stmt->bindParam(':tax_rate_override', $tax_rate_override);
				$stmt->bindParam(':extra_cost_value', $extra_cost_value);
				$stmt->bindParam(':tax_rate', $tax_rate);

				foreach ($response['purchase_order_line_items'] as $purchase_order_line_item) {				

					$id 				= $purchase_order_line_item['id'];
					$retrieval_date 	= date('Y-m-d H:i:s');
					$created_at 		= $purchase_order_line_item['created_at'];
					$updated_at 		= $purchase_order_line_item['updated_at'];
					$procurement_id 	= $purchase_order_line_item['procurement_id'];
					$purchase_order_id 	= $purchase_order_line_item['purchase_order_id'];
					$tax_type_id 		= $purchase_order_line_item['tax_type_id'];
					$variant_id 		= $purchase_order_line_item['variant_id'];
					$base_price 		= $purchase_order_line_item['base_price'];
					$freeform 			= $purchase_order_line_item['freeform'];
					$image_url 			= $purchase_order_line_item['image_url'];
					$label 				= $purchase_order_line_item['label'];
					$position 			= $purchase_order_line_item['position'];
					$price 				= $purchase_order_line_item['price'];					
					$quantity 			= $purchase_order_line_item['quantity'];
					$tax_rate_override 	= $purchase_order_line_item['tax_rate_override'];
					$extra_cost_value 	= $purchase_order_line_item['extra_cost_value'];
					$tax_rate 		   	= $purchase_order_line_item['tax_rate'];

					$stmt->execute();
				}				

				$this->db->commit();
				return array('status' 	=> 'success', 
							 'message' 	=> 'Purchase Order Line Items successfully inserted.');
			}catch(PDOException $ex){
				$this->db->rollBack();
				return array('status' 	=> 'failed', 
							 'message' 	=> $ex->getMessage());
			}			
		} // END function insert_purchase_order_line_item($response){				

	}

?>