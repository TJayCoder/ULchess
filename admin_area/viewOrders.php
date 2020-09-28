<?php

session_start();

?>

<!Doctype html/>
<html >


<head>

<title>Online UL Chess CLub</title>
<link rel="stylesheet" href="insertProduct.css">

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
        <li> <a href="allproduct.php">VIEW ALL PRODUCTS</a> </li>
        <li> <a href="customerAcc.php">CUSTOMER ACCOUNTS </a> </li>
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
         <div class="content_area" style="padding-bottom:400px">

		 <div id="shopping_cart">
         <h2 align="center" style="font-size:30px;">View Orders</h2>
		 <p style="font-size:30px;  line height:40px;padding-top:100px; text-align:left; ">
         
         <br>
         <b >
          Will be avaliable once the payment gateway is implemented!! </b> </p>
		
		 </div>


		

		 <div class="register">

		 <form action="insertProduct.php" method="POST" enctype="multipart/form-data">

           

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