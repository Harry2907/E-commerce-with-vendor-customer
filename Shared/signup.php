<?php



$uname=$_POST['user'];
$upass1=$_POST['pass'];
$upass2=$_POST['re-pass'];
$utype=$_POST['usertype'];



if ($upass1!=$upass2){

    echo "Password mismatch";
    die;

}

//$conn=new mysqli("localhost","root","","acme24_5",3306);

include_once("connection.php");

$cipher_pass=md5($upass1);

$status=mysqli_query($conn,"insert into User(username,password,usertype) values('$uname','$cipher_pass','$utype')");

if($status){
    echo "Registration succesfull";

    header("location:../Shared/login.html");
}

else{

    echo mysqli_error($conn);
}
?>