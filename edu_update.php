<?php

include 'header/checkloginstatus.php'; 
include 'header/connect_database.php';
include 'header/_user-details.php';




if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	
	
	$query = "Select * from edu where edu_id = :ID";
	$sth = $dbh->prepare($query);
	$sth->bindValue(':ID',$id);
	$sth->execute();
	$result = $sth->fetchAll();
	$row = $result[0];
	$location_id=$row['edu_id'];
	$name = $row['edu_name'];
	$code = $row['display'];
	
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
<title>EDU - FulFill App</title>

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
	
		
		
		$name = $_POST['inputName'];
		$code = $_FILES["file"]["name"];
		
		include 'header/image_upload.php';	

	if(empty($UploadedImg)){
		$imgGet = $_GET['img'];
		$code = $imgGet;
		}else{
		$code = $UploadedImg;	
		}
		
		
		try {
			$query = "UPDATE edu SET edu_name=:name,display=:code where edu_id = :id";
			
			$sth = $dbh->prepare($query);
			$sth->bindValue(':id',$_GET["id"]);
			$sth->bindValue(':code',$code);
			$sth->bindValue(':name',$name);
			$sth->execute() ;
		
			echo "EDU Updated Successfully!";
			//header( 'Location: location.php' );
		} catch(PDOException $e) {
		
			die('Could not save to the database:<br/>' . $e);
		}
	}
?>
  
  <!-- Jumbotron -->
  <div class="jumbotron">
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="edu_update.php?id=<?php echo $_GET['id']; ?>&img=<?php echo $code; ?>">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">UPDATE EDU</h3>
        </div>
        <div class="panel-body">

          
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="<?php echo $name;?>" required>
            </div>
          </div>
           
           <div class="form-group">
            <label for="inputUName" class="col-sm-2 control-label">Display</label>
            <div class="col-sm-10">
          <input type="file" value="<?php echo $code;?>" name="file" id="file"/>            </div>
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
