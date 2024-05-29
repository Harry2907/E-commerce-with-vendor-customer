<html>
    <body>
        <style>
            .card{
                background-color: pink;
                width: 250px;
                margin:10px;
                padding: 10px;
                display: inline-block;
                height: 270px;
                overflow: hidden;
                overflow-y: scroll;
            }

            .name{
                font-size: 24px;
                font-weight: bold;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            .price{
                font-size: 27px;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                color: red;
            }

            .price::after{
                content:"Rs";
            }

            .pdtimg{
                height: 65%;
                
                
            }
            .dtl{
                font-size: 22px;
                ;
            }

        </style>
    </body>
  </html>


<?php
   include("authguard.php");
   include_once("../Shared/connection.php");


$pid=$_GET['pid'];
$userid=$_SESSION['userid'];


$status=mysqli_query($conn," insert into cart(userid,pid) values($userid,$pid)");

if($status){
    echo "product added to cart";
       header('location:../customer/viewcart.php');
       
} 
else{
    echo mysqli_error( $conn );
}

 

      
 





?>