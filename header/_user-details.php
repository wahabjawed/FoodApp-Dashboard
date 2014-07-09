<?php

		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			
			try {
				$query = "SELECT * FROM user u,usertype ut WHERE u.type=ut.userTypeID and u.username like :username";
			 	$stmt = $dbh->prepare($query);
				$stmt->bindParam(':username', $username);
    		 	$stmt->execute();
    		 	$result = $stmt->fetchAll();
			   	$row = $result[0];
				$userID     = $row['userID'];
				$userName     = $row['username'];
				$userTypeID     = $row['userTypeID'];				
				$canDelete  = $row['canDelete'];
				$canInsert  = $row['canInsert'];
				$canUpdate  = $row['canUpdate'];
				$canManage  = $row['canManage'];
				$canVerify  = $row['canVerify'];
				$query = null;
				} catch(PDOException $e) {
				die('Could not save to the database:<br/>' . $e);
				}
		
		}else{
			
				header('Location: login.php');	
			}
		
			
		
	
?>
