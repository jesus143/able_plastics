<?php  

Class FMP_DB_Controller {

	private $fm;
	private $data = array();
	private $rec;
	private $fieldNameId = 'id';

	/**
	 * FMP_DB_Controller constructor.
	 * @param $fm
	 */
	function __construct($fm) {
		$this->fm = $fm;
	}

	/**
	 * @param $layoutValue
	 * @return bool
	 *  get field id values
	 */
	private function getFieldIdValue($layoutValue) {
		return ($layoutValue[$this->fieldNameId] != null) ? $layoutValue[$this->fieldNameId] : false;
	}

	/**
	 * @param $response
	 * @param string $layout
	 * @param bool|false $saveLimit
	 * This will be the hear of this functions
	 * here everything was processed
	 */
	public function processData($response, $layout='accounts', $saveLimit=false) {

		$counter = 1;

		$data = array();

		$layoutFields = array();

		$tradeGekoValues = array();

		$fieldNameId = 'id';

		$serverDateTime = $this->updateTimeStampFormat(date('Y-m-d H:i:s'), true);;

		$layoutFields = $this->getTableFields($layout);

		$tradeGekoValues = $response[$layout];

		try{

			foreach($tradeGekoValues as $key1 => $layoutValue):

				echo "<br>data tg data <br>";
				print_r($tradeGekoValues[$counter]);

				//compose data
				foreach ($layoutFields as $key2 => $layoutField):

					$layoutField = str_replace(' ', '', $layoutField);

					if ($this->isDateTime($layoutValue[$layoutField]) == true) {
						$data[$layoutField] = $this->updateTimeStampFormat($layoutValue[$layoutField]);
					} else if ($this->isDate($layoutValue[$layoutField]) == true) {
						$data[$layoutField] = $this->updateDateFormat($layoutValue[$layoutField]);
					} else if ($layoutField == 'retrieval_date') {
						// echo "<br>fields " . $layoutField . '  =  '  . $serverDateTime ;
						$data[$layoutField] = $serverDateTime;
					} else if (is_array($layoutValue[$layoutField])) {
						$data[$layoutField] = $layoutValue[$layoutField][0];
					} else {
						$data[$layoutField] = $layoutValue[$layoutField];
					}
				endforeach;

				echo "<br> retieved data <br>";

				print_r($data);

//				echo "id" . $this->getFieldIdValue($layoutValue) . '<br>';
//				exit;
				// validate if exist or not
				if($result = $this->isExist($this->getFieldIdValue($layoutValue), $layout)) {
					echo "<br>exist update";
					// update
					$this->updateData($result, $data);
				} else {
					echo "<br> not exist insert";
					// insert
					$this->insertData($layout, $data);
				}


				if($saveLimit != false) {
					if ($counter >= $saveLimit) {
						break;
					} else {
						$counter++;
					}
				}


			endforeach;



		}catch(PDOException $ex){

			echo "<br> try catch error";
			/**
			 * Dump error
			 * Execute roll back of the database
			 */
		}
	}

	/**
	 * @param $layout
	 * @param array $data
	 * @return bool
	 * execute insert data from tg to fmp db
	 */
	protected function insertData($layout, $data=array()) {
		echo "<br> filtered data to be saved to fmp db <br>";
		print_r($data);

		//Prepare insert to FMP Database
		$rec = $this->fm->createRecord($layout,$data);

		//insert to FMP Database
		$result = $rec->commit();


		if (FileMaker::isError($result)) {

			echo ' Error: (' . $result->getCode() . ') ' . $result->getMessage() . "";

			return false;

		}else{
			echo   "<br>updated";

			return true;
		}
	}


	/**
	 * @param $result
	 * @param array $data
	 * @return bool
	 * This will update the existing data fomr fmp db
	 */
	protected function updateData($result, $data=array()) {

		$attendees = $result->getRecords();

		$attendee = $attendees[0];

//		print_r($attendee);

		foreach($data as $fieldName => $fieldValue) {
			$attendee->setField($fieldName,  $fieldValue);
	 	}

		$update = $attendee->commit();

		if (FileMaker::isError($update)) {

			echo ' Error: (' . $update->getCode() . ') ' . $update->getMessage() . "";

			return false;

		}else{
			echo   "<br>updated";

			return true;
		}
	}

	/**
	 * @param $id
	 * @param $layout is an object
	 * @return bool
	 */
	protected function isExist($id, $layout='accounts') {


		echo 'id = ' . $id  . 'layout - ' .  $layout . '<br>';


		$request = $this->fm->newFindCommand($layout);

		$request->addFindCriterion('id', $id); // 'id' is a random, alphanumeric field

		$result = $request->execute();

		if (FileMaker::isError($result)) {
//			echo ' Error: (' . $request->getCode() . ') ' . $request->getMessage() . "";
			echo "<br>data not exist";
			return false;

		} else {
			echo "<br> data exist";
			return $result;
		}

	}


	/**
	 * @param $response
	 * @param string $layout
	 * Issue value stock_level_warn is not saving to fmp db
	 * This is not in used and this will work only for accounts
	 */
	public function insertAccounts_v1($response, $layout='accounts') {
 
		$removeKey = array( 
			// 'id',
			'retrieval_date',
			// 'created_at',
			// 'updated_at',
			// 'contact_email',
			// 'contact_mobile',
			// 'contact_phone',
			// 'country',

			// 'default_order_price_list_id',
			// 'default_purchase_order_price_list_id',
			// 'default_sales_ledger_account_on',
			// 'default_tax_treatment',

			// 'industry',
			// 'logo_url',
			// 'name',
			// 'stock_level_warn',
			// 'tax_label',
			// 'tax_number',
			// 'tax_number_label',
			// 'time_zone',
			// 'website',
			// 'primary_location_id',
			// 'primary_billing_location_id',
			// 'default_currency_id',
			// 'default_payment_term_id',
			// 'billing_contact_id',
			// 'default_sales_order_tax_type_id',
			// 'default_purchase_order_tax_type_id',
			// 'default_tax_exempt_id',
			// 'default_tax_rate',
			// 'default_tax_type',
			// 'default_tax_type_id',
			// 'default_order_price_type_id',
			// 'default_purchase_order_price_type_id',
			'location_ids',
			'user_ids',
			'default_document_theme_id',
			'default_payment_method_id'
		 );


		try{
				// This data is from trade geko and it's being composed to become a group of array 
				// in order to be inserted in FMP Database  
				foreach ($response[$layout] as $key => $account) {
 
 					for ($i=0; $i <count($removeKey); $i++) {   
						unset($account[$removeKey[$i]]);
 					} 
 
 					$account['retrieval_date'] = '12/31/4000 11:59:59 PM';
 					$account['created_at']     = $this->updateTimeStampFormat($account['created_at']); 
 					$account['updated_at']     = $this->updateTimeStampFormat($account['updated_at']); 

					print_r($account); 

					//Prepare insert to FMP Database
					$rec = $this->fm->createRecord($layout,$account); 

					// insert to FMP Database 
					$result = $rec->commit();
 					
 					// print result if its successfully saved of not
					if($result) {
						echo "<br>successfully added to fmp database";
					} else {
						echo "<br>failed added to fmp database";
					} 
				}				
 
		}catch(PDOException $ex){  

			echo "<br> try catch error";
			/**
			* Dump error
			* Execute roll back of the database
			*/ 
		} 
	}

	/**
	 * @param string $layout
	 * @return array
	 * Get all fields in the table
	 */
	public function getTableFields($layout='accounts') {
		$layoutFields = array();
		$layObj       = $this->fm->getLayout($layout);
		$layObj       = $layObj->_impl;
		$fields       = $layObj->_fields;

		if(count($fields) > 0){
			foreach($fields as $field){
				$layoutFields[] = $field->_impl->_name;
			}
		}
		return $layoutFields;  
	}

 	/**
 	* 2015-12-03T11:18:39.066Z
	* TO
	* 12/31/4000 11:59:59.999999 PM  
 	* echo "<br> before date time =  $dateTime "; 
    * $dateTime = str_replace('-', '/', $dateTime);
	* $dateTime = str_replace('T', ' ', $dateTime); 
 	* echo "<br> after date time =  $dateTime ";
    * 2016-06-23 10:23:47
 	*/
	protected function updateTimeStampFormat($dateTime, $server=false) {

		if($server == true) {

			// separate date and time
			$dateTime = explode(' ', $dateTime);

		} else {
			// remove extra number from seconds
			$dateTime = explode('.', $dateTime)[0];

			// separate date and time
			$dateTime = explode('T', $dateTime);
		}

		// get date 
		$date = $dateTime[0]; 

		// get time
		$time = $dateTime[1];  

		// re order the format of date it should be m/d/y
		$date = explode('-', $date);  
	    $y = $date[0]; 
	    $m = $date[1]; 
	    $d = $date[2];  

	    // return data
	    return $m . '/' . $d . '/' . $y . ' ' . $time;   
	}

	/**
	 * @param $dataTime
	 * @return bool
	 * This will check if the value is data and time
	 */
	protected function isDateTime($dataTime) {
		//2016-06-23T01:08:29.000Z


		$dataTime = str_replace(' ', '', $dataTime);


//		echo ' - ' . strpos($value, '-'); // 4
//		echo ' : ' . strpos($value, ':'); // 13
//		echo ' T ' . strpos($value, 'T'); // 10
//
		if(!empty($dataTime)) {
			if(strpos($dataTime, '-') == 4 and strpos($dataTime, ':') == 13 and strpos($dataTime, 'T') == 10) {
	//			  echo "<br>$value  This should be a date\n";

				return true;
			} else {
	//		    echo "<br>$value  This should not be a date\n";
				return false;
			}
		}else {
			return false;
		}

	}

	/**
	 * @param $date
	 * @return bool
	 * This will check if the value is data
	 */
	protected function isDate($date) {

		$date = str_replace(' ', '', $date);

		if(strpos($date, '-') == 4 ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param $date
	 * @return string
	 * This will change the date format from tg to fmp db format
	 */
	protected function updateDateFormat($date) {

		// re order the format of date it should be m/d/y
		$date = explode('-', $date);
		$y = $date[0];
		$m = $date[1];
		$d = $date[2];

		// return data
		return $m . '/' . $d . '/' . $y;
	}
}





