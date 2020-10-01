	
<!-------------------------------------------------Payment----------------------------->

<div style="text-align:center; padding-top:90px">

<h3>TOTAL PRICE:</h3>

<input disabled type="text" value = "<?php echo 'R ' . $_SESSION['subtotal']?>"  style="border-radius:20px; text-align:center; font-size:20px; " >

<br>



<a href="https://www.paypal.com/za/signin"> <img src="stock/payc.png" name='pay'  alt="payment" height="110px" > </a>

<!---------------------------------------------------------adding product to user account as paid--------->
<?php

if(isset($_POST['pay'])){

  $ip=getIp();
  global $conn;

$q_cart="select from cart where ip_add='$ip'";

$query=mysqli_query($connn,$q_cart)or die(mysqli_error($conn));

while(q==mysqli_fetch_array(query)){





$totalPrice=$_SESSION['subtotal'];        //assigning  the total price
$date =date("Y/m/d");                     // getting current date
$email=$_SESSION['customer_email'];       //assigning the  email


// retrieving Data of the user logged in
$select_user="select * from customer='$email'";
$userdata=mysqli_query($conn,$select_user)or die(mysqli_error($conn));

while($user=mysqli_fetch_array($userdata)){

$name=$user['customer_name'];
$surname=$user['customer_surname'];


}

//retrive all names of the items added to the cart

 $check_pro="select * from product where  product_id='$pro_id'";

while($user=mysqli_fetch_array($userdata)){



	$productList=$user["product_title"];

}

//inserting all this values to the orders table

$orders="insert into orders values('null','$Name','$surname','$email','$date','$totalPrice','$productList','$ip')";

$insertOrders=mysqli_fetch_array($conn,$orders)or die(mysqli_error($conn));

//check if the query was successful
if($insertOrders){

  echo"<script> alert('Succefully paid')</script>";
  echo"<script> window.open('checkout.php','_self');</script>";



}else{

  echo"<script> alert('Failed')</script>";
  echo"<script> window.open('checkout.php','_self');</script>";

}

}
}





?>




<br>
<br>
<h1>OR</h1>

<h2>Pay at Standard bank</h2>
<hr>
<p style ="font-size:24px;   font-family: 'Courier New', Courier, monospace;">
  <b> Account No:  </b> 294719434
  <br>
  <b> ORGANISATION:</b> University Of Limpopo Chess Club
  <br>
  <b> REF: </b>  Name and ID number
  <br>
  <b> Email Proof of Payment: </b> Senyolotj@gmail.com
</p>


<img src="delivery.gif" alt="Delivery Animation">

</div>


       