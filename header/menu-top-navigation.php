<?php


	
    	echo "
		
		  <div class='masthead'>
   <center> <h3 class='text-muted'>Contact Management</h3></center>
    <ul class='nav nav-justified'>
      <li ><a href='index.php'>Home</a></li>
      <li ><a href='member.php'>Member</a></li>
      <li ><a href='company.php'>Company</a></li>
      <li ><a href='search_company.php'>Search Company</a></li>
      <li><a href='search_member.php'>Search Member</a></li>";
      
	  if($canManage==1){
	  echo "<li><a href='user_management.php'>User Management</a></li>";
	  }
	   echo "<li><a href='login.php?logout=true'>Logout</a></li>";

	echo"</ul>
  </div>";
         	
	
	
?>

