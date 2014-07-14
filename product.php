<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php'; 
include 'header/_user-details.php';





if($_POST)
	{	
			$searchTerm = "%".$_POST['searchTerm']."%";
			
			$query = "select * from product left outer join vendor on  product_vendorid=vendor_id
							   where (product_id=:searchTerm or product_name like :searchTerm or product_type like :searchTerm or vendor_name like :searchTerm or vendor_city like :searchTerm) order by product_id";
			$stmt = $dbh->prepare($query);
			$stmt->bindParam(':searchTerm', $searchTerm);
    		$stmt->execute();
    	
	}
		
else{
			
 			$query = "select * from product left outer join vendor on  product_vendorid=vendor_id
						order by product_id";
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
<title>Products - FulFill App</title>

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
	window.location.href = "product_insert.php"
	}


function resets(){
	window.location.href = "product.php"
	}
	

	function deleteConfirm(id)
	{
		var result = confirm("Want to delete?");
		
		if(result == true)
		{	
			this.document.deleteForm.action = "delete.php?id="+id+"&type=product";
			
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
     <form name="search-form" id="search-form" class="form-inline" role="form" enctype="multipart/form-data" method="post" action="products.php">
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
            <th width=5%>#</th>
            <th width=10%>Name</th>
            <th width=10%>Type</th>
            <th width=10%>Price</th>
            <th width=20%>Vendor Info</th>
            <th width=20%>Display</th>
            <th width=10%>Action</th>
           
          </tr>
        </thead>
        <tbody>
        
        
        
          <?php
		
								
		
			while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$id = $result['product_id'];
			$name=$result['product_name'];
			$type=$result['product_type'];
			$price=$result['product_price'];
			$address = "ID: ".$result['vendor_id']."<br>"."Name: ".$result['vendor_name']."<br>"."Store No: ".$result['vendorstore_no']."<br> "."Address: ".$result['vendor_address']."<br> "."Zip: ".$result['vendor_zip'];
    		$display = $result['product_display'];
		
			echo "
          <tr>
            <td>{$id}</td>
        				
        				
      					<td>${name}</td>
						<td>${type}</td>
						<td>${price}</td>
						<td>${address}</td>
						<td>${display}</td>
						
		    <td><a href='#' onclick='return deleteConfirm(${id});' > Delete </a>
			<a href='product_update.php?id={$id}'>Update</a></td>
   
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