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


        // Count the loop of layout
        $counter = 1;

        // This will help the value that being retrieved from trade geko based on fmp layoout row
        $data = array();

        // This will hold the fmp layout
        $layoutFields = array();

        // This will hold the trade geko values
        $tradeGekoValues = array();

        $serverDateTime = $this->updateTimeStampFormat(date('Y-m-d H:i:s'), true);;

        $layoutFields = $this->getTableFields($layout);

        $tradeGekoValues = $response[$layout];

        try{

            // Fetch trade geko values
            foreach($tradeGekoValues as $key1 => $layoutValue):

                // Compose data for fmp format
                foreach ($layoutFields as $key2 => $layoutField):

                    // Remove space of the field name to make sure there is no error inserting to fmp db
                    $layoutField = str_replace(' ', '', $layoutField);

                    // Check if the value is date time
                    // and if true the convert the value to date time format for fmp db
                    if ($this->isDateTime($layoutValue[$layoutField]) == true) {
                        $data[$layoutField] = $this->updateTimeStampFormat($layoutValue[$layoutField]);
                    }

                    // Check data if date format
                    // and if true then convert the value to date format for fmp db
                    //
                    else if ($this->isDate($layoutValue[$layoutField]) == true) {
                        $data[$layoutField] = $this->updateDateFormat($layoutValue[$layoutField]);
                    }

                    // Check if this is the retrieval_date
                    // if true then set value as retrieval date and that is being initialized in the server
                    else if ($layoutField == 'retrieval_date') {
                        $data[$layoutField] = $serverDateTime;
                    }

                    // Check if data is in array format
                    // if true the just only get the index 0
                    else if (is_array($layoutValue[$layoutField])) {
                        $data[$layoutField] = $layoutValue[$layoutField][0];
                    }

                    // If above conditions are false
                    // then data is valid and auto add it to data array
                    else {
                        $data[$layoutField] = $layoutValue[$layoutField];
                    }
                endforeach;

                // Check id of a layout row if exist
                // if true then execute the update only
                if($result = $this->isExist($this->getFieldIdValue($layoutValue), $layout)) {
                    echo "<br>exist update";
                    $this->updateData($result, $data);
                }

                // If data is not yet in fmp db then execute insert
                else {
                    echo "<br> not exist insert";
                    // insert
                    $this->insertData($layout, $data);
                }

                // This will limit the insert
                // just need to set data
                // if @var $saveLimit = true then that should be a number 1,2,3,4,5,6.... and limit executed
                // else if not provided from parameter then auto set to false and inserting data has no limit at all
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

        // Prepare insert to FMP Database
        $rec = $this->fm->createRecord($layout,$data);

        // Insert to FMP Database
        $result = $rec->commit();

        if (FileMaker::isError($result)) {

            echo ' Error: (' . $result->getCode() . ') ' . $result->getMessage() . "";

            return false;

        }else{
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

        // Get records
        $attendees = $result->getRecords();

        $attendee = $attendees[0];

        // Update records
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

        // Get record
        $request = $this->fm->newFindCommand($layout);

        // Set where conditions
        $request->addFindCriterion('id', $id);

        // Execute
        $result = $request->execute();

        if (FileMaker::isError($result)) {

            echo "<br>data not exist";

            return false;

        } else {

            echo "<br> data exist";

            return $result;
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

        $dataTime = str_replace(' ', '', $dataTime);

        if(!empty($dataTime)) {
            if (strpos($dataTime, '-') == 4 and strpos($dataTime, ':') == 13 and strpos($dataTime, 'T') == 10) {
                return true;
            } else {
                return false;
            }
        } else {
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

        return $m . '/' . $d . '/' . $y;
    }
}





