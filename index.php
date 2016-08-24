<?php

	try {
		$db = new PDO('mysql:host=localhost;dbname=tpocom_tradegecko;charset=utf8mb4', 'tpocom_adrian', 'adrian123!');
		echo 'Connected.';
	}
	catch(PDOException $e)
	{
	    echo $e->getMessage();
	}

?>