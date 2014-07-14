<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php'; 
include 'header/_user-details.php';





if($_POST)
	{	
			$searchTerm = "%".$_POST['searchTerm']."%";
			$searchTermNo = $_POST['searchTerm'];
			
			$query = "select * from center_coordinates left outer join location on coordinates_location_id=location_id where center_coordinates_id=:searchTermNo or map_url like :searchTerm or coordinates_lat like :searchTermNo or coordinates_long like :searchTermNo order by center_coordinates_id";
			$stmt = $dbh->prepare($query);
			$stmt->bindParam(':searchTerm', $searchTerm);
			$stmt->bindParam(':searchTermNo', $searchTermNo);
    		$stmt->execute();
    	
	}
		
else{
			
 			$query = "select * from center_coordinates left outer join location on coordinates_location_id=location_id order by center_coordinates_id";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
    	
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
<title>Center Coordinates - FulFill App</title>

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

<script>
function link(){
	window.location.href = "coordinate_insert.php"
	}


function resets(){
	window.location.href = "center_coordinates.php"
	}
	

	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		
		if(result == true)
		{	
			this.document.deleteForm.action = "delete.php?id="+id+"&type=center_coordinates";
			
			this.document.deleteForm.submit();
		
	
			
		}
		
	}	
	
	
	
</script>
</head>

<body>
<div class="container">
 <?php include 'header/menu-top-navigation.php';
 ?>

  <div style="margin-bottom:20px;margin-top:20px">
     <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" method="post" action="center_coordinates.php">
      <div class="form-group">
        <label class="sr-only" for="searchTerm">Search Term</label>
        <input type="text" class="form-control" id="searchTerm" name= "searchTerm" placeholder="Enter Search Term">
      </div>
      <button type="submit" class="btn btn-success">Search</button>
      <button type="button" onclick="resets()" class="btn btn-primary">Reset</button>
      <button type="button" onclick="link()" class="btn btn-warning">Add New</button>
    </form>
    </div>
    <div class="table-responsive">
       <form name="deleteForm" action="" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width=10%>#</th>
            <th width=9%>Longitude</th>
            <th width=9%>Latitude</th>
            <th width=7%>Radius</th>
            <th width=20%>Map URL</th>
            <th width=30%>Location Info</th>
            <th width=15%>Action</th>
           
          </tr>
        </thead>
        <tbody>
        
        
        
          <?php
		
								
		
			while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$id = $result['center_coordinates_id'];
		    $longitude = $result['coordinates_long'];
			$latitude=$result['coordinates_lat'];
			$radius=$result['radius'];
			$map=$result['map_url'];
			$location= "Name: ".$result['location_name']."<br>"."Display: ${result['display']}";
		    
			echo "
          <tr>
            <td>{$id}</td>
        				
        				<td>${longitude}</td>
      					<td>${latitude}</td>
						<td>${radius}</td>
						<td><a href'${map}'>${map}</a></td>
						<td>${location}</td>
            <td><a href='#' onclick='return deleteConfirm(${id});' > Delete </a>
			<a href='coordinate_update.php?id={$id}'>Update</a></td>
   
          </tr>";
			}
		 ?>
         
        </tbody>
      </table>
      
         </form>
          </div>
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