<?php
session_start();
if(!isset($_SESSION["admin_id"])){
  header("location:index.php");
}
?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortout icon" type="image/x-icon" href="https://cdn.fbsbx.com/v/t59.2708-21/129691924_913408942397501_4331861266440577245_n.gif?_nc_cat=110&ccb=3&_nc_sid=041f46&_nc_eui2=AeExms4dQDTY7umZoxC1iM7y4IS0rfEewhXghLSt8R7CFcR6rJPQwvNIXCDTdGMRILEaZEExVHaA9Qb_hKCfdF6W&_nc_ohc=1SjKXqBVwr8AX8CjKE_&_nc_ht=cdn.fbsbx.com&oh=087ab825a9ccc133567592fc952fa92e&oe=60394595">
    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="ajax.js"></script>

    <title>Admin-Hantech</title>
        <?php 
    
        include "myStyle.php";
       include "connection/connect.php";
        ?>

        <style type="text/css">
          .active {
 
}
        </style>
  </head>
  <body>
  <!-- Header -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark dark" >

  <div class="container">
 <a class="navbar-brand logoname" href="#" style="font-size: 25px"><img class="rounded" style="height: 45px;width: 45px;" src="https://cdn.fbsbx.com/v/t59.2708-21/128618827_3741543865866870_268591469112302191_n.gif?_nc_cat=105&ccb=3&_nc_sid=041f46&_nc_eui2=AeEu8AN57cQMTA1t0wUMF4cjHG87hjbo9D0cbzuGNuj0PSWl5kZ5fNd2cHjRGUnD1JsS1XReJccNrZQIGFbeWkup&_nc_ohc=GA9-HfOBFREAX_z3Vqn&_nc_ht=cdn.fbsbx.com&oh=68b055f33ef3ef13386ee605e32e0a68&oe=6038F2AA">
Hantech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link"  href="dashboard.html"><i class="fa fa-tachometer" aria-hidden="true" style="font-size: 25px"></i> Dashboard</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="product.php"><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 25px"></i> Product</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link"  id="active" href="sales.php"><i class="fa fa-usd" aria-hidden="true" style="font-size: 25px"></i> Sales</a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-external-link-square" aria-hidden="true" style="font-size: 25px"></i>  Others
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="aboutus.html"><i class="fa fa-info-circle" aria-hidden="true" ></i> About Us</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out </a>
         
<!-- Button trigger modal -->

       
        </div>
      </li>
          <li class="nav-item " style="cursor: default;">
             <h5 style="color:black;font-weight:bolder;margin-top: 10px ;font-family: ravie" >Hi <i class="fas fa-exclamation"></i> <span style="color: white;  font-weight: bold;font-family: tw cent mt;font-size: 20px;background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgba(43, 43, 43));border-radius: 10px; padding: 5px;  "> <?php echo $_SESSION["name"]?></span> <i class="fas fa-smile" style="color:white;"></i></h5>
          
      </li> 
    </ul>

  </div>

</div>
</nav>
<!--ask if user want to log out -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h5>
       
          <a href="#" class="btn" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close" aria-hidden="true"></i></a>
          
      
      </div>
      <div class="modal-body">
        Are you sure you want to Log out ?


      </div>
      <div class="modal-footer">
        
        <a href="logout.php" class="btn btn-danger">Yes</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!--end of modal-->
    <!--End of Header -->
  
<br><br><br>
<br>


 <div class="sidenav">
  <br><br>
  <br><br>
  <ul class="navi">
    <li class="navi-li " id="all"  data-toggle="tooltip" data-placement="right" title="All Sales Data"><a href="sales.php?all"><i class="fas fa-home "></i><p style="font-size: 10px;margin-left: 25px">All</p></a></li>
      
    <li class="navi-li" id="pending"  data-toggle="tooltip" data-placement="right" title="all pending Orders/transactions
    made by the customer"><a href="sales.php?pending"><i class="fas fa-redo" ></i><p style="font-size: 10px;margin-left: 13px;">Pending</p></a></li>
    
    <li class="navi-li" id="orders" data-toggle="tooltip" data-placement="right" title="Orders made by the customer"><a href="sales.php?orders&walkin" ><i class="fas fa-shopping-cart"></i><p style="font-size: 10px;margin-left: 17px;">Orders</p></a></li>
    
    <li class="navi-li" id="completed" data-toggle="tooltip" data-placement="right" title="completed Transactions"><a href="sales.php?completed" ><i class="far fa-check-circle"></i><p style="font-size: 10px;margin-left: 6px;">Completed</p></a></li>
  </ul>
</div>





<!--MAIN--->
<div class="main" >

     <script type="text/javascript">
                               
                            document.getElementById("orders").setAttribute('style',' background-color: grey;pointer-events: none;');          
                            
       </script>
           <h3 style="font-family: britannic; position: fixed; ">CHECKOUT <i class="fas fa-shopping-cart"></i></h3>


           <br><br>
             <h4 style=""><strong>OOPS!</strong> Cart is Empty !! </h4>
           <h5>To conduct any transaction. Please click <a href="sales.php?orders&walkin">HERE.</a><i style="font-size: 40px;padding: 10px" class="fas fa-arrow-left"></i></h5>
         

           <h1 style="text-align: center;margin-top: 150px;font-size: 140px;"><i class="fas fa-box-open"></i></h1>
   <!--end of Main-->
</div>
   <!--end of Main-->

 
 
 
  </body>
</html>