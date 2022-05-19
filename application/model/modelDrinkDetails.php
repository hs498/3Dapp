<?php
		include '../../debug/ChromePhp.php';
		ChromePhp::log('modelDrinkDetails.php: Hellow World');
		ChromePhp::log($_SERVER);	
		
		// Get the brand name
		ChromePhp::warn('modelDrinkDetails.php: Get Brand details');	
		$brandName = $_GET['brand']; 
		
		ChromePhp::warn('modelDrinkDetails.php: Make a connection to test1.db');	
		// Connect to the database table and retrieve the required brand data
 		try {		

			// Set up database connectionm parameters
			$dsn = 'sqlite:../../db/test1.db';
			$user = 'user';
			$pass = 'password';
			ChromePhp::warn($dsn, $user, $pass);
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
				PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
			];
			
			// Make a connection to the drinks database
			$dbhandle = new PDO($dsn, $user, $pass, $options);
			ChromePhp::warn('modelDrinkDetails.php: Connected to test1.db');	

			// Prepare a SQL statement to select a record matching the brand name selected in the view drop-down list
			ChromePhp::warn('modelDrinkDetails.php: Prepare PDO SQL statement');
			$sql = 'SELECT * FROM Model_3D WHERE brand = "'. $brandName. '"';
			ChromePhp::warn( $sql);
			
			// Use PDO query() to query the database with the prepared SQL statement
			ChromePhp::warn('modelDrinkDetails.php: PDO query() SQL statement');
			$stmt = $dbhandle->query($sql);
			ChromePhp::warn($stmt);
		
			// Set up an array to return the results to the view
			$result = null;
			
			// Set up a variable to index each row of the array
			$i=0;	
			
			// Use PDO fetchall() the results from the database using a while loop
			// Use a while loop to loop through the table rows — there may be more than one record with the same brand name
			while ($data = $stmt->fetch()) {
				ChromePhp::warn('modelDrinkDetails.php:PDO fetch() data from test1.db');
				ChromePhp::warn($data);
				// Write the database contents to the results array for sending back to the view
				$result[$i]['brand'] = $data['brand'];
				$result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
				$result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
				$result[$i]['modelTitle'] = $data['modelTitle'];
				$result[$i]['modelSubtitle'] = $data['modelSubtitle'];
				$result[$i]['modelDescription'] = $data['modelDescription'];
				
				// increment the row index
				$i++;
				ChromePhp::warn('modelDrinkDetails.php: Here is the test1.db data');
				ChromePhp::warn($result);
			}
		}
		catch (PDOEXception $e) {
			ChromePhp::warn('modelDrinkDetails.php: Code error on server?');	
        	print new Exception($e->getMessage());
    	}
    	
    	// Close the database connection
		$dbhandle = NULL;
		ChromePhp::warn('modelDrinkDetails.php: echo result to frontend in JSON packet');
		ChromePhp::warn($result);
		echo json_encode($result);

 ?>