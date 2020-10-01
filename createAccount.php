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
  
	<a href="cart.php"><img src="stock/cart.png" alt="" width="60px" ></a>

<img src="stock/menu.png" alt="" width="60px"  height="60px" class="menu" onclick="menutoggle()">
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
         

        <div class="register">
	
<form action="createAccount.php" method="POST" enctype="multipart/form-data">
	<h1>Register Account</h1>

		   
<table >

			<tr>

			<td><label for="">Full Name:</label></td>
			<td><input type="text" name="Name" class="vinput" required>  </td>

			</tr>


			
			<tr>
			<td><label for="">Email:</label></td>
			<td><input type="email"  name="Email" class="vinput"required>  </td>
			</tr>
			
			<tr>
			<td><label for="">Password:</label></td>
			<td><input type="password"  name="Password" class="vinput" required>  </td>
			</tr>
			

			<tr>
			<td><label for="">Country:</label></td>
			<td>
				 <select name="Country" id="country" style="width:300px; height:40px" class="vinput">
				 <option value="South Africa">South Africa</option>
				 <option value="Botswana">Botswana</option>
				 <option value="Swaziland">Swaziland</option>
				 <option value="Ghana">Ghana</option>
				 <option value="Lesotho">Lesotho</option>
				 <option value="Namibia">Namibia</option>

				 </select>

		
		
		
		</td>
			</tr>
			

			<tr>
			<td><label for="">City:</label></td>
			<td><input type="text"  name="City" class="vinput" required>  </td>
			</tr>
			

			<tr>
			<td><label for="">Contact:</label></td>
			<td><input type="text"  name="Contact" class="vinput" required>  </td>
			</tr>
			

			<tr>
			<td><label for="">Image:</label></td>
			<td><input type="file"  name="Image" class="btn" >  </td>
			</tr>



			<tr>
			<td><label for="">Security Question:</label></td>
			<td><input type="text"  name="Security" class="vinput" placeholder="WHERE WERE YOU BORN?" required>  </td>
			</tr>


			<tr>
			<td><label for="">Address:</label></td>
			<td> <textarea name="Address" id="" cols="38" rows="10"></textarea> </td>
			</tr>

			<tr>
			
			<td align="center" colspan="2" ><input type="submit" class="btn" style="float:right" name="register" >  </td>
			</tr>
		   
		   
</table>
		</form>


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