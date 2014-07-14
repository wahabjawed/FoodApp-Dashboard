<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php';
include 'header/_user-details.php';




if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	
	$query = "Select * from product where product_id = :ID";
	$sth = $dbh->prepare($query);
	$sth->bindValue(':ID',$id);
	$sth->execute();
	$result = $sth->fetchAll();
	$row = $result[0];
	$pro_id=$row['product_id'];
	$name = $row['product_name'];
	$type = $row['product_type'];
	$price = $row['product_price'];
	$vendor_id = $row['product_vendorid'];
	$display = $row['product_display'];
	
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
  <?php include 'header/menu-top-navigation.php';
  

	if($_POST)
	{
	
		
		
		$name= $_POST['inputName'];
		$type = $_POST['inputType'];
		$price = $_POST['inputPrice'];
		$venID = $_POST['inputVendorID'];
		$display = $_POST['inputDisplay'];
		
		
		try {
			$query = "UPDATE product SET product_name=:name, product_type=:type, product_price=:price, product_vendorid=:ven_id, product_display=:display where product_id = :id";
			
			$sth = $dbh->prepare($query);
			$sth->bindValue(':id',$_GET["id"]);
		    $sth->bindValue(':name',$name);
			$sth->bindValue(':type',$type);
			$sth->bindValue(':price',$price);
			$sth->bindValue(':ven_id',$venID);
			$sth->bindValue(':display',$display);
			$sth->execute() ;
		
			//echo "Product Updated Successfully!";
			header( 'Location: product.php' );
		} catch(PDOException $e) {
		
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="product_update.php?id=<?php echo $_GET['id']; ?>">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">UPDATE PRODUCT</h3>
        </div>
        <div class="panel-body">

          
         <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name"  value="<?php echo $name; ?>"  required>
            </div>
          </div>
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputType" name="inputType" placeholder="Type" value="<?php echo $type; ?>" required>
            </div>
          </div>
          
           <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price" value="<?php echo $price; ?>" required>
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
		
		    if($ven_id==$vendor_id){
			echo "<option value=${ven_id} selected> ${ven_name} </option>";
			}else{
			echo "<option value=${ven_id}> ${ven_name} </option>";
			}
			}
		 ?>
         </select>
            </div>
          </div>
                     <div class="form-group">
            <label for="inputTax" class="col-sm-2 control-label">Display</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDisplay" name="inputDisplay" placeholder="Display" value="<?php echo $display; ?>" required>
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
