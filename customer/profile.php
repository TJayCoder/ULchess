
<!----------------------------------------retrieve customer profile picture  from the database------------------------>
<?php

if($_SESSION['customer_email']){



					
$user=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$user'";
$run_customer=mysqli_query($conn,$get_customer)or die(mysqli_error($conn));
$row_customer=mysqli_fetch_array($run_customer)or die(mysqli_error($conn));

$c_id=$row_customer['customer_id'];
$image=$row_customer['customer_image'];
}

?>

<link rel="stylesheet" href="../tournamentEntry.css">

    <form action="" method="POST" enctype="multipart/form-data">
                <h1>Profile Picture</h1>
    
<table>

<tr>
			<td><label for=""></label></td>
			<td><img src="profile/<?php echo $image; ?>" style="border-radius:20px"  width="200" height="200" alt=""></td>
            </tr>
            
           
            <tr>
			<td><label for="">Image:</label></td>
            <td><input type="file"  name="Image" required></td>
           
            </tr>

           
            

            <tr>
			<td align="center" colspan="2" ><input type="submit" style="float:right" class="btn" name="update" value='Update' >  </td>
			</tr>
		   
		   
</table>
		</form>



<!-------------------------------------------------------update User Profile picture-------------------------------------->
    <?php
		
		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
		mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

		 $ip=getIp();

		if(isset($_POST["update"])){

            $customer_id=$c_id;		//passing the id of the user who logged in to be updated
            $image=$_FILES['Image']['name'];
        $image_tmp=$_FILES['Image']['tmp_name'];
        
        move_uploaded_file($image_tmp,"profile/$image");

        $run_update="update customers set customer_image='$image' where customer_id='$customer_id' ";
    
        $mysqlupdate=mysqli_query($conn,$run_update)or die(mysqli_error($conn));

        if($mysqlupdate){

        echo"<script> alert('Picture Updated')</script>";
        echo"<script> window.open('account.php','_self');</script>";

        }
    
    
    }

    ?>  