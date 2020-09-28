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
  
    <a href="cart.php"><img src="stock/cart.png" alt="" width="30px" ></a>

    <img src="stock/menu.png" alt="" width="30px"  height="30px" class="menu" onclick="menutoggle()">

   
             </div>

        
        
         </div>
    </div>
</div>






<!----------------------------------------display product----------------------------------------------->
<div class="small-container">
    
        <div class="row">
         
        <form action="" method="POST" enctype="multipart/form-data">
	<h1 align='center' style="margin-bottom:22px">Enter Tournament</h1>

		   
<table >

			<tr>

			<td><label for="">Name:</label></td>
			<td><input type="text" name="Name" class="vinput" required>  </td>

			</tr>

			<tr>
			<td><label for="">Surname:</label></td>
			<td><input type="text"  name="Surname" class="vinput" required>  </td>
			</tr>
			
			
			<tr>
			<td><label for="">Email:</label></td>
			<td><input type="email"  name="Email" class="vinput" required>  </td>
			</tr>
			
			<tr>
			<td><label for="">Chess id:</label></td>
			<td><input type="text"  name="Chess_id" class="vinput"required>  </td>
			</tr>




			<tr>
			<td><label for="">Tournament Name:</label></td>
			<td>
				 <select name="tournament_name" id="Institution" style="width:300px; height:40px" class="vinput">
				 
				 <?php 
        
        
     		  global $conn;
     		   getTournament();

            //getting categories from mysql database

            function getTournament(){

            global $conn;
            $get_cats="select * from tournament_names";
            $run_code=mysqli_query($conn,$get_cats)or die(mysqli_error($conn));

            while($row_cats=mysqli_fetch_array($run_code)){

            $cat_id=$row_cats['tournament_id'];
            $cat_title=$row_cats['tournament_cats'];

           
            echo"<option value='$cat_title'> $cat_title</option>";
          
            
			}
			
            }
        
       		 ?>
				 </select>

		
		
		
		</td></tr>

			<tr>
			<td><label for="">Date of Birth:</label></td>
			<td><input type="date"  name="Date_of_birth" class="vinput" required>  </td>
			</tr>
			

			<tr>
			<td><label for="">Institution:</label></td>
			<td>
				 <select name="Institution" id="Institution" style="width:300px; height:40px" class="vinput">
				 <option value="University of Limpopo">University of Limpopo</option>
				 <option value="University of Venda">University of Venda</option>
				 <option value="Capricorn College">Capricorn College</option>
				 <option value="RoseBank">RoseBank</option>
				 <option value="Lebowakgomo College">Lebowakgomo College</option>
				 <option value="Other">Other</option>

				 </select>

		
		
		
		</td></tr>
			

			<tr>
			<td><label for="">Chess Ratings:</label></td>
			<td><input type="text"  name="Rating" class="vinput" required>  </td>
			</tr>
			

			<tr>
			
			<td align="center" colspan="2" ><input type="submit" class="btn" value="REGISTER" style="float:right" name="register" >  </td>
			</tr>
		   
		   
</table>
		</form>
       
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
<!--------------------------------------insert tournament entry----------------->
<?php
		
		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
		mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

	
		if(isset($_POST["register"])){
	
		
		$name=$_POST['Name'];
		$surname=$_POST['Surname'];
		$email=$_POST['Email'];
		$chess_id=$_POST['Chess_id'];
		$tournament_Name=$_POST['tournament_name'];
		$Date_of_birth=$_POST['Date_of_birth'];
		$instition=$_POST['Institution'];
		$rating=$_POST['Rating'];


		
	
		$run_insert="insert into tournament_entry values('NULL','$name','$surname','$chess_id','$Date_of_birth','$email','$instition','$rating','$tournament_Name')";
			
		$mysqlQuery=mysqli_query($conn,$run_insert)or die(mysqli_error($conn));

			if($mysqlQuery){

			echo"<script> alert('Registration Successful. Thank you !! more information will be sent to you via Email');</script>";
			echo"<script> window.open('tournament.php','_self');</script>";
			}
		
		}
		?>
		