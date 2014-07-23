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
<title>Employee Location - FulFill App</title>

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

	if($_SERVER['REQUEST_METHOD'] == "POST")
	
	{
		
		
	
		$employee = $_POST['inputEmployee'];
	
		
			$location=$_POST['inputLocation'];
				
	   
		try {
			$query = "INSERT INTO employee_location(el_location_id,el_employee_id) values (:location, :employee);";
			//$query += "VALUES(:CompanyName)";
			$sth = $dbh->prepare($query);
			$sth->bindValue(':location',$location);
			$sth->bindValue(':employee',$employee);
			
			$sth->execute() ;
		
			echo "
			<div class='alert alert-success' role='alert'>
  <a href='#' class='alert-link'>Employee Location Saved Successfully!</a>
</div>";
		} catch(PDOException $e) {
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="employee_location_insert.php">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">ADD EMPLOYEE LOCATION</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="inputFName" class="col-sm-2 control-label">Employee </label>
            <div class="col-sm-10">
          
          
              <select class="form-control" id="inputEmployee" name="inputEmployee" required>
               <option value=0> Select Employee</option>
               <?php 
			   
			 $query = "select * from employee";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
 
 
 while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$emp_id = $result['employee_id'];
		    $emp_name = $result['employee_fname']." ".$result['employee_lname'];
		
		    
			echo "<option value=${emp_id}> ${emp_name} </option>";
			}
		 ?>
         </select>
            </div>
          </div>
    
          
          
           <div class="form-group">
            <label for="inputLName" class="col-sm-2 control-label">Location</label>
            <div class="col-sm-10">
             <select class="form-control" id="inputLocation" name="inputLocation" required>
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
