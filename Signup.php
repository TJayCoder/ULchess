<!Doctype html/>
<html >


<head>
<link rel="stylesheet" href="signup.css">

</head>






<!-------------------CONTENT AREA------------------------->
<div class="content_area">

<!-------------------------------------------------Gettting User ip address----------------------------->


<div class="area">
          <h1>Login</h1>
            <br>
          <form action="" method="POST">

            
               
                <input type="email" placeholder="Username/Email" name="email" required>
            
               <br>
                <input type="password" placeholder="Password"  name="password" required>
       <br>
            <input class="buttons" type='submit' name="login" value='Login' style=" margin-bottom: 35px;
                               height: 50px; width: 500px; background-color: wheat; border-radius: 20px;">
           <br>
           <Button  class="buttons"><a class="buttons" href="createAccount.php"> Create Account </a></Button> 
            <br>
           <Button class="buttons"><a class="buttons" href="forgotpassword.php"> Forgot Password </a></Button>
             


          </form>
    


</div>

</div>



</html>


<?php


		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
            mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));
            

if(isset($_POST['login'])){
      $email=$_POST['email'];
      $pass=$_POST['password'];

      $select_C="select * from customers where   customer_email='$email' AND customer_password='$pass'";

      $run_queryLogin=mysqli_query($conn,$select_C);

      $check_customer=mysqli_num_rows($run_queryLogin);

      if($check_customer==0){

            echo"<script>alert('Password or email incorrect');</script> ";
            exit();
      }

     
     $ip=getIp();
      $get_cart="select * from cart where ip_add='$ip'";

      $run_cart=mysqli_query($conn,$get_cart)or die(mysqli_error($conn));

      $check_cart=mysqli_num_rows($run_cart);
      
      if($check_customer>0 AND $check_cart==0){

      $_SESSION['customer_email']=$email;
      echo"<script> alert('LOGGED IN SUCCESSFULLY');</script>";
      echo"<script> window.open('customer/account.php','_self');</script>";


      }else{

            $_SESSION['customer_email']=$email;
            echo"<script> alert('LOGGED IN SUCCESSFULLY');</script>";
            echo"<script> window.open('checkout.php','_self');</script>";

      }
      



}


?>