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
<title>Customer - FulFill App</title>

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
		
		
	
		
		
	
		$fname= $_POST['inputFName'];
		$lname= $_POST['inputLName'];
		$city = $_POST['inputCity'];
		$stateid = $_POST['inputState'];
		$zip = $_POST['inputZip'];
		$countryid = $_POST['inputCountry'];
		$address = $_POST['inputAddress'];
		$coorid = $_POST['inputLoc'];
		$email = $_POST['inputEmail'];
		$phone = $_POST['inputPhone'];
		$cell = $_POST['inputCell'];		
		$major = $_POST['inputMajor'];
		$grade = $_POST['inputGrade'];
		$password = $_POST['inputPassword'];
		
		
		echo $coorid[1];
		
		try {
			$query = "INSERT INTO customer(customer_fname,customer_lname, customer_city,customer_stateid,customer_zip,customer_countryid,customer_email,customer_address,customer_phone,customer_cell,customer_major,customer_gradclass,customer_password) values (:fname, :lname, :city, :stateid, :zip, :countryid, :email,:address, :phone,:cell,:major,:grade,:password);";
			//$query += "VALUES(:CompanyName)";
			$sth = $dbh->prepare($query);
			$sth->bindValue(':fname',$fname);
			$sth->bindValue(':lname',$lname);
			$sth->bindValue(':city',$city);
			$sth->bindValue(':stateid',$stateid);
			$sth->bindValue(':zip',$zip);
			$sth->bindValue(':countryid',$countryid);
			$sth->bindValue(':address',$address);	
			//$sth->bindValue(':coorid',$coorid);	
			$sth->bindValue(':email',$email);				
			$sth->bindValue(':cell',$cell);
			$sth->bindValue(':phone',$phone);
			$sth->bindValue(':grade',$grade);
			$sth->bindValue(':major',$major);
			$sth->bindValue(':password',$password);						
			$sth->execute() ;
		
						echo "
			<div class='alert alert-success' role='alert'>
  <a href='#' class='alert-link'>Customer Saved Successfully!</a>
</div>";
		} catch(PDOException $e) {
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="customer_insert.php">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">ADD CUSTOMER</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="First Name" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLName" name="inputLName" placeholder="Last Name" required>
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
            <label for="inputTax" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
            </div>
          </div>
          
            <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone" required>
            </div>
          </div>
          
            <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Cell</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputCell" name="inputCell" placeholder="Cell" required>
            </div>
          </div>
          
           
    
    
     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Major</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputMajor" name="inputMajor" placeholder="Major" required>
            </div>
          </div>
          
            <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Grade</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputGrade" name="inputGrade" placeholder="Grade Class" required>
            </div>
          </div>
          
            <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
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
			$coor_id = $result['location_id'];
		    $coor_name = $result['location_name'];
		
		    
			echo "<option value=${coor_id}> ${coor_name} </option>";
			}
		 ?>
         </select>
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
    <p>&copy; SilverSages Studio 2014</p>
  </div>
</div>
<!-- /container --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>