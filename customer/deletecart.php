<?php

include("authguard.php");
include("../Shared/connection.php");
include("menu.html");

$cartid=$_GET['cartid'];

$status=mysqli_query($conn,"delete from cart where cartid=$cartid") ;

if($status){

    echo "product removed from cart";
    header("location:viewcart.php");
}
else{
    echo mysqli_error($conn);
}


?>