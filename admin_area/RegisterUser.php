<?php

session_start();
include("../function/DatabaseQuery.php");

?>

<!Doctype html/>
<html >


<head>

<title>Online UL Chess CLub</title>
<link rel="stylesheet" href="allproduct.css">

</head>

<body>

<div class="Main-wrapper">



<!---------------------header----------------------->

    <div class="header_wrapper">

    <a href="../insertProduct.php"><img id="logo" src="stock/chess.jpg" alt="logo"></a>
        <h1 >Welcome to University of Limpopo Chess Club</h1>
        <h1 ><i> Admin PAGE </i></h1>
    </div>

  


<!------------------content area-------------------------->
    <div class="content_wrapper">

<!----------------menu bar---------------------------->
    <div class="menu_bar">


        <ul>

		<li> <a href="../insertProduct.php">INSERT STOCK </a> </li>
		<li> <a href="RegisterUser.php">REGISTER USER </a> </li>
		<li> <a href="customerAcc.php">CUSTOMER ACCOUNTS </a> </li>
        <li> <a href="allproduct.php">VIEW ALL PRODUCTS</a> </li>
        <li> <a href="ViewOrders.php">VIEW ORDERS </a> </li>
        <li> <a href="tournaments.php">VIEW TOURNAMENTS </a> </li>
       


       

    <?php
        if(!isset($_SESSION['admin_email'])){

            echo"<li> <a class='log' style='float:right; font-size:24px; padding:0px;' href='logout.php'>Logout</a></li> ";
            
            }
    ?>
           
            

           

        </ul>

      

    </div>




<!-------------------CONTENT AREA------------------------->
         <div class="content_area">

		


        
<!-----------------------------------------------display all product--------------------------------->
		 <div class="register" align="center">
       
         <form action="" method="POST" enctype="multipart/form-data">
	      

        
<table >
<h1 style="padding-top:30px;padding-bottom:30px;  text-align: left;">Register Admin User</h1>

			<tr>

			<td><label for="">Name:</label></td>
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
			<td><label for="">Position</label></td>
			<td>
				 <select name="Position" id="Position" style="width:300px; height:40px" class="vinput">
				 <option value="Developer">Developer</option>
				 <option value="Administrator">Administrator</option>
				 <option value="CEO">CEO</option>
				 <option value="Manager">Manager</option>
				
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
		 
		 <!---------------------FOOTER----------------------->
         <div class="footer">
		
		<h2 class="copyright"> &#169; 2020 by wwww.roamcode.co.za </h2>
		
		</div> 
		 
</div>








</div>

</body>

</html>



<!--------------------------------create Admin account---------------------->

<?php
		
		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
		mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

		 $ip=getIp();

		if(isset($_POST["register"])){
	
		
		$name=$_POST['Name'];
		$email=$_POST['Email'];
		$password=$_POST['Password'];
		$position=$_POST['Position'];
		$city=$_POST['City'];
		$contact=$_POST['Contact'];
		$address=$_POST['Address'];

	
			$run_insert="insert into admin values('NULL','$email','$password','$name','$position','$city','$contact','$address')";
			
		$mysqlQuery=mysqli_query($conn,$run_insert)or die(mysqli_error($conn));


		$sel_cart="select * from admin";

		$run_cart=mysqli_query($conn,$sel_cart)or die(mysqli_error($conn));

		$check_cart=mysqli_num_rows($run_cart);

		//----------------------check if the person has product or not----------------------------->//
	
		if($check_cart==0){


			$_SESSION['customer_email']=$email;
			echo"<script> alert('Registration is Successful, Account has been created')</script>";
			echo"<script> window.open('../insertProduct.php','_self');</script>";
		
		}else{


			$_SESSION['customer_email']=$email;
			echo"<script> alert('Registration is Successful, Account has been created');</script>";
			echo"<script> window.open('RegisterUser.php','_self');</script>";

		}
	
		
		}
		?>