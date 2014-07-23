<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php';
include 'header/_user-details.php';




if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	
	$query = "Select * from employee_location where employee_location_id = :ID";
	$sth = $dbh->prepare($query);
	$sth->bindValue(':ID',$id);
	$sth->execute();
	$result = $sth->fetchAll();
	$row = $result[0];
	$location=$row['el_location_id'];
	$employee = $row['el_employee_id'];
	
	
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
  <?php include 'header/menu-top-navigation.php';
  

	if($_POST)
	{
	
		
		
		$employee = $_POST['inputEmployee'];
		$location = $_POST['inputLocation'];
		
	

	
		
		
		try {
			$query = "UPDATE employee_location SET el_location_id=:location,el_employee_id=:employee where employee_location_id = :id";
			
			$sth = $dbh->prepare($query);
			$sth->bindValue(':id',$_GET["id"]);
			$sth->bindValue(':employee',$employee);
			$sth->bindValue(':location',$location);
			$sth->execute() ;
		
			//echo "Location Updated Successfully!";
			header( 'Location: location.php' );
		} catch(PDOException $e) {
		
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="employee_location_update.php?id=<?php echo $_GET['id']; ?>">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">UPDATE EMPLOYEE LOCATION</h3>
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
		
		    
			if($emp_id==$employee){
			echo "<option value=${emp_id} selected> ${emp_name} </option>";
				}else{
			echo "<option value=${emp_id}> ${emp_name} </option>";
				}
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
		
		    if($coor_id==$location){
		
			echo "<option value=${coor_id} selected> ${coor_name} </option>";
			}else{
			echo "<option value=${coor_id}> ${coor_name} </option>";
			}
			}
		 ?>
         </select>
            </div>
          </div>
    
          
      
       <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10" style="float:right">
          <button type="submit" class="btn btn-default">Update</button>
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
