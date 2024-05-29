<?php
   session_start();
   session_destroy();

   header("location:../Shared/login.html");


?>