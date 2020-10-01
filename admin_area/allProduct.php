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

		 <div id="shopping_cart">

		
		 </div>


		
<!-----------------------------------------------display all product--------------------------------->
		 <div class="register" align="center">

		 <p style="font-size:30px;  line height:40px; text-align:left;padding-bottom:30px;  padding-top:40px "><b> All PRODUCTS! </b> </p>


		 <form action="" method="POST" enctype="multipart/form-data">

             <style>
        table, th, td {
         border: 4px solid black;
        }
            </style>




<table style="width:1200px;">
<thead>
  <tr>
      <th>ID</th>
    <th>Title</th>
    <th>Image</th> 
    <th>Price</th>
	 <th>Edit</th>
	  <th>Delete</th>
	  
  </tr>
  </thead>
  <tbody>
   
   <?php
   
   $conn;
   
   $viewPro_query="select * from product";
   $query=mysqli_query($conn, $viewPro_query);
   
   while($row=mysqli_fetch_array($query)){

        $image=$row["product_image"];
	   
	   echo "<tr align='center' style='font-size:20px'>";
	   
		echo "<td align='center'>";   echo $row["product_id"];     	echo "</td>";
        echo "<td align='center'>";   echo $row["product_title"]; echo "</td>";
        echo "<td align='center'>"; ?> <img src="../<?php  echo $image;  ?> " height="200" width="200"><?php   echo "</td>";

        echo "<td align='center'>"; echo $row["product_price"];    	 echo "</td>";
        

	
		echo "<td align='center'>"; ?> 
         <a href="edit.php?id=<?php echo $row['product_id'];?> "  >

         <button type="button" style="width:100px; height:50px;border-radius:10px">edit </button>

          </a><?php echo "</td>";

		echo "<td align='center'>"; ?>  
        
        <a href="delete.php?id=<?php echo $row['product_id'];?> " >
        <button type="button" style="width:100px; height:50px; border-radius:10px"> delete</button> 
        
         </a><?php echo "</td>";
		
	   
	    echo "</tr>";
	   
   }
   
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