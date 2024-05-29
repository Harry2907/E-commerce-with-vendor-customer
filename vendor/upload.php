
<?php


session_start();


  print_r($_POST);

 echo"<br>";

 print_r($_FILES['pdtimg']["tmp_name"]);







$source_path=$_FILES['pdtimg']['tmp_name'];
$target_path="../Shared/images/".$_FILES['pdtimg']['name'];

move_uploaded_file($source_path,$target_path);

//$conn=new mysqli("localhost","root","","acme24_5",3306);
include_once("../Shared/connection.php");

$status=mysqli_query($conn,"insert into product(name,price,detail,impath,owner) values('$_POST[name]',$_POST[price],'$_POST[detail]','$target_path',$_SESSION[userid])"); 

if($status){

    echo "product uploaded succesfully";
    header("Location:../vendor/home.php");

}
else{
  echo mysqli_error( $conn );

}








?>