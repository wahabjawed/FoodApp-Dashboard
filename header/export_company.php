<?php
	include 'checkloginstatus.php'; 
	include 'connect_database.php';
	include '_user-details.php';

	
	$CompanyName = $_GET['CompanyName'];
	$IndustoryCategory = $_GET['IndustoryCategory'];
	$IndustorySubCategory = $_GET['IndustorySubCategory'];
			
	$CompanyName = $CompanyName==""? null : $CompanyName;
	$IndustoryCategory = $IndustoryCategory==0? null : $IndustoryCategory;
	$IndustorySubCategory = $IndustorySubCategory==0? null : $IndustorySubCategory;
	
	$filename = "Result.xls";
	header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");   
	try {
			$query = "SELECT CompanyName, Website, Remarks FROM companies WHERE CompanyName LIKE IFNULL(CONCAT('%',?,'%'), CompanyName) AND IndustoryCategory = IFNULL(?, IndustoryCategory) AND IndustorySubCategory = IFNULL(?, IndustorySubCategory);";
			$sth = $dbh->prepare($query);
			$sth->execute(array($CompanyName, $IndustoryCategory, $IndustorySubCategory)) ;
			//var_dump($sth->ErrorInfo());
			//$result = $sth->fetchAll();
			$query = null;
			
			echo "Company Name"."\t" ;
			echo "Website"."\t" ;
			echo "Remarks"."\t" ;
			echo "\r\n";
			
			while($row = $sth->fetch())
			{
				echo $row[0]."\t" ;
				echo $row[1]."\t" ;
				echo $row[2]."\t" ;
				echo "\r\n";
			} 
		} catch(PDOException $e) {
			die('Could not save to the database:<br/>' . $e);
		}
		  
		

?>