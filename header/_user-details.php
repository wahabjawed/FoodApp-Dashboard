<?php

		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			
			try {
				$query = "SELECT * FROM user WHERE username like :username";
			 	$stmt = $dbh->prepare($query);
				$stmt->bindParam(':username', $username);
    		 	$stmt->execute();
    		 	$result = $stmt->fetchAll();
			   	$row = $result[0];
				$userID     = $row['id'];
				$userName     = $row['username'];
				$_name=			$row['name'];
				$typeID=			$row['type_id'];
				$query = null;
				} catch(PDOException $e) {
				die('Could not save to the database:<br/>' . $e);
				}
		
		}else{
			
				header('Location: login.php');	
			}
		
			
		
	
?>
