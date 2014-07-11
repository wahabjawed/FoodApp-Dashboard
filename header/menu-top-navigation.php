<?php
echo"
	  <div class='masthead'>
   <center> <h2 class='text-muted'>FulFill - Administrative Panel</h2></center>
    <nav id='myNavbar' class='navbar navbar-default' role='navigation'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='#'>FulFill</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                <ul class='nav navbar-nav'>
                    <li><a href='index.php'>Home</a></li>
                     <li class='dropdown'>
                        <a href='#' data-toggle='dropdown' class='dropdown-toggle'>Setup <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
						    <li><a href='country.php'>Country</a></li>
                            <li><a href='currency.php'>Currency</a></li>
							<li><a href='customer.php'>Customer</a></li>
							<li><a href='edu.php'>EDU</a></li>
							<li><a href='employee.php'>Employees</a></li>
                            <li><a href='products.php'>Product</a></li>
                            <li><a href='location.php'>Location</a></li>
							<li><a href='#'>Location Cordinate</a></li>
							<li><a href='state.php'>State</a></li>
							<li><a href='status.php'>Status</a></li>
							<li><a href='vendor.php'>Vendor</a></li>
                            <li class='divider'></li>
                            <li><a href='#'>Statistics</a></li>
							<li><a href='#'>Logs</a></li>
                        </ul>
                    </li>";
					
					
					
			
                echo" </ul>
                <ul class='nav navbar-nav navbar-right' style='margin-right:0px;'>
                    <li class='dropdown'>
                        <a href='#' data-toggle='dropdown' class='dropdown-toggle'>${_name} <b class='caret'></b></a>
                        <ul class='dropdown-menu'>";
                          if($typeID==1){
							  
							echo"    <li><a href='user_management.php'>User Management</a></li>";
						  }
							echo "<li><a href='user_update.php?id=1&direct=index.php'>Update Profile</a></li>
                            <li class='divider'></li>
                            <li><a href='login.php?logout=true'>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>";
	
	
		
	
?>


