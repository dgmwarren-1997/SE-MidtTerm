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
 <?php 
                $branc = $_SESSION["branchid"];
          if(isset($_GET['topay'])){ 
            
                
                $userid = $_GET['userid'];
                 $invoice_no = $_GET['invoice_no'];

                                  
                                            //starting file   ?>





          <div class="main" >
  <!--MAIN--->
    <script type="text/javascript">
                               
                            document.getElementById("orders").setAttribute('style',' background-color: grey;pointer-events: none;');          
                            
       </script>
       <br><br>
       <h3 style="font-family: britannic; position: fixed; ">CHECKOUT <i class="fas fa-shopping-cart"></i></h3>
         <?php 
            
              
              
        
     $branchidd = $_SESSION["branchid"];
            $sql = " select bname from branches where branch_id = ' $branchidd'  ";
                        $result = mysqli_query($con,$sql); // run query
                       
                       //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                         while($row = mysqli_fetch_array($result)){
                          $branchname = $row['bname'];
                         
                  }
                
        ?>

         <br>
            <h5 style="font-family:script mt; font-weight: bold;position: fixed;margin-top: 5px;"><?php echo $branchname?></h5>
            <br>
                <strong style="position: fixed;margin-top: 5px;">Invoice# <?php echo $invoice_no ?></strong>
        
         <br><br>
 <?php 
                 if(isset($_POST['btnpayin'])){
                      $invoice = $_POST['invoice'];
                      $txtamount = $_POST['txtamount'];
                      $txtchange = $_POST['txtchange'];
                      $totalcost = $_POST['totalcost'];
                          $userid = $_POST['userid'];
                             
                                      ?>
                                     <div class="alert alert-success" role="alert">
                                      <strong>Payment On Process ..</strong> Please wait  <i class="fas fa-circle-notch fa-spin"></i>
                                      </div>  
                                      <script type="text/javascript">
                                        
                                             setTimeout(function(){ 

                                                        window.location.href = "payment.php?btnpayin&invoice=<?php echo $invoice?>&txtamount=<?php echo $txtamount?>&txtchange=<?php echo $txtchange?>&totalcost=<?php echo $totalcost?>&userid=<?php echo $userid?>";
                                                         }, 3000);        
                                              
                                      </script>
                                      <?php
                        
                      } 
                               
                      
                          if(isset($_POST['btnsave'])){ 
                            $prodid = $_POST['productname'];
                             $Qty = $_POST['qty'];
                             
                                  $sql = " select * from product where prod_id = '$prodid'  ";
                                              $result = mysqli_query($con,$sql); // run query
                                         
                                               while($row = mysqli_fetch_array($result)){
                                                      
                                                      $price = $row['price'];
                                                      $stock = $row['stock'];

                                               }

                                               $stockupdate = $stock-$Qty; 
                                                 $total = $price * $Qty ;
                                                 if($Qty == 0) {
                                                  echo "this is not a valid quantity";
                                                 }else if ($stock < $Qty ) {
                                                 
                                                 
                                                   /*  $updateproductstock = "UPDATE `product` SET `availabitility`='Unavailable' WHERE prod_id = '$prodid'";
                                                $resultofupdate = mysqli_query($con,$updateproductstock); // run query  */ // update availability

                                                 ?>
                                                   <div class="" id="hideforqty">
                                                     <Strong style='color:red' >PRODUCT OUT OF STOCK <i class="fas fa-box-open"></i></strong>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforqty").setAttribute('style','display:none');
                                                         }, 5000);      
                                                            
                                                    </script>

                                                    <?php
        

                                                 }else if ($stock > $Qty) {
                                                      

                                                /*  $updateproductstock = "UPDATE `product` SET`stock`='$stockupdate' WHERE prod_id = '$prodid'";
                                                $resultofupdate = mysqli_query($con,$updateproductstock); // run query
                                                if ($resultofupdate) { 
                                                }*/ // Stock Update
                                                 $checkifproductExisttrue= "select * from trans_record where prod_id = '$prodid' and invoice_no ='$invoice_no' and stat_checkout ='true' and transaction_type = 'reservation' and status = 'approved' ";
                                                    $resultcheckedtrue = mysqli_query($con,$checkifproductExisttrue);
                                                     $countfortrue= mysqli_num_rows($resultcheckedtrue); // to count if necessary
                                                       
                                                        $checkifproductExistfalse= "select * from trans_record where prod_id = '$prodid' and  invoice_no ='$invoice_no' and stat_checkout ='false' and transaction_type = 'reservation' and status = 'approved' ";
                                                    $resultcheckedfalse = mysqli_query($con,$checkifproductExistfalse);
                                                     $countforfalse= mysqli_num_rows($resultcheckedfalse); // to count if necessary

                                                          


                                                           if ($countfortrue == 1) {

                                                          while($rowss = mysqli_fetch_array($resultcheckedtrue)){ 
                                                           $updateqty = $rowss['quantity'];
                                                           $track_id = $rowss['track_id'];
                                                           $totalqty = $updateqty +  $Qty;

                                                          }
                                                         
                                                           $totalup = $price * $totalqty ;
                                                          $updateproductqty = "UPDATE `trans_record` SET `quantity`= '$totalqty' , `total`= '$totalup' WHERE track_id = '$track_id'";
                                                          $resultofupdate = mysqli_query($con,$updateproductqty); // run query
                                                            ?>
                                                   <div class="" id="hideforupdatetrue">
                                                     <Strong style='color:green' >QUANTITY CHANGE <i class='fas fa-check-circle'></i></strong>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforupdatetrue").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php

                                                       }else

                                                       if ($countforfalse == 1 ){
                                                          while($rowsss = mysqli_fetch_array($resultcheckedfalse)){ 
                                                           $updateqty = $rowsss['quantity'];
                                                           $track_id = $rowsss['track_id'];
                                                           $totalqty = $updateqty + $Qty;
                                                         
                                                          }
                                                        
                                                            $totalup = $price * $totalqty ;
                                                          $updateproductqty = "UPDATE `trans_record` SET `quantity`= '$totalqty' , `total`= '$totalup' WHERE track_id = '$track_id' ";
                                                          $resultofupdate = mysqli_query($con,$updateproductqty); // run query
                                                           ?>
                                                   <div class="" id="hideforupdatefalse">
                                                     <Strong style='color:green' >QUANTITY CHANGE <i class='fas fa-check-circle'></i></strong>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforupdatefalse").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php
                                                       } else {
                                                      $insertnewdata = "INSERT INTO `trans_record`( `invoice_no`, `user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`, `Order_accepted`, `target_date`,`status`,`stat_checkout`) VALUES ('$invoice_no','$userid','$prodid','$Qty','$total',now(),'reservation',now(),now(),'approved','true')";
                                                 $resultofinsert = mysqli_query($con,$insertnewdata); // run query

                                                  if ($resultofinsert) {
                                                   ?>
                                                   <div class="" id="hides">
                                                     <Strong style='color:green' >ITEM ADDED <i class='fas fa-check-circle'></i></strong>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hides").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php

                                                  }

                                                       }
                                                      



                                              

                                                

                                                 }

                                             

                                              
                                               


                          }

                           if(isset($_POST['editquantity'])){ 
                          $id = $_POST['idofcheckbox'];
                          
                           ?>
                                 <form method="post" action="#">
                                      <input type="number" name="txtchangeqty" autofocus="" > 
                                      <input type="hidden" name="idofcheckboxs" value="<?php echo $id?>"> 
                                      <input type="submit" class="btn btn-success" style="font-size: 12px;" name="btnchange" value="UPDATE QUANTITY">     
                                       <button style="font-size: 12px" class="btn btn-danger">CANCEL <i class="fas fa-window-close" style="color:white"></i></button>
                                 </form>
                                
                           <?php
                           
                         }

                           if(isset($_POST['removeitem'])){ 
                          $id = $_POST['idofcheckbox'];


                            ?>
                              <form method="post" action="#">
                                <input type="hidden" name="idofcheckbocx" value="<?php echo $id?>">
                                   <input type="password" name="pass" autofocus="" placeholder="ENTER PASSWORD" > 
                                   <input type="submit" name="passed" class="btn btn-success" style="font-size: 12px;" value="REMOVE">      

                                    <button style="font-size: 12px" class="btn btn-danger">CANCEL <i class="fas fa-window-close" style="color:white"></i></button>           
                              </form>
                             
                            <?php
                        

                           /*     */
                           
                         }

                         if(isset($_POST['passed'])){ 
                          $id = $_POST['idofcheckbocx'];
                          $pass = $_POST['pass'];

                                 $email =  $_SESSION["emails"] ; 
                                 $checkpass = "select * from admin_account where email = '$email' and password = '$pass'";
                                   $result = mysqli_query($con,$checkpass); // run query
                                    $count= mysqli_num_rows($result); 
                                        if ($count==1){
                                           $sql = " DELETE FROM `trans_record` WHERE track_id = '$id' ";
                                            $result = mysqli_query($con,$sql); // run query
                                          if ($result) {
                                             ?>
                                                   <div class="" id="hideforupdatetrue">
                                                     <Strong style='color:green' >PRODUCT REMOVED <i class='fas fa-check-circle'></i></strong>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforupdatetrue").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php
                                          }  
                                        }else {
                                           ?>
                                                   <div class="" id="hideforupdatetrue">
                                                     <Strong style='color:red' >WRONG PASSWORD ! <i class="fas fa-ban"></i></strong>
                                                     <h6>No changes Done.</h6>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforupdatetrue").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php
                                        }
                            
                         }

                         if(isset($_POST['btnchange'])){
                          $id = $_POST['idofcheckboxs'];
                          $txtchange = $_POST['txtchangeqty'];
                        
                             if ($txtchange == '' || $txtchange == '0') {

                                               ?>
                                                   <div class="" id="hideforupdatetrue">
                                                     <Strong style='color:red' >INPUT CANNOT BE EMPTY  ! <i class='fas fa-ban'></i></strong>
                                                     	<h6>please fill the box .</h6>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforupdatetrue").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php
                                           
                          }else {
                            $sql = " select * from trans_record where track_id = '$id'  ";
                                           $result = mysqli_query($con,$sql); // run query
                                           $count= mysqli_num_rows($result); 
                                        if ($count==1){
                                          
                                            while($row = mysqli_fetch_array($result)){
                                                      $prodid = $row['prod_id'];

                                            }
                                            $itemprice = "select * from product where prod_id = '$prodid'";
                                             $resulta = mysqli_query($con,$itemprice); // run query
                                              while($rows = mysqli_fetch_array($resulta)){
                                                      $price = $rows['price'];

                                            }

                                            $newtotal = $txtchange * $price ;
                                           
                                           $change= "Update trans_record set quantity = '$txtchange' ,total = '$newtotal' where track_id = '$id' ";
                                           $runchange = mysqli_query($con,$change); // run query
                                           if ($runchange) {

                                           ?>
                                                   <div class="" id="hideforupdatetrue">
                                                     <Strong style='color:green' >QUANTITY UPDATED <i class='fas fa-check-circle'></i></strong>
                                                   </div> 
                                                   <!--end of -->
                                                  
                                                    
                                                    <script type="text/javascript">
                                                      
                                                      setTimeout(function(){ 

                                                        document.getElementById("hideforupdatetrue").setAttribute('style','display:none');
                                                         }, 3000);      
                                                            
                                                    </script>

                                                    <?php
                                           }

                                     }
                          }
                        
                         }
                         

                      
                          ?>
          <div class="container">
            <div class="row">
           
             <div class="col-sm-7">
                   <form method="post" action="#">
                   <div class="container" >
      
            
            
            <div class="row">

               <div class="tableFixHead">
    <table class="table table-hover ">
  <thead class="thead-dark" >
    <tr >
      <th scope="col" style="background-color:white;" >Action</th>
       <th scope="col" style="background-color:white;" >Track no</th>
      <th scope="col" style="background-color:white">Product Name</th>
      <th scope="col" style="background-color:white">Description</th>
      <th scope="col" style="background-color:white">Unit Price</th>
      <th scope="col" style="background-color:white">Quantity</th>
      <th scope="col" style="background-color:white">TOTAL</th>


     
      

    </tr>
  </thead>
  <tbody  style="height: 10px !important; overflow: scroll; ">

                              <?php 

                          
                                
                          $sqlselect = " select * from walkin where  invoice_no = '$invoice_no'  and transaction_type = 'reservation' and status = 'approved'  ";
                                      $resulta = mysqli_query($con,$sqlselect); // run query
                                    
                                     //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                      $count= mysqli_num_rows($resulta); // to count if necessary
                                      if ($count>=1){

                                         $totalcost = 0;
                                       while($row = mysqli_fetch_array($resulta)){
                                            $image = $row['photo'];
                                            $image_src = "bin/Item_Images/".$image;
                                        $trackid = $row['track_id'];
                                        $name = $row['uname']; $surname =$row['surname'];
                                        $product = $row['name'];
                                        $desc = $row['description'];
                                        $price = $row['price'];
                                        $qty = $row['quantity'];
                                        $total = $row['total'];
                                        

                                        $totalcost  +=  $row['total'] ;

                                        //opening  ?>

                                           <tr>
                                         <td>
                                          <div class="form-check">
                                                    <input class="form-check-input" id="btncheck" onclick="showit()" type="checkbox" name="idofcheckbox" value="<?php echo $trackid?>" id="flexCheckDefault" >
                                                    
                                                  </div>
                                            </td>
                                            <td><?php echo $trackid?></td>
                                            <td><?php echo $product?></td>
                                            <td><?php echo $desc?></td>
          
                                            <td>₱  <?php echo $price?></td>
                                            <td><?php echo $qty?></td>
                                            <td>₱  <?php echo $total?></td>
                                          </tr>
                                            <?php // closing



                                        }
                                      }else {
                                        echo 'fail';
                                      }




                          
                              ?>  
   
</tbody>





</table>
</div>
</div>
</div>
<script type="text/javascript">
  
   
    

      function showit() {
  // Get the checkbox
  document.getElementById("editt").setAttribute('style','visibility:visible');
  document.getElementById("removee").setAttribute('style','visibility:visible');
 var check = document.getElementById("btncheck");

  }


        
</script>

<button type="submit" id="editt" name="editquantity" style="visibility: hidden;background-color: white;">
   <strong> Edit <i class="fas fa-edit"></i></strong>
</button>

<button type="submit" name="removeitem"  id="removee"  style="visibility: hidden">
  <strong > Remove <i class="fas fa-trash"></i></strong>
</button>
</form>
</div>
            <div class="col-sm-5">
              <div class="card-body">
                   
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary form-control" style="height: 50px;margin-top: 20px;" data-toggle="modal" data-target="#Addnew">
                       Add <i class="fas fa-plus"></i>
                      </button>
                         
                      
                      <!-- Modal -->
                      <div class="modal fade" id="Addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         
                         <form method="post" action="#"> 
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h6 class="modal-title" id="exampleModalLabel">ADD NEW PRODUCT</h6>
                            <p>Invoice # <strong><?php echo $invoice_no ?></strong></p>
                            </div>
                            <div class="modal-body">
                                    <h6> SELECT PRODUCT</h6>
                                      <select class="form-select" name="productname" style="text-transform: uppercase;">
                           
                         
                                    <?php 
                                  $branchid= $_SESSION['branchid'];
                                        $sql = " select * from product where branch_id = '$branchid'  ";
                                                    $result = mysqli_query($con,$sql); // run query
                                                    $count= mysqli_num_rows($result); // to count if necessary
                                             
                                                   //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                                     while($row = mysqli_fetch_array($result)){
                                                    $productid =  $row['prod_id'];
                                                        ?>
                                                 <option style="text-transform: uppercase;font-size: 16px" value="<?php echo $row['prod_id']?>"><?php echo $row['name'] ?>--------------------₱ <?php echo $row['price']?>

                                                 </option>

                                                        <?php
                                                     }
                                              
                                
                                    ?>
                             
                                         </select>
                                         <br>
                                         Quantity :
                                         <input type="number" name="qty" style="outline:none;text-align: center;width: 90px;border:1px;background-color: rgb(206, 206, 208);" autofocus="" value="1" >



                            </div>

                                         <br><br>
                            <div class="modal-footer">
                               <button type="submit" name="btnsave" style="font-size: 12px " class="btn btn-primary">ADD <i class="fas fa-plus"></i></button>
                              <button type="button" style="font-size: 12px " class="btn btn-secondary" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                        </form> 

                      </div>
                      
                      <br>
                           <script type="text/javascript">

                         $(document).ready(function(){
                          $("#pay").on('shown.bs.modal', function(){
                              $(this).find('input[name="txtamount"]').focus();
                          });
                      });
                        
                            function computetotal() {
                          var x = document.getElementById("myInput").value;
                         var s = x - <?php echo $totalcost?>;
                          document.getElementById("total").setAttribute('value',s);
                        }    
                        </script>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success form-control" onclick="clickbyme()" id="btnpay" data-toggle="modal" data-target="#pay" style="height: 50px;margin-top: 20px">
                       CASH PAY-IN <i class="fas fa-file-invoice"></i>
                        </button>
                       
                      
                        <!-- Modal -->
                         <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <form method="post" action="#">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pay In</h5>
                                <p>Invoice # <strong><?php echo $invoice_no ?></strong></p>
                              
                              </div>
                              <div class="modal-body">
                                <p style="margin-bottom: -10px">VAT : 0%</p>
                                        <h6>TOTAL  COST: <strong style="color:red;font-size: 25px">₱  <?php echo  $totalcost?></strong></h6>
                                      Amount Rendered :
                                      <input type="text" name="txtamount" class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); computetotal();" id="myInput"  required="" >
                                        <input type="hidden" name="invoice" value="<?php echo $invoice_no?>">
                                         <input type="hidden" name="totalcost" value="<?php echo $totalcost?>">
                                         <input type="hidden" name="userid" value="<?php echo $userid?>">

                                      <br><br>
                                      CHANGE :
                                      <input type="text" name="txtchange" class="form-control" id="total" style="height: 50px" readonly="" value="0" >
                                      <br><br>                    
                                
                                
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" name ="btnpayin" class="btn btn-success">PAY IN</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               
                              </div>
                            </div>
                          </div>
                           </form>
                        </div>

                        <a href="accessor.php?cancelidreserve=<?php echo $invoice_no ?>" class="form-control btn btn-danger" style="height: 50px;margin-top: 20px;">CANCEL</a>

                           
                        </div> 
                       
                  
              </div>
            


               <h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>
            </div><!--rorw-->


</div>
</div>
   <!--end of Main-->

   <!--end of Main-->



                                            <?php //end of file



                                   


                                    
                                  
                                    
                              


          } // end of topay
      
          ?>

 
                       
 
  </body>
</html>
   