<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php';
include 'header/_user-details.php';




if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	
	$query = "Select * from employee where employee_id = :ID";
	$sth = $dbh->prepare($query);
	$sth->bindValue(':ID',$id);
	$sth->execute();
	$result = $sth->fetchAll();
	$row = $result[0];
	$emp_id=$row['employee_id'];
	$fname = $row['employee_fname'];
	$lname = $row['employee_lname'];
	$address = $row['employee_address'];
	$city = $row['employee_city'];
	$stateid = $row['employee_stateid'];
	$zip =  $row['employee_zip'];
	$countryid =  $row['employee_countryid'];
	$available =  $row['employee_available'];
	
	$img=$row['employeeimage_id'];
	$coorid =  $row['employee_locationid'];
	$coor = explode(',',$coorid);

	
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
<title>Employee - FulFill App</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

  <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!-- Just for debugging purposes. Dont actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
  <?php include 'header/menu-top-navigation.php';
  

	if($_POST)
	{
		
		
		$fname= $_POST['inputFName'];
		$lname= $_POST['inputLName'];
		$address = $_POST['inputAddress'];
		$city = $_POST['inputCity'];
		$stateid = $_POST['inputState'];
		$zip = $_POST['inputZip'];
		$countryid = $_POST['inputCountry'];
		$available = $_POST['inputAvailable'];
	
		$imageID=$_FILES["file"]["name"];
		$coorid = $_POST['inputLoc'];
		$coorid = implode(', ',$coorid);
		
		include 'header/image_upload.php';	

	if(empty($UploadedImg)){
		$imgGet = $_GET['img'];
		$code = $imgGet;
		}else{
		$code = $UploadedImg;	
		}
		
		try {
			$query = "UPDATE employee SET employee_fname=:fname, employee_lname=:lname, employee_address=:address, employee_city=:city, employee_stateid=:stateid, employee_zip=:zip, employee_countryid=:countryid, employee_available=:available , employeeimage_id=:image, employee_locationid= :coorid where employee_id = :id";
			
			$sth = $dbh->prepare($query);
			$sth->bindValue(':id',$_GET["id"]);
		    $sth->bindValue(':fname',$fname);
			$sth->bindValue(':lname',$lname);
			$sth->bindValue(':address',$address);
			$sth->bindValue(':city',$city);
			$sth->bindValue(':stateid',$stateid);
			$sth->bindValue(':zip',$zip);
			$sth->bindValue(':countryid',$countryid);
			$sth->bindValue(':available',$available);	
			$sth->bindValue(':image',$code);		
			$sth->bindValue(':coorid',$coorid);			
			$sth->execute() ;
		
			//echo "Product Updated Successfully!";
			header( 'Location: employee.php' );
		} catch(PDOException $e) {
		
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="employee_update.php?id=<?php echo $_GET['id']; ?>&img=<?php echo $img; ?>">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">UPDATE EMPLOYEE</h3>
        </div>
        <div class="panel-body">

          
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="First Name" value="<?php echo $fname; ?>" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLName" name="inputLName" value="<?php echo $lname; ?>" placeholder="Last Name" required>
            </div>
          </div>
          
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $address; ?>" placeholder="Address" required>
            </div>
          </div>
          
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">City</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="City" value="<?php echo $city; ?>" required>
            </div>
          </div>
          
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">State</label>
            <div class="col-sm-10">
            <select class="form-control" id="inputState" name="inputState" required>
               <option value=0> Select State</option>
               <?php 
			   
			 $query = "select * from state";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
 
 
 while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$sta_id = $result['state_id'];
		    $sta_name = $result['state_name'];
		
			
			if($stateid==$sta_id){
echo "<option value=${sta_id} selected> ${sta_name} </option>";
			}else{
			echo "<option value=${sta_id}> ${sta_name} </option>";
			}
			}
		 ?>
         </select>
            </div>
          </div>
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Zip</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Zip" value="<?php echo $zip; ?>" required>
            </div>
          </div>
 
 
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Country</label>
            <div class="col-sm-10">
            <select class="form-control" id="inputCountry" name="inputCountry" required>
               <option value=0> Select Country</option>
               <?php 
			   
			 $query = "select * from country";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
 
 
 while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$country_id = $result['country_id'];
		    $country_name = $result['country_name'];
		
		if($countryid==$country_id){
		    
			echo "<option value=${country_id} selected> ${country_name} </option>";
		}else{
			echo "<option value=${country_id}> ${country_name} </option>";
			}
			}
		 ?>
         </select>
            </div>
          </div>
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Image</label>
            <div class="col-sm-10">
               <input type="file" value="File" name="file" id="file" />
            </div>
          </div>
 
                   <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Location</label>
            <div class="col-sm-10">
            <select class="form-control" id="inputLoc" name="inputLoc[]" multiple required>
               <option value=0> Select Location</option>
               <?php 
			   
			 $query = "select * from location";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
 
 
 while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$loc_id = $result['location_id'];
		    $loc_name =  $result['location_name'];
			$val=false;
			
			for($i=0;$i<count($coor);$i++){
		    			
				if($loc_id==$coor[$i]){
			
					$val=true;
			
				}
			}
			if($val){
			echo "<option value=${loc_id} selected> ${loc_name} </option>";
			}else{
			echo "<option value=${loc_id}> ${loc_name} </option>";
			}
			}
		 ?>
         </select>
            </div>
          </div>
 
    
               <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Availability</label>
            <div class="col-sm-10">
              
              
               <input type="hidden" name="inputAvailable" value="0" />
   <input type="checkbox" class="form-control"  name="inputAvailable"  value="1" <?php if($available==1)
   							echo 'checked';?>>
              
            </div>
          </div>
 
 
       
    
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Post</button>
        </div>
      </div>
        
        </div>
      </div>
    </form>
  </div>
  
  <!-- Site footer -->
  <div class="footer">
    <p>&copy; SilverSages Studios 2014</p>
  </div>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
