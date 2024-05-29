<?php

      include("authguard.php");
      include("menu.html");

?>



<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="upload.php" method="post" class="form-control w-50 bg-primary p-3" enctype="multipart/form-data">

    <h3 class="text-center text-white">upload a product..<h3>
        <input class="form-control mt-2 "required  type="text" placeholder="Product-name" name="name">
        <input class="form-control mt-2 " required min="0" type="number" placeholder="Product-price" name="price">
        <textarea class="form-control mt-2 " required placeholder="product description" name="detail"></textarea>
        <input class="form-control mt-2 " required type="file"  name="pdtimg" accept=".jpg,.png">
         <div class="text-center">
        <button class="btn btn-danger mt-3">upload</button>
        </div>



    </form>
    
</div>   
</body>
</html>


