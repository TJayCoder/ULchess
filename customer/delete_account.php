<link rel="stylesheet" href="../tournamentEntry.css">



<form action="" method="POST" enctype="multipart/form-data">

<h2 style="padding-bottom:60px; padding-top:60px">Are you sure you want to delete Account?</h2>
<input type="submit" value='Yes' name='yes' class="vinput" style="background: pink;">

<input type="submit" value='No' name='no' class="vinput" style="background: pink;">


</form>



<!--------------------------------------------delete Account------------------------------------------>
<?php

$user=$_SESSION['customer_email'];

if(isset($_POST['yes'])){


    $delete="delete from customers where customer_email='$user'";
    $run_delete=mysqli_query($conn,$delete);
    if($run_delete){

    echo "<script>alert('We are sorry to hear you leaving too soon!');</script>";
    $user=session_destroy();
    echo "<script>window.open('../index.php','_self');</script>";
    }
}

if(isset($_POST['no'])){

    echo "<script>alert('Thank you for not leaving us');</script>";
    echo "<script>window.open('../index.php','_self');</script>";

}



?>