<?php

session_start();
include("function/DatabaseQuery.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Online UL Chess CLub</title> 
   <link rel="stylesheet" href="index.css">

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



<!----------------------------Single product------------------------>

<?php

		  

///-------------------------------------adding to the cart table

    cart();

function cart(){


    

    if(isset($_GET['add_cart'])){

    global	$conn;
    $conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
    mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

        
        $ip=getIp();
        $pro_id=$_GET['add_cart'];


        

        $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";

        $run_check=mysqli_query($conn,$check_pro)or die(mysqli_error($conn));


        if(mysqli_num_rows($run_check)>0){

            echo "";

        }
        else{

        $insertcart="insert into cart values('$pro_id','$ip' ,'1')";

        $query=mysqli_query($conn,$insertcart)or die(mysqli_error($conn));
        
        echo "<script> window.open('index.php','_self')</script>";

        }

        



    }
}






?>



<!----------------------------------------display product----------------------------------------------->
<div class="small-container">
    
        <div class="row">
         
     <!-------------------------------------------------Customer Page----------------------------->

<div class="register">
	

	

    <?php
    
    
     if(!isset($_SESSION['customer_email'])){

         include('Signup.php');


     }
      else{

         include("payment.php");

     }

     


     ?>

 </div> 
 
 </div>
        

    </div>

</div>



<!---------------------------------Sponsor---------------------------->
<div class="sponsors">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="stock/ul.png" alt="" width="100">
                </div>

                <div class="col-5">
                    <img src="stock/netbank.gif" alt="" width="100">
                </div>

                <div class="col-5">
                    <img src="stock/chessa.png" alt="" width="100">
                </div>
            </div>
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

