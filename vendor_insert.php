<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php';
include 'header/_user-details.php';


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
<title>Vendor - FulFill App</title>

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
  <?php include 'header/menu-top-navigation.php';?>
  <?PHP

	if($_POST)
	{
		
		include 'header/image_upload.php';
	
		
		if(!isset($UploadedImg) or $UploadedImg=="")
			{
			$UploadedImg='edu.png';
				
	     }
	
		$name= $_POST['inputName'];
		$store= $_POST['inputStore'];
		$city = $_POST['inputCity'];
		$stateid = $_POST['inputState'];
		$zip = $_POST['inputZip'];
		$countryid = $_POST['inputCountry'];
		$address = $_POST['inputAddress'];
		$coorid = $_POST['inputCoor'];
		$display = $_POST['inputDisplay'];
		$opentime = $_POST['inputOpenT'];
		$closetime = $_POST['inputCloseT'];
		$coorid = implode(', ',$coorid);
		
		try {
			$query = "INSERT INTO vendor(vendor_name,vendorstore_no, vendor_city,vendor_stateid,vendor_zip,vendor_countryid,vendor_imageid,vendor_address, vendor_coordinates_id,vendor_display,vendor_opentime,vendor_closetime) values (:name, :store, :city, :stateid, :zip, :countryid, :image,:address, :coorid,:display,:opent,:closet);";
			//$query += "VALUES(:CompanyName)";
			$sth = $dbh->prepare($query);
			$sth->bindValue(':name',$name);
			$sth->bindValue(':store',$store);
			$sth->bindValue(':city',$city);
			$sth->bindValue(':stateid',$stateid);
			$sth->bindValue(':zip',$zip);
			$sth->bindValue(':countryid',$countryid);
			$sth->bindValue(':address',$address);	
			$sth->bindValue(':coorid',$coorid);	
			$sth->bindValue(':display',$display);				
			$sth->bindValue(':image',$UploadedImg);
			$sth->bindValue(':opent',$opentime);
			$sth->bindValue(':closet',$closetime);						
			$sth->execute() ;
		
						echo "
			<div class='alert alert-success' role='alert'>
  <a href='#' class='alert-link'>Vendor Saved Successfully!</a>
</div>";
		} catch(PDOException $e) {
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="vendor_insert.php">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">ADD VENDOR</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Store No</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputStore" name="inputStore" placeholder="Store No" required>
            </div>
          </div>
          
               <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Address" required>
            </div>
          </div>
          
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">City</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="City" required>
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
		
		    
			echo "<option value=${sta_id}> ${sta_name} </option>";
			}
		 ?>
         </select>
            </div>
          </div>
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Zip</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Zip" required>
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
		
		    
			echo "<option value=${country_id}> ${country_name} </option>";
			}
		 ?>
         </select>
            </div>
          </div>
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Image</label>
            <div class="col-sm-10">
               <input type="file" value="File" name="file" id="file" required/>
            </div>
          </div>
 
    
             
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Coordinates</label>
            <div class="col-sm-10">
            <select class="form-control" id="inputCoor" name="inputCoor[]" multiple required>
               <option value=0> Select Coordinates</option>
               <?php 
			   
			 $query = "select * from center_coordinates";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
 
 
 while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$coor_id = $result['center_coordinates_id'];
		    $coor_name = $result['coordinates_name'];
		
		    
			echo "<option value=${coor_id}> ${coor_name} </option>";
			}
		 ?>
         </select>
            </div>
          </div>
    
    
                  <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Open Time</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputOpenT" name="inputOpenT" placeholder="Open Time" required>
            </div>
          </div>
          
                        <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Close Time</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCloseT" name="inputCloseT" placeholder="Close Time" required>
            </div>
          </div>
    
    
      <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Display</label>
            <div class="col-sm-10">
                 <input type="hidden" name="inputDisplay" value="0" />
            <input type="checkbox" class="form-control" id="inputDisplay" name="inputDisplay" value="1" >    </div>
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
    <p>&copy; SilverSages Studio 2014</p>
  </div>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
