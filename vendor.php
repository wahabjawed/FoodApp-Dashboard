<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php'; 
include 'header/_user-details.php';





if($_POST)
	{	
			$searchTerm = "%".$_POST['searchTerm']."%";
			
			$query =" select * from vendor left outer join state on  vendor_stateid=state_id
											  left outer join country on vendor_countryid=country_id
					   where (vendor_id=:searchTerm or vendor_name like :searchTerm or vendorstore_no like :searchTerm or vendor_address like :searchTerm or vendor_city like :searchTerm or vendor_zip like :searchTerm or country_name like :searchTerm or state_name like :searchTerm) order by vendor_id";
			$stmt = $dbh->prepare($query);
			$stmt->bindParam(':searchTerm', $searchTerm);
    		$stmt->execute();
    	
	}
		
else{
			
 			$query = "select * from vendor left outer join state on  vendor_stateid=state_id
											  left outer join country on vendor_countryid=country_id
					order by vendor_id";
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

<script>
function link(){
	window.location.href = "vendor_insert.php"
	}


function resets(){
	window.location.href = "vendor.php"
	}
	

	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		
		if(result == true)
		{	
			this.document.deleteForm.action = "delete.php?id="+id+"&type=vendor";
			
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
     <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" method="post" action="vendor.php">
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
            <th width=5%>Vendor ID</th>
            <th width=9%>Name</th>
            <th width=7%>Store No</th>
            <th width=25%>Address Info</th>
            <th width=16%>Location Coordinate</th>
            <th width=15%>Image</th>
            <th width=3%>Display</th>
            <th width=12%>Time</th>
            <th width=8%>Action</th>
           
          </tr>
        </thead>
        <tbody>
        
        
        
          <?php
		
								
		
			while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$id = $result['vendor_id'];
			$name=$result['vendor_name'];
			$store=$result['vendorstore_no'];
			$address = "Address: ".$result['vendor_address']."<br>"."City: ".$result['vendor_city']."<br>"."State: ".$result['state_name']."<br> "."Zip: ".$result['vendor_zip']."<br> "."Country: ".$result['country_name'];
		
			$coorid_arr=$result['vendor_coordinates_id'];
			
			$query = "select * from center_coordinates where center_coordinates_id in (${coorid_arr}) ";
			$stmts = $dbh->prepare($query);
    		$stmts->execute();
			$location="";
			while($results = $stmts->fetch(PDO::FETCH_ASSOC))
			{
			$location= $location."ID: ".$results['center_coordinates_id']."<br>Longitude: ".$results['coordinates_long']."<br>"."Latitude: ".$results['coordinates_lat']."<br>";
			}
		$extra = "Image Id: <br><img src='UploadedImages\\${result['vendor_imageid']}' height='70px' width='70px' class='img-responsive'/>";
		$display = $result['vendor_display'];
		$times= "Open : ".$result['vendor_opentime']."<br> Close : ".$result['vendor_closetime'];
			echo "
          <tr>
            <td>{$id}</td>
        				
        				
      					<td>${name}</td>
						<td>${store}</td>
						<td>${address}</td>
						<td>${location}</td>
						<td>${extra}</td>
						<td>${display}</td>
						<td>${times}</td>
            <td><a href='#' onclick='return deleteConfirm(${id});' > Delete </a>
			<a href='vendor_update.php?id={$id}'>Update</a></td>
   
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