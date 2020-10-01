<!----------------------------------------retrieve customer  data from the database------------------------>
<?php

if($_SESSION['customer_email']){



					
	$user=$_SESSION['customer_email'];
	$get_customer="select * from customers where customer_email='$user'";
	$run_customer=mysqli_query($conn,$get_customer)or die(mysqli_error($conn));
	$row_customer=mysqli_fetch_array($run_customer)or die(mysqli_error($conn));

	$c_id=$row_customer['customer_id'];
	$name=$row_customer['customer_name'];
	$email=$row_customer['customer_email'];
	$password=$row_customer['customer_password'];
	$country=$row_customer['customer_country'];
	$city=$row_customer['customer_city'];
	$image=$row_customer['customer_image'];
	$contact=$row_customer['customer_contact'];
	$address=$row_customer['customer_address'];

}

?>
<link rel="stylesheet" href="../tournamentEntry.css">
<!-------------------------------------------------Create Account----------------------------->

<html>

<head>
<link rel="stylesheet" href="style/edit.css">
</head>
	
<form action="" method="POST" enctype="multipart/form-data">
	<h1>Update Account</h1>

		   
<table >

			<tr>

			<td><label for="">Full Name:</label></td>
			<td><input type="text" name="Name" class="vinput" value="<?php echo  $name; ?>">  </td>

			</tr>


			
			<tr>
			<td><label for="">Email:</label></td>
			<td><input type="email"  name="Email" class="vinput" value="<?php echo $email; ?>">  </td>
			</tr>
			
			<tr>
			<td><label for="">Password:</label></td>
			<td><input type="text"  name="Password" class="vinput" value="<?php echo $password; ?>">  </td>
			</tr>
			

			<tr>
			<td><label for="">Country:</label></td>
			<td>
				 <select name="Country" id="country" style="width:300px; height:40px" class="vinput" disabled >


				 <option value="South Africa"><?php echo $country; ?></option>
				

				 </select>

		
		
		
		</td>
			</tr>
			

			<tr>
			<td><label for="">City:</label></td>
			<td><input type="text"  name="City" class="vinput" value="<?php echo $city; ?>">  </td>
			</tr>
			

			<tr>
			<td><label for="">Contact:</label></td>
			<td><input type="text"  name="Contact" class="vinput" value="<?php echo $contact; ?>">  </td>
			</tr>
			

			<tr>
			<td><label for="">Image:</label></td>
			<td><input type="file"  name="Image" required></td>

			</tr>

			<tr>
			<td><label for=""></label></td>
			<td><img src="profile/<?php echo $image; ?>" style="border-radius:20px"  width="150" height="150" alt=""></td>
			</tr>
			

			<tr>
			<td><label for="">Address:</label></td>
			<td> <input name="Address" id="" cols="38" rows="10" class="vinput" value="<?php echo $address; ?>"> </td>
			</tr>

			

			<tr>
			
			<td align="center" colspan="2" ><input type="submit"  class="btn" style="float:right" name="update" value='Update' >  </td>
			</tr>
		   
		   
</table>
		</form>

		</html>

<!-------------------------------------------------------update User data-------------------------------------->
        <?php
		
		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
		mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

		 $ip=getIp();

		if(isset($_POST["update"])){
	

		$customer_id=$c_id;		//passing the id of the user who logged in to be updated

		$name=$_POST['Name'];
		$email=$_POST['Email'];
		$password=$_POST['Password'];
	
		$city=$_POST['City'];

		
		$image=$_FILES['Image']['name'];
		$image_tmp=$_FILES['Image']['tmp_name'];


		$contact=$_POST['Contact'];
		$address=$_POST['Address'];

		move_uploaded_file($image_tmp,"profile/$image");
		
	
			$run_update="update customers set customer_name='$name', customer_email='$email', customer_password='$password',
						  customer_city='$city',customer_contact='$contact',
						 customer_image='$image', customer_address='$address' where customer_id='$customer_id' ";
			
		$mysqlupdate=mysqli_query($conn,$run_update)or die(mysqli_error($conn));

			if($mysqlupdate){

			echo"<script> alert('Succefully Updated')</script>";
			echo"<script> window.open('account.php','_self');</script>";

			}
		
		
		}
		?>
		
		 