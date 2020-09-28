
<link rel="stylesheet" href="../tournamentEntry.css">

	
<form action="" method="POST" enctype="multipart/form-data">
	<h1>Change Password</h1>

		   
<table >

			<tr>

			<td><label for="">Current password:</label></td>
			<td><input type="text" name="password" class="vinput" value="" required>  </td>

			</tr>


			
			<tr>
			<td><label for="">New Password:</label></td>
			<td><input type="text"  name="n_password" class="vinput" value="" required>  </td>
            </tr>

            <tr>
			<td><label for="">Conform New Password:</label></td>
			<td ><input type="text"  name="repeatN_pass" class="vinput" value="" required>  </td>
            </tr>
            
            <tr>
			
			<td align="center" colspan="2" ><input type="submit" class="btn" style="float:right; font-size:23px" name='changeP' Value="Change Password" >  </td>
			</tr>
</table>

<!------------------------------------------------------change password--------------------------------------------------------------->

</form>


<?php



if (isset($_POST['changeP'])){

	$user=$_SESSION['customer_email'];

	$passC=$_POST['password'];
	$passnew=$_POST['n_password'];
	$passagain=$_POST['repeatN_pass'];

	$sel_password="select * from customers where customer_password='$passC'  AND  customer_email='$user'";

	$run_pass=mysqli_query($conn,$sel_password);
	$check_row=mysqli_num_rows($run_pass);

	if($check_row==0){

		echo "<script>alert('incorrect password');</script>";
		exit();

	}

	if($passnew != $passagain){

		echo "<script>alert('New Password Do Not Match!');</script>";
		exit();

	}else{

		$update_pass="update customers set customer_password='$passnew' where  customer_email='$user'";
		$run_update=mysqli_query($conn,$update_pass);

		if($run_update){
			echo "<script>alert('New Password Updated. Thank you');</script>";
			echo "<script>window.open('account.php','_self');</script>";

		}



	}



}


?>