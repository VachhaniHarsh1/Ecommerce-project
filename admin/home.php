<?php
	include 'header.php';
	include "config.php";
?>
 <!--------Menu----------->
    <div class="menu">
        <div class="navbar">
            <div class="navbar">
                <a href="home.php">Home</a>     
                <div class="dropdown">
                  <button class="dropbtn">Category 
                    <i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                    <a href="insertcat.php">Insert Category </a>
                    <a href="viewcat.php">View Category</a>                   
                  </div>
                </div>
                
                <div class="dropdown">
                    <button class="dropbtn">Product 
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="insertproduct.php">Insert Product</a>
                      <a href="viewproduct.php">View Product</a>            
                    </div>
                </div>  

				<div>
					<a href="registrationclient.php">Registration user</a>  
				</div>
				<div>
					<a href="inqueryview.php">Inquery View</a>  
				</div>
        <div>
					<a href="clientorder.php">Client Order</a>  
				</div>
				<div class="logout">			
					<h2><font color='white'> Welcome Admin :- <?php echo $_SESSION['nam'];?>&nbsp;&nbsp;</font></h2>
				</div>
            </div>         
        </div>
    </div>


    <!--------------Center-------------->
    <div><img src="img/e-commerce-online-shopping.jpg" width="100%" height="380px" /></div>
