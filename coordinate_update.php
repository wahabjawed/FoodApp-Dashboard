<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php';
include 'header/_user-details.php';




if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	
	$query = "Select * from center_coordinates where center_coordinates_id = :ID";
	$sth = $dbh->prepare($query);
	$sth->bindValue(':ID',$id);
	$sth->execute();
	$result = $sth->fetchAll();
	$row = $result[0];
	$cc_id=$row['center_coordinates_id'];
    $ccname = $row['coordinates_name'];
	$cclong = $row['coordinates_long'];
	$cclat = $row['coordinates_lat'];
	$ccradiuskm = $row['radius_km'];
	$ccradiusmile = $row['radius_mile'];
	
	$ccurl = $row['map_url'];
	
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
<title>Coordinates - FulFill App</title>

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
	
		
		
		$name= $_POST['inputName'];
		$ilong= $_POST['inputLong'];
		$lat = $_POST['inputLat'];
		$radiusKM = $_POST['inputRadiusKM'];
		$radiusMile = $_POST['inputRadiusMile'];
		$mapURL = $_POST['inputURL'];
		
		
		try {
			$query = "UPDATE center_coordinates SET coordinates_name=:name, coordinates_lat=:lat,coordinates_long=:ilong, radius_km=:radius_km, radius_mile=:radius_mile,  map_url=:map_url where center_coordinates_id = :id";
			
			$sth = $dbh->prepare($query);
			$sth->bindValue(':id',$_GET["id"]);
			$sth->bindValue(':ilong',$ilong);
			$sth->bindValue(':name',$name);
			$sth->bindValue(':lat',$lat);
			$sth->bindValue(':radius_km',$radiusKM);
			$sth->bindValue(':radius_mile',$radiusMile);
		
			$sth->bindValue(':map_url',$mapURL);
			$sth->execute() ;
		
			echo "Coordinates Updated Successfully!";
			header( 'Location: center_coordinates.php' );
		} catch(PDOException $e) {
		
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="coordinate_update.php?id=<?php echo $_GET['id']; ?>">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">UPDATE LOCATION COORDINATES</h3>
        </div>
        <div class="panel-body">

          
           <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value ="<?php echo $ccname; ?>" required>
            </div>
          </div>

        
           <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Latitude</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputLat" name="inputLat" placeholder="Latitude" value ="<?php echo $cclat; ?>" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Longitude</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLong" name="inputLong" placeholder="Longitude" value ="<?php echo $cclong; ?>"required>
            </div>
          </div>
          
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Radius KM</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputRadiusKM" name="inputRadiusKM" placeholder="Radius KM" value ="<?php echo $ccradiuskm; ?>" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Radius Mile</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputRadiusMile" name="inputRadiusMile" placeholder="Radius Mile" value ="<?php echo $ccradiusmile; ?>" required>
            </div>
          </div>
          
          
          
          
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Map URL</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputURL" name="inputURL" placeholder="Map URL" value ="<?php echo $ccurl; ?>" required>
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
