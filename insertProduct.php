<?php

session_start();

?>

<!Doctype html/>
<html >


<head>

<title>Online UL Chess CLub</title>
<link rel="stylesheet" href="admin_area/insertProduct.css">

</head>

<body>

<div class="Main-wrapper">



<!---------------------header----------------------->

    <div class="header_wrapper">

        <a href="insertProduct.php"><img id="logo" src="stock/logo.jpg" alt="logo"></a>
        <h1 >Welcome to University of Limpopo Chess Club</h1>
        <h1 ><i> Admin PAGE </i></h1>
    </div>

  


<!------------------content area-------------------------->
    <div class="content_wrapper">

<!----------------menu bar---------------------------->
    <div class="menu_bar">


        <ul>

        <li> <a href="insertProduct.php">INSERT STOCK </a> </li>
        <li> <a href="admin_area/allproduct.php">VIEW ALL PRODUCTS</a> </li>
        <li> <a href="admin_area/customerAcc.php">CUSTOMER ACCOUNTS </a> </li>
        <li> <a href="admin_area/ViewOrders.php">VIEW ORDERS </a> </li>
        <li> <a href="admin_area/tournaments.php">VIEW TOURNAMENTS </a> </li>
       

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

		 <p style="font-size:30px;  line height:40px; text-align:center; padding-top:40px"><b> WELCOME ADMIN! </b> </p>
		
		 </div>


		

		 <div class="register">

		 <form action="insertProduct.php" method="POST" enctype="multipart/form-data">

           
<table >

            <tr>
            <td><label for=""> Product Title:</label></td>
            <td> <input type="text"  name="product_title"placeholder="Product Title" class="vinput"></td>
            </tr>

            
            <tr>
            <td><label for=""> Product price:</label></td>
            <td> <input type="text"  name="product_price"placeholder="Product price" class="vinput"></td>
            </tr>

			
			
            <tr>
           <td><label for="">Product Category:</label></td> 
			<td><select name="product_cats" id="" style="width:300px; height:40px; font-size:20px" class="vinput">

    <?php 

			$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
			mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

			insert();

			//getting categories from mysql database

		function insert(){

		global $conn;
		$get_cats="select * from categories";
		$run_code=mysqli_query($conn,$get_cats)or die(mysqli_error($conn));

		while($row_cats=mysqli_fetch_array($run_code)){

		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];

		echo"<option value='$cat_id'>$cat_title</option>";
		}
			}

	?>
</td>
		</select>

            </tr>
            

            <tr>
            <td><label for=""> Describe the Product:</label></td>
            <td> <textarea name="product_description" cols="35" rows="10" placeholder="Describe the Product" class="vinput"> </textarea></td>
            </tr>
            
			<tr>
            <td><label for="">Image:</label></td>
            <td><input type="file" name="product_image"  placeholder="Image" >   </td>
            </tr>

            <tr>
            <td><label for=""> Product keyword:</label></td>
            <td><input type="text"  name="product_keywords"placeholder="Product keyword"class="vinput"> </td>
            </tr>
            

            

            

            <tr>
            <td align="center" colspan="2" ><input type="submit" style="float:right" name="register" Value="Submit" class="vinput">  </td>
            </tr>
           
           
</table>
        </form>

		</div>


<?php



//Insert data to the database

$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

if(isset($_POST["register"])){


$product_image=$_FILES['product_image']["name"];
$destination="./pictures/".$product_image;  //image destination
$destination1="pictures/".$product_image;   //destination on the table from the database



move_uploaded_file($_FILES["product_image"]["tmp_name"],$destination);

$myaqlQuery=mysqli_query($conn,"insert into product values('null','$_POST[product_cats]','$_POST[product_title]','$_POST[product_price]','$_POST[product_description]','$destination1','$_POST[product_keywords]')")or die(mysqli_error($conn));;

if($myaqlQuery){
	?>

	<script type="text/javascript"> alert("ADDED Successfully");</script>
	<script type="text/javascript">window.location="insertProduct.php";</script>
	
	<?php

}



}

?>


		 

</div>
		 
		 <!---------------------FOOTER----------------------->
         <div class="footer">
		
		<h2 class="copyright"> &#169; 2020 by wwww.roamcode.co.za </h2>
		
		</div> 
		 
	</div>








</div>

</body>

</html>