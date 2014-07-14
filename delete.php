<?php
	include 'header/checkloginstatus.php'; 
	include 'header/connect_database.php';

	
	if(isset($_GET['id']) && isset($_GET['type']))
	{		
	
		$id = $_GET['id'];
		$type = $_GET['type'];
			
		$redirectURL=$type.".php";


		$query = "DELETE from ". $type ." where ".$type."_id =:ID";
		$sth = $dbh->prepare($query);
		$sth->bindValue(':ID',$id);
		$sth->execute();
	
	}
		header('Location: '.$redirectURL);
		
		

?>