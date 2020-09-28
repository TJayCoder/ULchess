<?php

session_start();
include("../function/DatabaseQuery.php");

?>

<?php

global $conn;

$id=$_GET["id"];

$delete="delete from product where product_id='$id'";

mysqli_query($conn,$delete) or die(mysqli_error($conn));

?>

<script type="text/javascript">

window.location="allProduct.php";

</script>