<?php

session_start();
include("../function/DatabaseQuery.php");

global $conn;


$id=$_GET["id"];
$dsc="";
$title="";
$price="";
$category="";
$image="";
$productKey="";

$retrieve_pro="select * from product where product_id=$id";

$res=mysqli_query($conn,$retrieve_pro)or die(mysqli_error($conn));

while($row=mysqli_fetch_array($res)){
	
    $title=$row["product_title"];
    $price=$row ["product_price"];
    $category=$row ["product_cats"];
    $dsc=$row ["product_description"];
    $image=$row ["product_image"];
    $productKey=$row["product_keywords"];
	
}

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

		 <p style="font-size:30px;  line height:40px; text-align:center; padding-top:40px"><b> EDIT PRODUCTS </b> </p>
		
		 </div>


		

		 <div class="register" >

		 <form action="" method="POST" enctype="multipart/form-data">

           
<table >

            <tr>
            <td><label for=""> Product Title:</label></td>
            <td> <input type="text"  name="product_title"placeholder="Product Title" value=<?php echo $title ?> class="vinput"></td>
            </tr>

            
            <tr>
            <td><label for=""> Product price:</label></td>
            <td> <input type="text"  name="product_price"placeholder="Product price" class="vinput" value=<?php echo $price ?> ></td>
            </tr>

			
			
            <tr>
           <td><label for="">Product Category:</label></td> 

			<td>
            <select name="product_cats" id="" style="width:300px; height:40px; font-size:20px" class="vinput" disabled >
            <option ><?php echo $category; ?></option>
            </select>

            </td>
		

            </tr>
            

            <tr>
            <td><label for="" > Describe the Product:</label></td>
            <td><textarea name="product_description" cols="35" rows="10" style=" font-size:18px;" placeholder="Describe the Product"  class="vinput" required><?php echo $dsc ;?>  </textarea></td>
            
            </tr>
            
			<tr>
            <td><label for="">Image:</label></td>
            <td><input type="file" name="product_image"  placeholder="Image"  required > 
            </td>
            </tr>
            <td>
            <img src="../<?php  echo $image ;?> " height="200" width="200">
            </td>
             
            

            <tr>
            <td><label for=""> Product keyword:</label></td>
            <td><input type="text"  name="product_keywords"placeholder="Product keyword"class="vinput" value=<?php echo $productKey ?>> </td>
            </tr>
            

            

            

            <tr>
            <td align="center" colspan="2" ><input type="submit" style="float:right" name="update" Value="Update" class="vinput">  </td>
            </tr>
           
           
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





<!-------------------------------------------------------update Products data-------------------------------------->
<?php
		
		$conn;
		 $ip=getIp();

		if(isset($_POST["update"])){
	

     
        $title=$_POST['product_title'];
        $price=$_POST['product_price'];
        $category=$_POST['product_cats'];
        $dsc=$_POST['product_description'];
        $productKey=$_POST['product_keywords'];
        $product_image=$_FILES['product_image']["name"];
        
        $destination="./pictures/".$tm.$product_image;  //image destination
        $destination1="pictures/".$tm.$product_image;   //destination on the table from the database
		
        move_uploaded_file($_FILES["product_image"]["tmp_name"],$destination);
		
	
    $run_update="update product set product_title='$title',product_price='$price',product_description=' $dsc', product_image='$destination'
                ,product_keywords='$productKey' where product_id=$id";
            

		$mysqlupdate=mysqli_query($conn,$run_update)or die(mysqli_error($conn));

			if($mysqlupdate){

			echo"<script> alert('Succefully Updated')</script>";
			echo"<script> window.open('allproduct.php','_self');</script>";

			}
		
		
		}
		?>
		
		 