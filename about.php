<?php

session_start();
include("function/DatabaseQuery.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Online UL Chess CLub</title> 
   <link rel="stylesheet" href="about.css">

</head>

<body>
   
<div class="header">
<div class="container">
    <div class="navbar">
            <div class="logo">

            <a href="index.php"> <img src="stock/logo.jpg" alt="logo" width="190px"></a>

            </div>
            
    <nav>
      
    <ul id="MenuItems">
        <li> <a href="index.php">HOME </a> </li>
        <li> <a href="tournament.php">TOURNAMENT</a> </li>
        <li> <a href="customer/account.php">ACCOUNT</a> </li>
            <?php
				//check if the user has logged in or not and provide the correct list
				if(!isset($_SESSION['customer_email'])){

					echo" 	<li> <a href='checkout.php'>LOGIN</a> </li>";
		
						}
					else{
					
		
					echo" 	<li> <a href='checkout.php'>CHECKOUT </a> </li>";
				}
		
			?>
           
            <li><a href="about.php">ABOUT US</a></li>
             <!-------------------------check if user is online and if yes removes the admin link/button-------->
             <?php
            //check if the user has logged in or not and provide the correct list
				if(!isset($_SESSION['customer_email'])){

					echo"  <li><a href='admin_area/adminLogin.php' class='btn-admin'> ADMIN </a></li>";
		
						}
					else{
					
		
					echo"";
				}
		
            ?>
            
             <!-------------------------------------check if the user has logged in or not------------------------------>
		 
		 <?php

if(!isset($_SESSION['customer_email'])){

             echo"";

        }
    else{
             echo"<li><a href='logout.php'>LOGOUT</a><li>";
        }
?>
          
        </ul>
       
         
         
          
    </nav>
  
    <a href="cart.php"><img src="stock/cart.png" alt="" width="30px" ></a>

    <img src="stock/menu.png" alt="" width="30px"  height="30px" class="menu" onclick="menutoggle()">

   
             </div>

        
        
         </div>
    </div>
</div>






<!----------------------------------------display product----------------------------------------------->
<div class="small-container">
    
        <div class="row">
         
     
           <h1>About Us</h1>

          
            <ul>
                <li><img src="stock/board.jpg" width =" 100%" alt=""></li>
            
            </ul>

           <p style="font-size:25px; text-align:center;">
               UL chess club is university organisation that is used to host tournament and provide necessarily <br> training 
               for new chess player and expert(Advanced chess player). This organisation was found in <br>  2005 by President of university as he was also 
               a chess player and now is operating under Stanley Mabe as the Leader of the Chess club.
           </p>
        </div>

    </div>
   
    <!-----------------------------footer---------------------->
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-col-1">

                    <h2 align="center" style="padding-bottom:10px; color: black;">Follow us</h2>

                  <a href="https://twitter.com/login?lang=en">  <img src="stock/twitter.png" alt="" width="110px"></a>
                    
                </div>
            </div>
          
            <h2 style="color: black; text-align: center;">&#169; 2020 by wwww.roamcode.co.za</h2>
        </div>
    </footer>


    <!----------------------------js tottle menu---------------------->

<script src="script.js"></script>


</body>
</html>

