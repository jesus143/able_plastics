<?php 	class Trade_Gecko_API{		function __construct($verifySsl = true){			$this->verify_ssl 	= $verifySsl;		}				function make_request($object, $options = array()){			$url = "https://api.tradegecko.com/".$object.'?limit='.filter_limit;			echo "URL = " . $url . '<BR>';			$ch  = curl_init($url);			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          			    'Content-Type: application/json',  			    'Accept: application/json',                                                                                                                               			    'Authorization: Bearer 813044ff254af1229cede02167f361237048e2760fa7e632bcab7b2d28d0e61d')			);				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->verify_ssl);			$response 	= curl_exec($ch);			print_r(curl_error($ch));			return json_decode($response, true);		}		function fetch($object){			$response = $this->make_request($object);			return $response;		}		}?>