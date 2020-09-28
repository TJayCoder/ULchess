<?php

$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));	  

      function getIp() {

            $ip = $_SERVER['REMOTE_ADDR'];

             if (!empty($_SERVER['HTTP_CLIENT_IP']))
                   {

                         $ip = $_SERVER['HTTP_CLIENT_IP'];

                  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))

            {

                   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

            }


            return $ip;
            }

            //////////----------------------total items-----------------------------\\

 function totalitems(){

             if(isset($_GET['add_cart'])){

            global	$conn;
            $ip=getIp();
            $get_items="select * from cart where ip_add='$ip'";

            $run_items=mysqli_query($conn,$get_items);

            $count_items=mysqli_num_rows($run_items);

      }else{

            global	$conn;

            $ip=getIp();
            $get_items="select * from cart where ip_add='$ip'";

            $run_items=mysqli_query($conn,$get_items)or die(mysqli_error($conn));

            $count_items=mysqli_num_rows($run_items);

            }
            echo  $count_items ." ";
      }


      //----------------------------------------------total price-------------------------------

      
			function totalprice(){

				
				global	$conn;

				$ip=getIp();

				$total=0;

				$price="select * from cart where ip_add='$ip'";

				$run_query=mysqli_query($conn,$price)or die(mysqli_error($conn));


				while($p_price=mysqli_fetch_array($run_query)){


					$pro_id=$p_price['p_id'];
					$pro_price="select * from product where product_id='$pro_id'";

					$run_price=mysqli_query($conn,$pro_price);

					while($pp_price=mysqli_fetch_array($run_price)){

						$prduct_price=array( $pp_price['product_price']);
						
						$values=array_sum($prduct_price);

						$total=$total+$values;

						


					}
				}
				echo 'R'. $total;

			}
      
                 
 ?>
