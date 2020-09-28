<?php

$conn=mysqli_connect("localhost","root","dimakatso") or die(mysqli_error($conn));
mysqli_select_db($conn,"chessclub")or die(mysqli_error($conn));




	
	
	if(isset($_POST['submit'])){
		
		
		$category=$_POST["product_cats"];
		$title=$_POST["product_title"];
		$price=$_POST["product_price"];
		$description=$_POST["product_description"];
		$keyword=$_POST["product_keywords"];
		
	$tm=md5(time());
	$product_image=$_FILES['product_image']["name"];
	$destination="./pictures/".$tm.$product_image; 	//image destination
	$destination1="pictures/".$tm.$product_image;	//destination on the table from the database
	
	move_uploaded_file($_FILES["product_image"]["tmp_name"],$destination);
	
		
		$insert="insert into product values('null','$category','$title','$price','$description','$destination1','$keyword')";
		
	$insertquery=mysqli_query($conn,$insert)or die(mysqli_error($conn));
	
		if($insertquery){
		
		echo"added";
		
	}
		
	}


?>