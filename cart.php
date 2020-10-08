<?php

session_start();
include("function/DatabaseQuery.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Online UL Chess CLub</title> 
   <link rel="stylesheet" href="tournamentEntry.css">

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
  
    <a href="cart.php"><img src="stock/cart.png" alt="" width="60px" ></a>

<img src="stock/menu.png" alt="" width="60px"  height="60px" class="menu" onclick="menutoggle()">
             </div>

        
        
         </div>
    </div>
</div>



<!----------------------------Single product------------------------>

<?php

		  

///-------------------------------------adding to the cart table

    cart();

function cart(){


    

    if(isset($_GET['add_cart'])){

    global	$conn;
    $conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
    mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));

        
        $ip=getIp();
        $pro_id=$_GET['add_cart'];


        

        $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";

        $run_check=mysqli_query($conn,$check_pro)or die(mysqli_error($conn));


        if(mysqli_num_rows($run_check)>0){

            echo "Product not found";

        }
        else{

        $insertcart="insert into cart values('$pro_id','$ip' ,'1')";

        $query=mysqli_query($conn,$insertcart)or die(mysqli_error($conn));
        
        echo "<script> window.open('index.php','_self')</script>";

        }

        



    }
}






?>



<!----------------------------------------display product----------------------------------------------->
<div class="small-container">
    
        <div class="row">
         
         <!----------------------------------------------------------orders---------------------------------------------------------------------------------------------->



<style>
table, th, td {
  border: 1px solid white;
}
</style>








<form action="" method="POST" enctype="multipart/form-data">

<h1 style="text-align:center; padding-bottom:20px">Orders</h1>

<table>
<thead style="font-size:20px" >
  <tr>
  	<th>Remove</th>
    <th>Product</th>
    <th>Image</th> 
    <th>Price</th>
    <th>Quanity</th>
    <th>Items Total</th>
   
  </tr>
  </thead>
  <tbody>

<?php

orders();
function orders(){

	
	global	$conn;

	$ip=getIp();

	
	global $total;
    $total=0;
    global  $totalValue;
    $totalValue=0;
    $qty=1;
	$price="select * from cart where ip_add='$ip'";

	$run_query=mysqli_query($conn,$price)or die(mysqli_error($conn));


	while($p_price=mysqli_fetch_array($run_query)){


		$pro_id=$p_price['p_id'];
		$proprice=$p_price["product_price"];


		$pro_price="select * from product where product_id='$pro_id'";

		$run_price=mysqli_query($conn,$pro_price);

		while($pp_price=mysqli_fetch_array($run_price)){

		
			$pro_id=$p_price['p_id'];
			$pro_price="select * from product where product_id='$pro_id'";
	
			$run_price=mysqli_query($conn,$pro_price);
			$quantity=$p_price['qty'];			//read number of quantity from db
	
			while($pp_price=mysqli_fetch_array($run_price)){
	
			
				$product_title=$pp_price['product_title'];
				$product_image=$pp_price['product_image'];
                $single_price=$pp_price['product_price'];

               

                if(!isset($_POST['update_cart'])){

                $product_price=array( $pp_price['product_price']);
                $values=array_sum($product_price);
                $total=$total+$values;

                }else{
                
                //-------------------------------some the total items from the database
                $pro_totalprice="select * from cart where p_id='$ip'";
              
                $run_getTotalItems=mysqli_query($conn,$pro_totalprice);

                while($totalItems=mysqli_fetch_array($run_getTotalItems)){


                    $product_totalItemsPrice=array($totalItems['totalItems']);
                    $totalItems_sum=array_sum($product_totalItemsPrice);
                     $total=$total+$totalItems_sum;

               }
            }
                
               // $total=$total+($single_price * $quantity);

				//-------------------------------------------------------add quantity------------------------------------------------------------
				if(isset($_POST['update_cart']))
					{
 				   if(isset($_POST['qty' . $pro_id]))
                     
                        {
						$qty =(int)$_POST['qty' . $pro_id];

						

							$update_qty = "update cart set qty='$qty' where p_id='$pro_id'";
							$run_qty = mysqli_query($conn,$update_qty);
							
                            if($run_qty)
                            {

                              
                                $totalValue = $single_price * $qty;

								$total=$total+($single_price * $qty);
                               
                                
                            }else
                            {
								echo "error";
							}
						
							
							
							
						}
					
					}else{
                        $totalValue = $single_price;
                    }
		
			}

			
			
		}


	


?>

	<tr style="font-size:25px">

			<td align="center"> 
            <input  type="checkbox" style="height:50px; width:100px; text-align:center" name="remove[]" value="<?php echo $pro_id; ?>"> 
            </td>


			<td align="center"> <?php echo $product_title ?> </td>

			<td align="center">  <img src="<?php  echo $product_image; ?>" width="100" alt="product"></td>
			<td align="center"> <?php echo "R". $single_price  ?> </td>

			<td align="center">

			<input  type="number" class="vinput" id="quantity" placeholder="Quantity Number" name="qty<?php echo $pro_id;?>" style="height:50px; width:120px; text-align:center" value="<?php echo $qty;?>" >
           
           </td>

            <td><?php echo "R".$totalValue ?></td>

			</td>


		
			<?php

				


					
				}
			
			}



			?>




	</tr>


	
	




	</tr>

    </tr>

<tr>

<td align="center" colspan='1'>
   
    <button type="submit"  class="btn" style="color:white;width:100px ;height:60px ;color:'white'; font-size:20px" name="removeitems">
        <a href="cart.php" style="color:white; text-decoration:none">Remove</a>
    </buttton>
</td>

<td align="center" colspan='3'>
    <button type="submit" class="btn"  style=" width:200px ;height:60px; font-size:20px" name="update_cart">
        <a style="color:white; text-decoration:none" >Update Quanity</a>
    </buttton>
</td>

<td align="center" colspan='2'>
    <button type="submit" class="btn"  style=" width:200px ;height:60px; font-size:20px" name="continue">
        <a href="index.php" style="color:white; text-decoration:none" >Continue Shopping</a>
    </buttton>
</td>

</tr>


	<tr>

	<td align="center"  colspan="6"  style="font-size:30px; padding-top:30px; text-align:right">
	 <b><?php    echo  'Grand Total'.": ".'R' . $total;   ?> </b>   

	 <?php
	 		
			 $_SESSION['subtotal']=$total;  // pass the total to the next page
			
	 ?>
	 
	 </td>
	 </tr>
	
         <td  align="center"  colspan='6' >  
          <a href="checkout.php"> <img  src="stock/payc.png" class="payment" alt="payment" height="90px" style="float:right"></a>  
        </td>
    

		
	





  </tbody>
  
</table>

</div>



</form>

<!-------------------------------------------------remove items from cart----------------->

<?php




		$conn;
		$ip=getIp();
		
		
            
        if(isset($_POST['removeitems'])){

            foreach($_POST['remove'] as $remove_id){

                  $delete="delete from cart where p_id='$remove_id' AND ip_add='$ip'";

				  $run_q=mysqli_query($conn,$delete);
				  
				  if($run_q){

					echo "<script> window.open('cart.php','_self')</script>";
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

