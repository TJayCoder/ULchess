<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en" >
<head>
    <title>UL Chess Club</title>
    <link rel="stylesheet" href="adminLogin.css">
</head>

<body>

<header>



</header>
    
        <div class="Mainmenu">
          <h1>Welcome To login Page Admin</h1>

          <form action="" method="POST" enctype="multipart/form-data">

            <div>
               
                <input type="text" name="email" placeholder="Username/Email" required>
            </div>
            <div>
               
                <input type="password"  name="password" placeholder="Password" required>
            </div>
        <br>
           <Button type="submit" name="login">Login</Button>
            <br>
          </form>
        </div>

       


    <footer> Brought to you by RoamCode PTY(LTD)  </footer>
</body>


</html>


<!-------------------------------------------------admin Login Page--------------------------------------------------------->

<?php


		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
            mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));
            

if(isset($_POST['login'])){
      $email=$_POST['email'];
      $pass=$_POST['password'];

   

      $select_admin="select * from admin where   email='$email' AND password='$pass'";

      $run_queryLogin=mysqli_query($conn,$select_admin);

      $check_admin=mysqli_num_rows($run_queryLogin);

      if($check_admin==0){

            echo"<script>alert('Password or email incorrect');</script> ";
            exit();
      }

     
      
      if($check_admin>0){

      

      echo"<script> alert('LOGGED IN SUCCESSFULLY');</script>";
      echo"<script> window.open('../insertProduct.php','_self');</script>";


      }
      



}


?>