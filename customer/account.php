<?php

session_start();
include("function/DatabaseQuery.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Online UL Chess CLub</title> 
   <link rel="stylesheet" href="account.css">

</head>

<body>
   
<div class="header">
<div class="container">
    <div class="navbar">
            <div class="logo">

                <a href="../index.php"> <img src="../stock/logo.jpg" alt="logo" width="190px"></a>

            </div>
            
    <nav>
      
        <ul id="MenuItems">
        <li> <a href="../index.php">HOME </a> </li>
        <li> <a href="../tournament.php">TOURNAMENT</a> </li>
        <li> <a href="../customer/account.php">ACCOUNT</a> </li>
            <?php
				//check if the user has logged in or not and provide the correct list
				if(!isset($_SESSION['customer_email'])){

					echo" 	<li> <a href='../checkout.php'>LOGIN</a> </li>";
		
						}
					else{
					
		
					echo" 	<li> <a href='../checkout.php'>CHECKOUT </a> </li>";
				}
		
			?>
         
            <li><a href="../about.php">ABOUT US</a></li>

              <!-------------------------check if user is online and if yes removes the admin link/button-------->
                <?php
            //check if the user has logged in or not and provide the correct list
				if(!isset($_SESSION['customer_email'])){

					echo"  <li><a href='../admin_area/adminLogin.php' class='btn-admin'> ADMIN </a></li>";
		
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
                     echo"<li><a href='../logout.php'>LOGOUT</a><li>";
                }
        ?>
           
          
        </ul>
       
         
         
          
    </nav>
  
    <a href="../cart.php"><img src="../stock/cart.png" alt="" width="60px" ></a>

<img src="../stock/menu.png" alt="" width="60px"  height="60px" class="menu" onclick="menutoggle()">
    </div>
    </div>




<!----------------------------All product------------------------>
<div class="small-container  row-2">


   



        <div class="row">

        <fieldset>
        
        <legend> <h2>My Account </h2></legend>
        <ul>
        <?php

		if(isset($_SESSION['customer_email'])){
					
		$user=$_SESSION['customer_email'];
		$get_img="select * from customers where customer_email='$user'";
		$run_img=mysqli_query($conn,$get_img)or die(mysqli_error($conn));
		$row_img=mysqli_fetch_array($run_img)or die(mysqli_error($conn));
		$c_image=$row_img['customer_image'];
		$c_name=$row_img['customer_name'];
		echo "<li><img src='profile/$c_image' style='border-radius:50px' alt='profile' width='150' height='150' /></li>";

		}else{
			echo "<li style='padding-bottom:80px; color:wheat'><h2>Profile Picture</h2></li>";
		}
	
            ?>
            
            <!----------------------------------------user menu-------------------->

<?php


if(!isset($_SESSION['customer_email'])){

echo "<li><a href='Account.php?my_orders'> View orders</a></li>";

echo" <li><a href='../checkout.php'>Login</a> </li>";

}
    else{
    echo"<li><a href='Account.php?profile'> Profile</a></li>";
    echo "<li><a href='Account.php?my_orders'> View orders</a></li>";
    echo" <li><a href='Account.php?edit_account'> Edit Account</a></li>";
    echo  "<li><a href='Account.php?change_pass'> Change password</a></li>";
    echo"<li><a href='Account.php?delete_account'> Delete Account</a></li>";
    echo" <li><a href='../logout.php'>Logout</a> </li>";
        }
?>


    </ul>
			 
			
        </fieldset>

                <!---------------------------------------------Side menu------------------------>

	<?php


if(!isset($_GET['profile'])){
	if(!isset($_GET['my_orders'])){
		if(!isset($_GET['edit_account'])){

			if(!isset($_GET['change_pass'])){
				if(!isset($_GET['delete_account'])){

					if(isset($_SESSION['customer_email'])){
		
						echo "<h1 style='padding-top:130px;padding-bottom:290px'>Welcome:$c_name  </h1>";
					}else{
						echo "<h1 style='padding-top:130px;padding-bottom:90px'>Welcome: Guest </h1>";
					}
					
					

				}
			}
		}

	}

}

         
		?>

		<?php

		if(isset($_GET['profile'])){

			include('profile.php');
		}

		if(isset($_GET['my_orders'])){

			include('my_orders.php');
		}

		if(isset($_GET['edit_account'])){

			include('edit_account.php');
		}

		if(isset($_GET['change_pass'])){

			include('change_pass.php');
		}

		if(isset($_GET['delete_account'])){

			include('delete_account.php');
		}

		?>



         </div>

</div>


<!---------------------------------Sponsor---------------------------->
    <div class="sponsors">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="../stock/ul.png" alt="" width="100">
                </div>

                <div class="col-5">
                    <img src="../stock/netbank.gif" alt="" width="100">
                </div>

                <div class="col-5">
                    <img src="../stock/chessa.png" alt="" width="100">
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

                    <h2 align="center" style="padding-bottom:10px;">Follow us</h2>

                  <a href="https://twitter.com/login?lang=en">  <img src="../stock/twitter.png" alt="" width="110px"></a>
                    
                </div>
            </div>
          
            <h2 style=" text-align: center;">&#169; 2020 by wwww.roamcode.co.za</h2>
        </div>
    </footer>


    <!----------------------------js tottle menu---------------------->

<script src="../script.js"></script>


</body>
</html>

