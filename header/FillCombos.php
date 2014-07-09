<?PHP
if($_POST){
	if(isset($_POST['action']) && !empty($_POST['action'])) {
    	$action = $_POST['action'];
		switch($action) {
			case 'state' : FillStateCombo($_POST['country']);break;
			case 'city' : FillCityCombo($_POST['state']);break;
			// ...etc...
		}
	}
}
function FillIndustoryCategoryCombo($selectedCategory){
	require 'connect_database.php'; 

	try {
			$query = "SELECT CategoryID, CategoryName FROM industorycategories;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			$select = $selectedCategory==0?'selected':'';
			echo '<option '. $select . ' value="0">Select</option>';
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
				$selected = $row[0]==$selectedCategory? ' selected ': '';
			  	echo '<option value="'.$row[0].'"'.$selected.'>'.$row[1].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
function FillIndustorySubCategoryCombo($selectedSubCategory){
	require 'connect_database.php'; 

	try {
			$query = "SELECT SubCategoryID, SubCategoryName FROM industorysubcategories;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			$select = $selectedSubCategory==0?'selected':'';
			echo '<option '. $select . ' value="0">Select</option>';
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
				$selected = $row[0]==$selectedSubCategory? ' selected ': '';
			 	echo '<option value="'.$row[0].'"'.$selected.'>'.$row[1].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}

function FillContactInfoTypeCombo($selectedTypeId){
	require 'connect_database.php'; 

	try {
			$query = "SELECT ContactTypeID, ContactTypeName FROM contacttypes;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  $selected = $row[0]==$selectedTypeId? 'selected' : '';
			  echo '<option value="'.$row[0].'" '. $selected .'>'.$row[1].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
	
	function FillCompanyCombo($companyId){
	require 'connect_database.php'; 

	try {
			$query = "SELECT CompanyID, CompanyName FROM companies;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  $selected = $row[0]==$companyId? ' selected ': '';
			  echo '<option value="'.$row[0].'"'.$selected.'>'.$row[1].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
	function FillDepartmentCombo(){
	require 'connect_database.php'; 

	try {
			$query = "SELECT DISTINCT Department FROM members;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  echo '<option value="'.$row[0].'">'.$row[0].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
	function FillDesignationCombo(){
	require 'connect_database.php'; 

	try {
			$query = "SELECT DISTINCT Designation FROM members;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  echo '<option value="'.$row[0].'">'.$row[0].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
	function FillCountryCombo(){
	require 'connect_database.php'; 

	try {
			$query = "SELECT DISTINCT Country FROM addresses;";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  echo '<option value="'.$row[0].'">'.$row[0].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
	function FillStateCombo($country){
	require 'connect_database.php'; 

	try {
			$query = "SELECT DISTINCT State FROM addresses WHERE Country LIKE '$country';";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  echo '<option value="'.$row[0].'">'.$row[0].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
	function FillCityCombo($state){
	require 'connect_database.php'; 

	try {
			$query = "SELECT DISTINCT City FROM addresses WHERE State LIKE '$state';";
			$sth = $dbh->prepare($query);
			$sth->execute() ;
			while ($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			  echo '<option value="'.$row[0].'">'.$row[0].'</option>';
			}
			$query = null;
			//$sth->debugDumpParams();
			//var_dump($sth->ErrorInfo());
		} catch(PDOException $e) {
			die('Could not get from the database:<br/>' . $e);
		}
	}
?>