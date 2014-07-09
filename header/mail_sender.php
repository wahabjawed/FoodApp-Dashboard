<?php
function SendEmailOfCreation($Entity, $ID){
	require 'connect_database.php'; 
	
	
	try {
			$query = "SELECT email FROM user WHERE type = 2;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			$to = "";
			while ($row = $sth->fetch(PDO::FETCH_ORI_NEXT)) {
				$to .= ($to==""?"":", ").$row['email'];
			}
			$message = "Dear User, \n A new ".$Entity." has been inserted with ID: $ID .";
			$message = wordwrap($message, 70, "\r\n");
			$headers = 'From: info@icvcloud.com';
			if($to != ""){
			mail($to, $Entity.' Creation Notification', $message, $headers);
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
}
?>