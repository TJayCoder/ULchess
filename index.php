<?php

session_start();
include("function/DatabaseQuery.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Online UL Chess CLub</title> 
   <link rel="stylesheet" href="index.css">

</head>

<body>
   
<div class="header">
<div class="container">
    <div class="navbar">
            <div class="logo">

            <a href="index.php"> <img src="stock/logo.jpg" alt="logo" width="190px"></a>

            </div>
            
    <nav>
      
        <ul id="MenuItems">
        <li> <a href="index.php">HOME </a> </li>
        <li> <a href="tournament.php">TOURNAMENT</a> </li>
        <li> <a href="customer/account.php">ACCOUNT</a> </li>
            <?php
				//check if the user has logged in or not and provide the correct list
				if(!isset($_SESSION['customer_email'])){

					echo" 	<li> <a href='checkout.php'>LOGIN</a> </li>";
		
						}
					else{
					
		
					echo" 	<li> <a href='checkout.php'>CHECKOUT </a> </li>";
				}
		
			?>
         
            <li><a href="about.php">ABOUT US</a></li>

              <!-------------------------check if user is online and if yes removes the admin link/button-------->
                <?php
            //check if the user has logged in or not and provide the correct list
				if(!isset($_SESSION['customer_email'])){

					echo"  <li><a href='admin_area/adminLogin.php' class='btn-admin'> ADMIN </a></li>";
		
						}
					else{
					
		
					echo"";
				}
		
            ?>
            
             <!-------------------------------------check if the user has logged in or not------------------------------>
		 
		 <?php

        if(!isset($_SESSION['customer_email'])){

                     echo"";

                }
            else{
                     echo"<li><a href='logout.php'>LOGOUT</a><li>";
                }
        ?>
           
          
        </ul>
       
         
         
          
    </nav>
  
    <a href="cart.php"><img src="stock/cart.png" alt="" width="30px" ></a>

    <img src="stock/menu.png" alt="" width="30px"  height="30px" class="menu" onclick="menutoggle()">

    </div>

    <!----------------------------------header ------------------------------------->
    <div class="row">

        <div class="col-2">
            <h1>
                Welcome to University of Limpopo 
                 Chess Club
                <br>
               
            </h1>
            <p><i> HOW CAN WE HELP YOU?</i></p>
        </div>


        <div class="col-2">
            <img src="stock/board.jpg" alt=""  width="400px" >
        </div>
    </div>

    </div>
</div>

<!----------------------------categories------------------------>
<span style="float:left; font-size:25px; padding:10px; line height:40px">
		 
		
		 <!-------------------------after login change name-------->
		 <?php
		if(isset($_SESSION['customer_email'])){
		
			echo "<b>Welcome  </b>" . $_SESSION['customer_email'];
		}else{
			echo "<b>Welcome Player</b>";
		}
		?>



		<b id="shoppingC" >  Shopping Cart - </b > 
		
	     Total Price: <b style="font-size:30px"> <?php totalprice() ?> </b>
        Total Items:   <b style="font-size:30px"><?php  totalitems() ?> </b>

		</b>
       </span>



<div class="categories">
   
    <div class="small-container">
        <h2 class="title">On Promotion!!</h2>
    <div class="row">

    
    <?php

		  
///-------------------------------------adding to the cart table

    cart();

function cart(){


    

    if(isset($_GET['add_cart'])){

    global	$conn;
    
        $ip=getIp();
        $pro_id=$_GET['add_cart'];
       
    
    

        

        $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";

        $run_check=mysqli_query($conn,$check_pro)or die(mysqli_error($conn));


        if(mysqli_num_rows($run_check)>0){

            echo "";

        }
        else{

                //------------------------------ get the price of the product

    $get_Prodpro="select * from product where product_id ='$pro_id'";
        
    $run_Prodpro=mysqli_query($conn,$get_Prodpro)or die(mysqli_error($conn));


    while($row_Prodprice=mysqli_fetch_array($run_Prodpro)){
        
    $prod_price=$row_Prodprice["product_price"];	

}

    //---------------------------------adding to the cart


        $insertcart="insert into cart values('$pro_id','$ip' ,'1','$prod_price','0')";

        $query=mysqli_query($conn,$insertcart)or die(mysqli_error($conn));
        
        echo    "<script> alert('Added to the Cart');</script>";
        echo "<script> window.open('index.php','_self')</script>";
      

        }

        



    }
}






?>
        <div class="col-3">
                <img src="stock/bag/pngguru.com (11).png" alt="" width="100px">
                <h4>Hoodie</h4>
                <p>R 500</p>
        </div>
        <div class="col-3">
            <img src="stock/chessset/pngguru.com (3).png" alt="" width="100px">
            <h4>Hoodie</h4>
            <p>R 500</p>
        </div>
        <div class="col-3">
            <img src="stock/clocks/pngguru.com (4).png" alt="" width="100px">
            <h4>Hoodie</h4>
             <p>R 500</p>

        </div>

        
        
    </div>
</div>
</div>


<!----------------------------All product------------------------>
<div class="small-container  row-2">

    <h2 class="title">ALL Products</h2>
    
   


        <div class="row">

        <fieldset>
        
        <legend><h2> CATEGORIES</h2></legend>
            <?php 
                                
                                
                                $conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
                                mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));
            
                                getcats();
            
                                    //getting categories from mysql database
            
                                    function getcats(){
                
                                    global $conn;
                                    $get_cats="select * from categories";
                                    $run_code=mysqli_query($conn,$get_cats)or die(mysqli_error($conn));
                
                                    while($row_cats=mysqli_fetch_array($run_code)){
                    
                                    $cat_id=$row_cats['cat_id'];
                                    $cat_title=$row_cats['cat_title'];
                    
                                    echo "<ul class='col-5 category'>";
                                    echo"<li > <a style=' color: white;' href='index.php?cat=$cat_id'>$cat_title</a></li>";
            
                                    echo '</ul>';
                                    }
                                    }
                                
                                ?>
        </fieldset>

     
       

    <?php
      
    //--------------------------------------------------main menu
		display();
		function display(){

		if(!isset($_GET['cat'])){
		
			global	$conn;
				$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
				mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));
		
		$get_pro="select * from product ";
		
		$run_pro=mysqli_query($conn,$get_pro)or die(mysqli_error($conn));
		
		while($row_pro=mysqli_fetch_array($run_pro)){
			
			$pro_id=$row_pro["product_id"];
			$pro_cat=$row_pro["product_cats"];
			$pro_title=$row_pro["product_title"];
			$pro_price=$row_pro["product_price"];	
			$pro_image=$row_pro["product_image"];
			
			
			echo "
				
            <div class='col-4'>
            <a href='productDetails.php ?pro_id=$pro_id'> <img src='$pro_image' class='prod_image' ></a>
				<h4 style='text-align:center; text-transform: uppercase;'>$pro_title</h4>
				

				<p style='text-align:center;'> <b>R $pro_price </b></p>

				<a href='productDetails.php ?pro_id=$pro_id' class='btn' style=' float:left; color:white;  font-size:20px'>Details</a>
                <br>
                <br>
				<a href='index.php ?add_cart=$pro_id'  class='btn' style='padding-left:30px'> Add to Cart </a>

			
			</div>	
				
			
			";
		}
      
		
	}
	
	}


/////---------------------------------------------display Categories

displayCat();

	function displayCat(){

	
		if(isset($_GET['cat'])){

			$cat_id=$_GET['cat'];
		
		
		global	$conn;
		$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
		mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));
	
	$get_Catpro="select * from product where product_cats ='$cat_id'";
	
	$run_catpro=mysqli_query($conn,$get_Catpro)or die(mysqli_error($conn));

	$count_cats=mysqli_num_rows($run_catpro);

	//if no entry

			if($count_cats==0){

				echo "<h1 stye='text-align:center; padding:30px'>No entry</h1>";
			}else{

	
	while($row_catpro=mysqli_fetch_array($run_catpro)){
		
		$pro_id=$row_catpro["product_id"];
		$pro_cat=$row_catpro["product_cats"];
		$pro_title=$row_catpro["product_title"];
		$pro_price=$row_catpro["product_price"];	
		$pro_image=$row_catpro["product_image"];
		
		
		echo "
				
            <div class='col-4'>
            <img src='$pro_image' width='180' height='180' style='border-radius:10px'>
				<h4 style=' text-transform: uppercase;'>$pro_title</h4>
				

				<p > <b>R $pro_price </b></p>
              
				<a href='productDetails.php ?pro_id=$pro_id' class='btn' style=' float:left; color:white;  font-size:20px'>Details</a>
               
				<a href='index.php ?add_cart=$pro_id'  class='btn' style='float: right; padding-left:30px'> Add to Cart </a>

			
			</div>	
				
			
			";
	}
	
}
}
}

	
	
	?>
  
    </div>

</div>


<!---------------------------------Sponsor---------------------------->
    <div class="sponsors">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="stock/ul.png" alt="" width="100">
                </div>

                <div class="col-5">
                    <img src="stock/netbank.gif" alt="" width="100">
                </div>

                <div class="col-5">
                    <img src="stock/chessa.png" alt="" width="100">
                </div>
            </div>
        </div>

    </div>
   
       <!-----------------------------footer---------------------->
       <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-col-1">

                    <h2 align="center" style="padding-bottom:10px;">Follow us</h2>

                  <a href="https://twitter.com/login?lang=en">  <img src="stock/twitter.png" alt="" width="110px"></a>

                </div>
            </div>
          
            <h2 style=" text-align: center;">&#169; 2020 by wwww.roamcode.co.za</h2>
        </div>
    </footer>


    <!----------------------------js tottle menu---------------------->

<script src="script.js"></script>


</body>
</html>

