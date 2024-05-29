<?php

session_start();
if($_SESSION['login status']==false){
        
        echo "Unauthorised access 401 ";
        die;
    }
if($_SESSION['usertype']!='vendor'){

echo "Forbidden access 403";
        die;
}

?>
