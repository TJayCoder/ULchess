<?php

session_start();
include("../function/DatabaseQuery.php");

?>

<!Doctype html/>
<html >


<head>

<title>Online UL Chess CLub</title>
<link rel="stylesheet" href="customerAcc.css">

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


		

		 <div class="register">

		 <p style="font-size:30px;  line height:40px; text-align:left;padding-bottom:30px;  padding-top:40px"><b> Customers Details! </b> </p>


		 <form action="" method="POST" enctype="multipart/form-data">

         <style>
table, th, td {
border: 5px solid black;
}
</style>




<table style="width:1000px">
<thead>
<tr>
<th>ID</th>
<th>Customer Name</th>
<th>Customer Email</th> 
<th>Customer Country</th>
<th>Customer City</th>
<th>Customer Contact</th>
<th>Customer Picture</th>
<th>Customer Address</th>


</tr>
</thead>
<tbody>

<?php

$conn;

$viewCustomer_query="select * from customers";
$query=mysqli_query($conn,  $viewCustomer_query);

while($row=mysqli_fetch_array($query)){

$image=$row["customer_image"];

echo "<tr align='center' style='font-size:22px'>";

echo "<td align='center'>";   echo $row["customer_id"];     	echo "</td>";
echo "<td align='center'>"; echo $row["customer_name"];    	 echo "</td>";
echo "<td align='center'>";   echo $row["customer_email"]; echo "</td>";


echo "<td align='center'>"; echo $row["customer_country"];    	 echo "</td>";

echo "<td align='center'>"; echo $row["customer_city"];    	 echo "</td>";
echo "<td align='center'>"; echo $row["customer_contact"];    	 echo "</td>";

echo "<td align='center'>"; ?> <img src="../customer/profile/<?php  echo $image ;?> "  width="100%" style="border-radius:50px"><?php   echo "</td>";
echo "<td align='center'>"; echo $row["customer_address"];    	 echo "</td>";





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