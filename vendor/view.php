  
  <html>
    <body>
        <style>
            .tp-card{
                background-color: pink;
                width: 250px;
                margin:15px 10px 10px 40px;
                padding: 10px;
                display: inline-block;
                height: 270px;
                overflow: hidden;
                overflow-y: scroll;
                overflow-x: scroll
                
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
  include("../Shared/connection.php");
  include("menu.html");


    $sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid] ");

    while($dbrow=mysqli_fetch_assoc( $sql_result )){
      
        echo"<div class='tp-card'>

         <div class='name'>$dbrow[name]</div>
         <div class='price'>$dbrow[price]</div>
         <image class='pdtimg' src='$dbrow[impath]'>
         <div class='dtl'>$dbrow[detail]</div>
             <div class='action'>
             <a href='edit.php?pid=$dbrow[pid]'>
             <button>edit</button>
             </a>
             <a href='delete.php?pid=$dbrow[pid]'>
             <button>delete</button>
             </a>
         </div>    
    
   </div>";
    }




?>