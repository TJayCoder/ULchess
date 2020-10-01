<?php

session_start();
include("function/DatabaseQuery.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Online UL Chess CLub</title> 
   <link rel="stylesheet" href="tournamentEntry.css">

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
					
		
					echo "";
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
	
    <h2>Forgot Password</h2>
    <br>
    
    <form action="" method="POST">
    
    <input type="email"placeholder="Enter email" name='email' class="vinput" required>
    <br>
    <br>
    <input type="text"placeholder="WHERE WERE YOU BORN?" name='security' class="vinput" required>
    <br>
    <br>
    <input type="submit" name='reset' value="Reset" class="btn">
    
    </form>
    
             
    
            </div> 
        
    
    <!----------------------------------------------------------Forgot Password------------------------------->
            <?php
    
    
    $conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
        mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));
        
    
    if(isset($_POST['reset'])){
    $email=$_POST['email'];
    $security=$_POST['security'];
    
    $select_C="select * from customers where   customer_email='$email' AND Security='$security'";
    
    $run_queryLogin=mysqli_query($conn,$select_C);
    
    $check_customer=mysqli_num_rows($run_queryLogin);
    
    if($check_customer==0){
    
        echo"<script>alert('Email or Security Question is incorrect');</script> ";
        echo"<script>alert('Take Note the Program is Case sensitive');</script> ";
        exit();
    }
    else{
    $_SESSION['customer_email']=$email;
    echo"<script> alert('Correct Security details');</script>";
    echo"<script> window.open('reset.php','_self');</script>";
    
    
    }
    
    
    
    
    }
    
    
    ?>
    


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

                    <h2 align="center" style="padding-bottom:10px;">Follow us</h2>

                  <a href="https://twitter.com/login?lang=en">  <img src="stock/twitter.png" alt="" width="110px"></a>
                    
                </div>
            </div>
          
            <h2 style=" text-align: center;">&#169; 2020 by wwww.roamcode.co.za</h2>
        </div>
    </footer>



    <!----------------------------js tottle menu---------------------->

<script src="script.js"></script>


</body>
</html>

<!--------------------------------create account---------------------->

<?php
		
		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
		mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

		 $ip=getIp();

		if(isset($_POST["register"])){
	
		
		$name=$_POST['Name'];
		$email=$_POST['Email'];
		$password=$_POST['Password'];
		$country=$_POST['Country'];
		$city=$_POST['City'];
		$image=$_FILES['Image']['name'];
		$image_tmp=$_FILES['Image']['tmp_name'];

		$contact=$_POST['Contact'];
		$address=$_POST['Address'];
		$security=$_POST['Security'];


		move_uploaded_file($image_tmp,"customer/profile/$image");
		
	
			$run_insert="insert into customers values('NULL','$ip','$name','$email','$password','$country','$city','$contact','$image','$address','$security')";
			
		$mysqlQuery=mysqli_query($conn,$run_insert)or die(mysqli_error($conn));


		$sel_cart="select * from cart where ip_add='$ip'";

		$run_cart=mysqli_query($conn,$sel_cart)or die(mysqli_error($conn));

		$check_cart=mysqli_num_rows($run_cart);

		//----------------------check if the person has product or not----------------------------->//
	
		if($check_cart==0){


			$_SESSION['customer_email']=$email;
			echo"<script> alert('Registration is Successful, Account has been created')</script>";
			echo"<script> window.open('customer/account.php','_self');</script>";
		
		}else{


			$_SESSION['customer_email']=$email;
			echo"<script> alert('Registration is Successful, Account has been created');</script>";
			echo"<script> window.open('checkout.php','_self');</script>";

		}
	
		
		}
		?>