<?php
	include 'checkloginstatus.php'; 
	include 'connect_database.php';
	include '_user-details.php';

	
	$Company = $_GET['Company'];
	$MemberName = $_GET['MemberName'];
			
	$MemberName = $MemberName==""? null : $MemberName;
	$Company = $Company==0? null : $Company;
	
	$filename = "Result.xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");   
	try {
			$query = "SELECT Title, FirstName, MiddleName, LastName, Remarks FROM members WHERE CONCAT(Title, FirstName, MiddleName, LastName) LIKE IFNULL(CONCAT('%',REPLACE(?, ' ', '%'),'%'), CONCAT(Title, FirstName, MiddleName, LastName)) AND CompanyID = IFNULL(?, CompanyID);";
			$sth = $dbh->prepare($query);
			$sth->execute(array($MemberName, $Company)) ;
			//var_dump($sth->ErrorInfo());
			//$result = $sth->fetchAll();
			$query = null;
			
			echo "Title"."\t" ;
			echo "FirstName"."\t" ;
			echo "MiddleName"."\t" ;
			echo "LastName"."\t" ;
			echo "Remarks"."\t" ;
			echo "\r\n";
			
			while($row = $sth->fetch())
			{
				echo $row[0]."\t" ;
				echo $row[1]."\t" ;
				echo $row[2]."\t" ;
				echo $row[3]."\t" ;
				echo $row[4]."\t" ;
				echo "\r\n";
			} 
		} catch(PDOException $e) {
			die('Could not save to the database:<br/>' . $e);
		}
		  
		

?>