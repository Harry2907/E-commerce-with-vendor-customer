<?php

session_start();

$_SESSION['login status']=false;

$uname=$_POST['user'];
$upass=$_POST['pass'];


$cipher_pass=md5($upass);


//$conn=new mysqli("localhost","root","","acme24_5",3306);
include_once('connection.php');

 $sql_result=mysqli_query($conn, "select*from user where username='$uname' and password='$cipher_pass'");
$total_rows=mysqli_num_rows($sql_result);
  $dbrow=mysqli_fetch_assoc($sql_result);
if($total_rows>0){
  
    echo"Login successfull";
    $_SESSION['login status']=true;
    $_SESSION['usertype']= $dbrow['usertype'];
    $_SESSION['userid']= $dbrow['userid'];

      if($dbrow['usertype']=='vendor'){
        header("location:../vendor/home.php");
      }
      elseif($dbrow['usertype']=='customer')
        header('location:../customer/home.php');
}
else{
    echo"invalid credentials";
}

?>