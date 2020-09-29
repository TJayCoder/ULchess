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
         <div class="content_area" style="padding-bottom:300px">



		
<!-----------------------------------------------display all product--------------------------------->
		 <div class="register" align="center">

         <p style="font-size:30px;  line height:40px; text-align:left;padding-bottom:30px;  padding-top:40px"><b> Orders Paid</b> </p>

		 <form action="" method="POST" enctype="multipart/form-data">

             <style>
        table, th, td {
         border: 4px solid black;
        }
            </style>




<table style="width:1000px">
<thead>
  <tr align='center' style='font-size:20px'>
      <th>#</th>
    <th>Name</th>
    <th>Surname</th> 
    <th>Email</th>
    <th>List of Items </th>
    <th>Total Price</th>
    
	  
  </tr>
  </thead>
  <tbody>
   
   <?php
   
 
  

     
	   echo "<tr align='center' style='font-size:22px'>";
	   
		echo "<td align='center'>";    	echo "</td>";
        echo "<td align='center'>";     echo "</td>";
        echo "<td align='center'>";     echo "</td>";
        echo "<td align='center'>"; 	echo "</td>";
        echo "<td align='center'>";     echo "</td>";
        echo "<td align='center'>"; echo"R";    echo "</td>";
    
        
        

		
	   
	    echo "</tr>";
	   

   
   ?>
   
  </tbody>
  
  
  
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