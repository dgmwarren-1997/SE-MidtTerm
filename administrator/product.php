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
    <title>Admin-Hantech</title>
        <?php 
    
        include "connection/connect.php";
    
        ?>
    <style type="text/css">
      .searchbar {
        height: 35px;
        padding: 10px;
        font-family: calibri;
        font-size: 18px;
        border: none;
       border-bottom: 1px solid black;
       outline: none;
       

      }
    </style>
  </head>
  <body>
  <!-- Header -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark dark" >

  <div class="container">
<a class="navbar-brand logoname" href="#" style="font-size: 25px"><img class="rounded" style="height: 45px;width: 45px;" src="png/favicon.ico">
Hantech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link"  href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size: 25px"></i> Dashboard</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " id="active" href="product.php"><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 25px"></i> Product</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="sales.php"><i class="fa fa-usd" aria-hidden="true" style="font-size: 25px"></i> Sales</a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-external-link-square" aria-hidden="true" style="font-size: 25px"></i>  Others
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true" ></i> About Us</a>
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

 

 
  <!--content here-->
  <div class="container">
       <div class="row">
          <div class="col-sm-5"  >
            <br>
                <?php 
            
                if(isset($_GET['update'])){
                  $prodid= $_GET['id'];
    $name = $_GET['name']; 
    $price = $_GET['price'];
    $description = $_GET['description'];
    $stock = $_GET['stock'];
    $availabitility = $_GET['Availability'];
    $category = $_GET['category'];
        
     $branchidd = $_SESSION["branchid"];
            $sql = " select bname from branches where branch_id = ' $branchidd'  ";
                        $result = mysqli_query($con,$sql); // run query
                       
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                         while($row = mysqli_fetch_array($result)){
                          $branchname = $row['bname'];
                         
                  }
        ?>
    
         <h4 class="animate" style="font-family:script mt; font-weight: bold;font-size: 35px;"><?php echo $branchname?></h4>
            <form method="post" action="product.php" class="form">
               <input type="hidden" name="prodid" class="form-control" required="" value="<?php echo $prodid?>"> 
              <div class="col-9">
                 <h6 style="font-size: 15px;font-family: sans-serif; font-weight: bold">Name </h6>
                    <input type="text" name="txtname" class="form-control" required="" value="<?php echo $name?>"> 
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold " >Description </h6>                 
                    <input type="text" name="txtdescription" class="form-control" required="" value="<?php echo $description?>">  

                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Price </h6>
                    <input type="number" name="txtprice" class="form-control" placeholder="₱" required="" value="<?php echo $price?>">   
             
              
               
            
              
                 
                     
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Stock </h6>
                    <input type="number" name="txtstock" class="form-control" required="" value="<?php echo $stock?>">  
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Availability </h6>

                   
                    <select name="txtavailability" class="form-select" value="<?php echo $availabitility?>">
                      <option>Available</option>
                      <option>Unavailable</option>
                    </select>
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Category </h6>
                 
                    <select name="txtcategory" class="form-select" value="<?php echo $category?>">
                         <option><?php echo $category?></option>
                      <option>food</option>
                      <option>clothing</option>
                       <option>beverages</option>
                        <option>cosmetics</option>
                    </select>
                </div>

                 <div class="col-sm-9">
                    <input type="submit" name="btnupdate" value="UPDATE" class="btn btn-info form-control" style="height: 50px;margin-top: 10px;" >
                    
                  <br>
                    <input type="submit" name="btnnexttoupdate" value="Next (Update Photo)" class="btn btn-info form-control" style="height: 50px;margin-top: 10px;" >
                    <br>
                    <a href="product.php" class="btn btn-danger form-control"  style="height: 45px;margin-top: 10px;">CANCEL</a>
                 </div> 
                 <!--end of col-sm-6-->
               </form>
              
              
               <h6 style="font-family: courier new">All right Reserved &middot; 2021</h6>

        <?php


    }else if (isset($_POST['btnsave']))  {
        $branch=  $_SESSION["branchid"];
        $name =$_POST['txtname'];
        $desc=$_POST['txtdescription'];
        $price =$_POST['txtprice'];
        $stock =$_POST['txtstock'];
        $availabitility =$_POST['txtavailability'];
        $category = $_POST['txtcategory'];

          $checkunit = "select * from product where name = '$name' and branch_id ='$branch' " ; 
            $resultcheck = mysqli_query($con,$checkunit);
              $count= mysqli_num_rows($resultcheck);
              if ($count == 1 ) {
                ?>
                <script type="text/javascript">
                  
                  alert("This ITEM already Exist. Do a Search and click Update");  
                  window.location.href="product.php";
                        
                </script>
                <?php
              } else {
                  $sql = " select bname from branches where branch_id = ' $branch' ";
                        $result = mysqli_query($con,$sql); // run query
                       
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                         while($row = mysqli_fetch_array($result)){
                          $branchname = $row['bname'];
                         
                  }
                 ?>
  
         <h4 class="animate" style="font-family:script mt; font-weight: bold;font-size: 35px;"><?php echo $branchname?></h4>
     
            <div  id="form">
                              <form method="post"  enctype="multipart/form-data"  >
              <div class="col-9">
                      
                                <img src="data:image/jpeg;base64,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" class="img-thumbnail" width="355"  style="height:355px" id="configimage" >
                                <br><br>
                                  <input type="file" name="image" id="image" class="form-control-file form-control" required="">

                                  <input type="hidden" name="txtname" value="<?php echo $name?>">
                                  <input type="hidden" name="txtdescription"  value="<?php echo $desc?>">
                                  <input type="hidden" name="txtprice"  value="<?php echo $price?>">
                                  <input type="hidden" name="txtstock"  value="<?php echo $stock?>">
                                   <input type="hidden" name="txtavailability"  value="<?php echo $availabitility?>">
                                   <input type="hidden" name= "txtcategory" value="<?php echo $category?>">
                      
                                  <script type="text/javascript">
                                    
                                    
                                                              const inpfile = document.getElementById("image"); //id of input tag type file
                                                              const regform=document.getElementById ("form"); // div containing the form
                                                              const previewimage=regform.querySelector("#configimage"); // id of img tag
                                          
                                                               inpfile.addEventListener("change",function () {
                                                                  const file = this.files[0];
                                          
                                                                  if(file) {
                                                                      const reader = new FileReader();
                                                                      
                                                                      
                                                                      reader.addEventListener("load",function() {
                                                                          previewimage.setAttribute("src",this.result);
                                                                         
                                                                      });
                                                                      reader.readAsDataURL(file);
                                                                  }
                                                               });      
                                          
                                  </script>
                             
                               </div> 

               

                 <div class="col-sm-9">
                  <br>
                    <input type="submit" name="btnsavedd" value="SAVE" class="btn btn-info form-control" style="height: 50px;">
                 </div>

                  </form>  
                    </div> 
                 <!--end of col-sm-6-->
               
               
               <h6 style="font-family: courier new;margin-top: 10px">All right Reserved &middot; 2021</h6>
            <?php

                 /*
                   
                       */
                  
              }
        
    }else if(isset($_POST['btnnexttoupdate'])){
        
        $id = $_POST['prodid'];
           $branch=  $_SESSION["branchid"];
        $name =$_POST['txtname'];
        $desc=$_POST['txtdescription'];
        $price =$_POST['txtprice'];
        $stock =$_POST['txtstock'];
        $availabitility =$_POST['txtavailability'];
        $category = $_POST['txtcategory'];
         $sql = " select bname from branches where branch_id = ' $branch' ";
                        $result = mysqli_query($con,$sql); // run query
                       
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                         while($row = mysqli_fetch_array($result)){
                          $branchname = $row['bname'];
                         
                  }
       
        ?>
     
         <h4 class="animate" style="font-family:script mt; font-weight: bold;font-size: 35px;"><?php echo $branchname?></h4>
         <div  id="form">
                              <form method="post"  enctype="multipart/form-data"  >
              <div class="col-9">
                
                
              

                
                
                      
                                <img src="data:image/jpeg;base64,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" class="img-thumbnail form-control"  width="282"  style="height:345px" id="configimage" >
                               <h6 style="font-weight: lighter">Updating Photo : <span style="font-weight: bolder;color: red;font-size: 20px"><?php echo  $name?></span></h6> 
                                  <input type="file" name="image" id="image" class="form-control-file form-control" required="">
                                  <input type="hidden" name="txtid" value="<?php echo $id?>">

                                  <input type="hidden" name="txtname" value="<?php echo $name?>">
                                  <input type="hidden" name="txtdescription"  value="<?php echo $desc?>">
                                  <input type="hidden" name="txtprice"  value="<?php echo $price?>">
                                  <input type="hidden" name="txtstock"  value="<?php echo $stock?>">
                                   <input type="hidden" name="txtavailability"  value="<?php echo $availabitility?>">
                                    <input type="hidden" name="txtcategory"  value="<?php echo $category?>">
                      
                                  <script type="text/javascript">
                                    
                                    
                                                              const inpfile = document.getElementById("image"); //id of input tag type file
                                                              const regform=document.getElementById ("form"); // div containing the form
                                                              const previewimage=regform.querySelector("#configimage"); // id of img tag
                                          
                                                               inpfile.addEventListener("change",function () {
                                                                  const file = this.files[0];
                                          
                                                                  if(file) {
                                                                      const reader = new FileReader();
                                                                      
                                                                      
                                                                      reader.addEventListener("load",function() {
                                                                          previewimage.setAttribute("src",this.result);
                                                                         
                                                                      });
                                                                      reader.readAsDataURL(file);
                                                                  }
                                                               });      
                                          
                                  </script>
                             
                               </div> 

               

                 <div class="col-sm-9">
                  
                    <input type="submit" name="btnUpdatephoto" value="SAVE" class="btn btn-info form-control" style="height: 45px;margin-top: 5px">
                    <br>
                    <a href="product.php" class="btn btn-danger form-control" style="height: 45px;margin-top: 10px">Cancel</a>
                 </div>

                  </form>  
                    </div> 
        <?php
    }else   if(isset($_GET['view'])){
           $id= $_GET['prodid'];
            $branch= $_GET['branch'];
             $name = $_GET['name']; 
           $price = $_GET['price'];
           $desc = $_GET['description'];
            $stock = $_GET['stock'];
           $availabitility = $_GET['Availability'];
            $sql = " select * from product where prod_id = '$id'  ";
                        $result = mysqli_query($con,$sql); // run query
                        $count= mysqli_num_rows($result); // to count if necessary
                     if ($count==1){
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                         while($row = mysqli_fetch_array($result)){
                           $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
            
                         }
                  }


       ?>
      

           

                  <div class="card" style="width: 23rem;">
                  <img class="card-img-top" src="<?php echo $image_src?>" alt="Card image cap" height="340"width="40" style="border: 1px solid grey">
                  <div class="card-body">
                   
                    <h4 style="text-transform: uppercase; text-align: center" class="card-title"><?php echo $name?></h4>
                      
                      <h6 >Price : ₱<strong ><?php echo $price?></strong></h6>
                      
                       <h6 >Description : <strong><?php echo $desc?></strong></h6>
                       
                        <h6>Stock : <strong><?php echo $stock?></strong></h6>
                        
                         <h6>Availability : <strong><?php echo $availabitility ?></strong></h6>
                    <a href="product.php" class="btn btn-primary form-control" ><i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              
               
  
       <?php
        
      }
   


    else {
       $branchidd = $_SESSION["branchid"];
            $sql = " select bname from branches where branch_id = ' $branchidd'  ";
                        $result = mysqli_query($con,$sql); // run query
                       
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                         while($row = mysqli_fetch_array($result)){
                          $branchname = $row['bname'];
                         
                  }
      ?>
         <style type="text/css">
  @-webkit-keyframes zoom {
    
    
    
       0%   {transform: scale(0.4);}
    100% {transform: scale(1); }
}

.animate{
    -webkit-animation: zoom 2s ;
}
</style>
         <h4 class="animate" style="font-family:script mt; font-weight: bold;font-size: 35px;"><?php echo $branchname?></h4>
       <form method="post" action="product.php" class="form">

              <div class="col-9">
                 <h6 style="font-size: 15px;font-family: sans-serif; font-weight: bold">Name </h6>
                    <input type="text" name="txtname" class="form-control" required=""> 
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold " >Description </h6>                 
                    <input type="text" name="txtdescription" class="form-control" required="">  

                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Price </h6>
                    <input type="number" name="txtprice" class="form-control" placeholder="₱" required="">   
             
              
               
            
              
                 
                     
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Stock </h6>
                    <input type="number" name="txtstock" class="form-control" required="">  
                     <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Availability </h6>
                     <select class="form-select disabled"  name="txtavailability" >
                       <option>Available</option>
                     </select>
                      <h6 style="font-size: 15px;font-family: sans-serif;font-weight: bold ">Category </h6>
                     <select name="txtcategory" class="form-select" >
                      <option>food</option>
                      <option>clothing</option>
                       <option>beverages</option>
                        <option>cosmetics</option>
                    </select>
                    
                </div>

                 <div class="col-sm-9">
                  <br>
                    <input type="submit" name="btnsave" value="NEXT" class="btn btn-info form-control" style="height: 50px;">
                 </div> 
                 <!--end of col-sm-6-->
               </form>
               <br><br>
               <h6 style="font-family: courier new">All right Reserved &middot; 2021</h6>
            <?php
    }
   
    
                ?>
              
            



          </div>
         
           <!--end of col-sm-5-->

          <div class="col-sm-7">
            
               
                   
                 
                      <input type="text" name="txtsearch" id="txtsearch" placeholder="Search No. or Name" class="searchbar" >
                        
                          <script type="text/javascript" >
                  
                            
                                function appendvaluetoAnchor (){
                                  var linkit = document.getElementById("ui"),
                                  protocol = linkit.protocol,
                                  newvalue = encodeURIComponent(this.value);
                            linkit.href= protocol + '//' + linkit.hostname +'/'+'administrator'+'/' +'product.php?search='+newvalue;
                            
                                }

                                    
                              
                                          function getvall (){
                                              var x = document.getElementById("txtsearch");
                                              var defaultval = x.defaultValue;
                                              var currentVal = x.value;

                                          }
                                              
                                          
                                      
                                var input = document.querySelector('input[name="txtsearch"]');
                                input.addEventListener('change' , appendvaluetoAnchor);

                                
                            
                  
                          </script>
                           <a href="#" id="ui"  style="  background-image: linear-gradient(to top, rgba(255,0,0,0), rgba(43, 43, 43));" class="btn" onclick="getvall()">Search <i class="fas fa-search" style="color: white"></i></a>
              
                     
           
                 <!--end of -->
                <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 500px; }
                  .tableFixHead thead th { position: sticky; top: 0; }
                </style>
         

                    <br> 
                <div class="alert alert-danger alert-dismissible fade show" id="alert" style="display: none" role="alert">
                  <strong>Item</strong> was deleted Successfully.
                 
                    <a href="product.php"style="float: right"><i class="fas fa-window-close" ></i></a>
                       
                 
                </div>
                    <br>
                    <div class="tableFixHead">
    <table class="table table-hover ">
  <thead class="thead-dark" >
    <tr >
       <th scope="col" style="background-color:white;" >Action</th>
      <th scope="col" style="background-color:white">No.</th>
      <th scope="col" style="background-color:white">Name</th>
      <th scope="col" style="background-color:white">Unit Price</th>
      <th scope="col" style="background-color:white">Description</th>
      <th scope="col" style="background-color:white">Stock</th>
      <th scope="col" style="background-color:white">Availability</th>
      

    </tr>
  </thead>
  <tbody  style="height: 10px !important; overflow: scroll; ">
   
          <?php 
 $branch =$_SESSION["branchid"];
                if(isset($_POST['changecategory'])) {
                 $category=$_POST['categoryselection'];
                   $sql = " select * from product where branch_id = '$branch' and category='$category' "; //touse
       
                            $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result);
                              ?>
                           <form method="post">
                            <select  name="categoryselection" style="height:35px;font-family:century gothic">
                                <option value="food"><?php echo $category?> Category</option>
                                <option value="food">food Category</option>
                                <option value="clothing">clothing Category</option>
                                <option value="beverages">beverages Category</option>
                                <option value="cosmetics">cosmetics Category</option>
                            </select>
                            
                            <input type="submit" value="Change" name="changecategory" style="margin-left:10px">
                           </form>
                           <?php
                              if ($count >=1 ) {
                               while($row = mysqli_fetch_array($result)){
                                   ?>
                                      <tr>
      
                      <td>
                        <a href="product.php?view&prodid=<?php echo $row['prod_id']?>&branch=<?php echo $branch?>&name=<?php echo $row['name'] ?>&price=<?php echo $row['price']?>&description=<?php echo $row['description']?>&stock=<?php echo $row['stock']?>&Availability=<?php echo $row['availabitility']?>" class="btn btn-primary" style="font-size: 10px;width: 80px" >View <i class="fas fa-eye"></i></a>
                      
                      <a href="product.php?update&id=<?php echo $row['prod_id']?>&name=<?php echo $row['name'] ?>&price=<?php echo $row['price']?>&description=<?php echo $row['description']?>&stock=<?php echo $row['stock']?>&Availability=<?php echo $row['availabitility']?>&category=<?php echo $row['category']?>" class="btn btn-info" style="font-size: 10px;width: 80px;margin-top: 5px;">Update <i class="fas fa-update"><i class="fas fa-edit"></i></i></a>
                        <br>
                        
                        <a href="dataprocessing.php?del=<?php echo $row['prod_id']?>&Los" id="btndel"  style="font-size: 10px; width:80px;margin-top: 5px;  " class="btn btn-danger">Delete 
       
                         

                          <i class="far fa-trash-alt"></i></a>

                      

                      </td>
                      <th scope="row"><?php echo $row['prod_id']?></th>
                      <td><?php echo $row['name']?></td>
                      <td>₱<?php echo $row['price']?></td>
                      <td><?php echo $row['description']?></td>
                      <td><?php echo $row['stock']?></td>
                      <td><?php echo $row['availabitility']?></td>
                     
                    </tr>
                                   <?php
                                  
                                   
                                   
                               }
                              }else {
                                  ?>
                       <tr>
                        <td>
                           <h5>No Item/s Found.<i class="far fa-folder-open"></i></h5>
                        </td>

                        

                       </tr>
                       <?php 
                              }
                }else
            
           if(isset($_GET['search'])){ 
                            $valuesearch = $_GET['search'];
                            ?>
                             <script type="text/javascript">
      
                                  document.getElementById("txtsearch").setAttribute('value','<?php echo $valuesearch?>'); 
                                   document.getElementById("txtsearch").setAttribute('onClick','this.select()');  
                                   
                                    
                            </script>
                            <?php
                            $data = md5("ImissyouPAPA");
                                $sql = " SELECT * FROM `product` WHERE concat (`name`) like '%$valuesearch%'  and branch_id = '$branch' ";
                                            $result = mysqli_query($con,$sql); // run query
                                            $count= mysqli_num_rows($result); // to count if necessary
                                         if ($count>=1){
                                           //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                             while($row = mysqli_fetch_array($result)){
                                                

                                               ?>
                                <tr>
      
                      <td>
                        <a href="product.php?view&prodid=<?php echo $row['prod_id']?>&branch=<?php echo $branch?>&name=<?php echo $row['name'] ?>&price=<?php echo $row['price']?>&description=<?php echo $row['description']?>&stock=<?php echo $row['stock']?>&Availability=<?php echo $row['availabitility']?>" class="btn btn-primary" style="font-size: 10px;width: 80px" >View <i class="fas fa-eye"></i></a>
                         

                          <a href="product.php?update&id=<?php echo $row['prod_id']?>&name=<?php echo $row['name'] ?>&price=<?php echo $row['price']?>&description=<?php echo $row['description']?>&stock=<?php echo $row['stock']?>&Availability=<?php echo $row['availabitility']?>&category=<?php echo $row['category']?>" class="btn btn-info" style="font-size: 10px;width: 80px;margin-top: 5px;">Update <i class="fas fa-update"><i class="fas fa-edit"></i></i></a>
                        <br>
                        
                        
                        <a href="dataprocessing.php?del=<?php echo $row['prod_id']?>&<?php echo $data?>" style="font-size: 10px; width:80px;margin-top: 5px;  " class="btn btn-danger">Delete <i class="far fa-trash-alt"></i></a>
                      </td>
                      <th scope="row"><?php echo $row['prod_id']?></th>
                      <td><?php echo $row['name']?></td>
                      <td>₱<?php echo $row['price']?></td>
                      <td><?php echo $row['description']?></td>
                      <td><?php echo $row['stock']?></td>
                      <td><?php echo $row['availabitility']?></td>
                       
                    </tr>

                              <?php

                                             }
                                      }else {

                                        ?>
                                        <tr>
                                          <td><h5>No item/s found that matches : <strong style="font-size: 40px;color:red"><?php echo $valuesearch ?></strong></h5></td>
                                          
                                       </tr>
                                       <tr> 
                                        <td> <a href="product.php" class="btn btn-success">Refresh <i class="fas fa-redo"></i></a></td>
                                       </tr>
                                        <?php


                                    } 



                      }else {
                        $data = md5("ImissyouPAPA");
                          $sql = " select * from product where branch_id = '$branch' and category = 'food'  "; //touse
       
                            $result = mysqli_query($con,$sql); // run query
                          ?>
                           <form method="post">
                            <select  name="categoryselection" style="height:35px;font-family:century gothic">
                                
                                <option value="food">food category</option>
                                <option value="clothing">clothing category</option>
                                <option value="beverages">beverages category</option>
                                <option value="cosmetics">cosmetics category</option>
                            </select>
                            
                            <input type="submit" value="Change" name="changecategory" style="margin-left:10px">
                           </form>
                           <?php
                            $count= mysqli_num_rows($result); 
                            if ($count >=1 ) {
                               while($row = mysqli_fetch_array($result)){
                          
                              ?>
                                <tr>
      
                      <td>
                        <a href="product.php?view&prodid=<?php echo $row['prod_id']?>&branch=<?php echo $branch?>&name=<?php echo $row['name'] ?>&price=<?php echo $row['price']?>&description=<?php echo $row['description']?>&stock=<?php echo $row['stock']?>&Availability=<?php echo $row['availabitility']?>" class="btn btn-primary" style="font-size: 10px;width: 80px" >View <i class="fas fa-eye"></i></a>
                      
                      <a href="product.php?update&id=<?php echo $row['prod_id']?>&name=<?php echo $row['name'] ?>&price=<?php echo $row['price']?>&description=<?php echo $row['description']?>&stock=<?php echo $row['stock']?>&Availability=<?php echo $row['availabitility']?>&category=<?php echo $row['category']?>" class="btn btn-info" style="font-size: 10px;width: 80px;margin-top: 5px;">Update <i class="fas fa-update"><i class="fas fa-edit"></i></i></a>
                        <br>
                        
                        <a href="dataprocessing.php?del=<?php echo $row['prod_id']?>&<?php echo $data?>" id="btndel"  style="font-size: 10px; width:80px;margin-top: 5px;  " class="btn btn-danger">Delete 
       
                         

                          <i class="far fa-trash-alt"></i></a>

                      

                      </td>
                      <th scope="row"><?php echo $row['prod_id']?></th>
                      <td><?php echo $row['name']?></td>
                      <td>₱<?php echo $row['price']?></td>
                      <td><?php echo $row['description']?></td>
                      <td><?php echo $row['stock']?></td>
                      <td><?php echo $row['availabitility']?></td>
                     
                    </tr>

                              <?php
            
                             }
                      
                      }else {
                       
                       ?>
                       <tr>
                        <td>
                           <h5>No Item/s Found.<i class="far fa-folder-open"></i></h5>
                        </td>

                        

                       </tr>
                       <?php
                     }
                      
                      }
                          
                          
                  

       
               
                            


      
          ?> 

  
    <!------>
   
     
     <!-- Modal -->
     


  </tbody>
</table>


</div>
      <?php 
   $branch =$_SESSION["branchid"];
        $sql = " select * from product where branch_id = '$branch'  "; //touse
       
                            $result = mysqli_query($con,$sql); // run query
                           
                            $count= mysqli_num_rows($result); 
          ?>
          <h6 style="font-family: century gothic;font-weight: bold;float: right;">Showing  <a href="product.php"<span style="font-weight: bolder;"><?php echo $count?></span></a>  ITEM/s..</h6>
          <?php
      ?>


      <?php 
     
     if(isset($_POST['btnsavedd'])){
     
       $branch=  $_SESSION["branchid"];
        $name =$_POST['txtname'];
        $desc=$_POST['txtdescription'];
        $price =$_POST['txtprice'];
        $stock =$_POST['txtstock'];
        $availabitility =$_POST['txtavailability'];
        $category=$_POST['txtcategory'];
 
        $pname = rand(1000,10000)."-".$_FILES["image"]["name"];
         $tname = $_FILES["image"]["tmp_name"];
         
         $uploads_dir = 'bin/Item_Images/';
         
         move_uploaded_file($tname , $uploads_dir .'/'.$pname);
 
     // Insert record
     $sql = "INSERT INTO `product`( `branch_id`, `name`, `price`, `description`, `stock`, `availabitility`, `photo`,`category`) VALUES ('$branch','$name','$price','$desc','$stock','$availabitility','$pname','$category') ";
                        if (mysqli_query($con,$sql)){
                          ?>
                          <script type="text/javascript">
                            
                            alert('ITEM Added Successfully!');
                            window.location.href="product.php";      
                                  
                          </script>

                          <?php

                        }else {
                          echo 'fail to save new';
       
                        }
  
  

  
       

      


      
    }
            
  
   
    
    if(isset($_POST['btnupdate'])){ 
      $id = $_POST['prodid'];
           $branch=  $_SESSION["branchid"];
        $name =$_POST['txtname'];
        $desc=$_POST['txtdescription'];
        $price =$_POST['txtprice'];
        $stock =$_POST['txtstock'];
        $availabitility =$_POST['txtavailability'];
        $category = $_POST['txtcategory'];

         $sql = "   UPDATE `product` SET `branch_id`='$branch',`name`='$name',`price`='$price',`description`='$desc',`stock`='$stock',`availabitility`='$availabitility' , `category` = '$category' WHERE prod_id= '$id'  ";
                        if (mysqli_query($con,$sql)){
                          ?>
                          <script type="text/javascript">
                            
                            alert('Updated Successfully!');
                            window.location.href="product.php";      
                                  
                          </script>

                          <?php

                        }else {
                          echo 'fail';
                        }

    }

    if(isset($_POST['btnUpdatephoto'])){
         $id=$_POST['txtid'];
         $branch=  $_SESSION["branchid"];
        $name =$_POST['txtname'];
        $desc=$_POST['txtdescription'];
        $price =$_POST['txtprice'];
        $stock =$_POST['txtstock'];
        $availabitility =$_POST['txtavailability'];
        $category = $_POST['txtcategory'];
         $pname = rand(1000,10000)."-".$_FILES["image"]["name"];
         $tname = $_FILES["image"]["tmp_name"];
         
         $uploads_dir = 'bin/Item_Images/';
         
         move_uploaded_file($tname , $uploads_dir .'/'.$pname);

         $sql = " select * from product where prod_id= '$id'  ";
                          $result = mysqli_query($con,$sql); // run query
                        
                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           while($row = mysqli_fetch_array($result)){
                                 
                                   $path = "bin/Item_Images/".$row['photo'];
                           }
                           if ($result) {
                        $sql = "   UPDATE `product` SET `branch_id`='$branch',`name`='$name',`price`='$price',`description`='$desc',`stock`='$stock',`availabitility`='$availabitility',`photo`='$pname',`category` = '$category' WHERE prod_id= '$id'  ";
                        if (mysqli_query($con,$sql)){
                          unlink($path);
                          ?>
                          <script type="text/javascript">
                            
                            alert('Updated Successfully!');
                            window.location.href="product.php";      
                                  
                          </script>

                          <?php

                        }else {
                          echo 'fail';
                        }


                           }

                        
                       


      
      
    }
    
      ?>
  
          </div>
       </div> 
       <!--end of row-->

   


  </div>
  <!--end of content-->
 
  </body>
</html>