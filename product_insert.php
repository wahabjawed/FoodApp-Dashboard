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
<title>Product - FulFill App</title>

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
	
		$name= $_POST['inputName'];
		$type = $_POST['inputType'];
		$price = $_POST['inputPrice'];
		$venID = $_POST['inputVendorID'];
		$display = $_POST['inputDisplay'];
		
		
		try {
			$query = "INSERT INTO product(product_name,product_type,product_price,product_vendorid,product_display) values (:name, :type, :price, :ven_id, :display);";
			//$query += "VALUES(:CompanyName)";
			$sth = $dbh->prepare($query);
			$sth->bindValue(':name',$name);
			$sth->bindValue(':type',$type);
			$sth->bindValue(':price',$price);
			$sth->bindValue(':ven_id',$venID);
			$sth->bindValue(':display',$display);
			
			$sth->execute() ;
		
						echo "
			<div class='alert alert-success' role='alert'>
  <a href='#' class='alert-link'>Product Saved Successfully!</a>
</div>";
		} catch(PDOException $e) {
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" action="product_insert.php">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">ADD PRODUCT</h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputType" name="inputType" placeholder="Type" required>
            </div>
          </div>
          
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price" required>
            </div>
          </div>
          
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Vendor</label>
            <div class="col-sm-10">
            <select class="form-control" id="inputVendorID" name="inputVendorID" required>
               <option value=0> Select Vendor</option>
               <?php 
			   
			 $query = "select * from vendor";
			$stmt = $dbh->prepare($query);
			$stmt->execute();
 
 
 while($result = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				//	$result = $result[0];
			$ven_id = $result['vendor_id'];
		    $ven_name = $result['vendor_name'];
		
		    
			echo "<option value=${ven_id}> ${ven_name} </option>";
			}
		 ?>
         </select>
            </div>
          </div>
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Display</label>
            <div class="col-sm-10">
                     <input type="hidden" name="inputDisplay" value="0" />
            <input type="checkbox" class="form-control" id="inputDisplay" name="inputDisplay" value="1" >                      </div>
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
