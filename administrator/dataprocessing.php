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
    <link rel="shortout icon" type="image/x-icon"  href="http://www.xiconeditor.com/GetIcon.ashx?R=579a8b6e-6009-4906-93aa-52d6edcca110">
    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Admin</title>
    <style type="text/css">
      .panel-body {
  height: 580px;

  

}
    </style>

     <?php 
      include "connection/connect.php";
     ?>
  </head>
  <body  >


     <br><br> 

     <div class="container">
       <div class="row">
         <div class="col-sm-3"></div>
         <div class="col-sm-6">
          <br><br><br><br><br>

              <?php 
          
                if(isset($_GET['del'])){ 
          $id = $_GET['del'];
         
              $sql = " select * from product where prod_id= '$id'  ";
                          $result = mysqli_query($con,$sql); // run query
                          $count= mysqli_num_rows($result); // to count if necessary
                      
                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           while($row = mysqli_fetch_array($result)){
                                  $id = $row['prod_id'];
                                  $name= $row['name'];
                                  $price = $row['price'];
                                  $desc =$row['description'];
                                  $stock =$row['stock'];
                                  $Availability= $row['availabitility'];
                                   $path = "bin/Item_Images/".$row['photo'];
                           }
                           $data = md5("IloveyouPAPA");
                      ?>
                   <h5>Are you sure you want to <strong>PROCEED</strong> <strong style="color: red">DELETION</strong> ?</h5>
                          <table class="table table-hover ">
  <thead class="thead-dark" >
    <tr >
     
      <th scope="col" style="background-color:white">No.</th>
      <th scope="col" style="background-color:white">Name</th>
      <th scope="col" style="background-color:white">Unit Price</th>
      <th scope="col" style="background-color:white">Description</th>
      <th scope="col" style="background-color:white">Stock</th>
      <th scope="col" style="background-color:white">Availability</th>

    </tr>
  </thead>
  <tbody  style="height: 10px !important; overflow: scroll; ">
  </tbody>
        <tr>
          <th  scope="row"><?php echo $id?></th>
          <td><?php echo $name?></td>
          <td>₱<?php echo $price?></td>
          <td><?php echo $desc?></td>
          <td><?php echo $stock?></td>
          <td><?php echo $Availability?></td>
        </tr>
</table> 
            <br><br>
            <a href="#" onclick="goBack()" class="btn btn-info" style="float: right;width: 50%">NO</a>
              <a href="dataprocessing.php?delete=<?php echo $id?>&<?php echo $data?>&path=<?php echo $path?>" class="btn btn-danger" style="float: right;width:50%;">YES</a>
             
            <script>
                              function goBack() {
                                window.history.back();
                              }
                              </script>
                      <?php


                   /* */
                   
                    
      } 
      if(isset($_GET['delete'])){ 
        $id =$_GET['delete'];
        $path =$_GET['path'];
                      

            $sql = " DELETE FROM `product` WHERE prod_id = '$id'  ";
                      if(mysqli_query($con,$sql)){
                        unlink($path);
                        ?>
                          
                        <H5>ITEM was <strong style="color: red">Deleted</strong> SuccessFully..</H5>
                        <br>
                           <table class="table table-hover ">
  <thead class="thead-dark" >
    <tr >
     
      <th scope="col" style="background-color:white">No.</th>
      <th scope="col" style="background-color:white">Name</th>
      <th scope="col" style="background-color:white">Unit Price</th>
      <th scope="col" style="background-color:white">Description</th>
      <th scope="col" style="background-color:white">Stock</th>
      <th scope="col" style="background-color:white">Availability</th>

    </tr>
  </thead>
  <tbody  style="height: 10px !important; overflow: scroll; ">
      <tr>
        <th> </th>
        <th> </th>
        <th> </th>
        <th> </th>
        <th> </th>
        <th> </th>
      </tr>
  </tbody>
</table>
                        <br>
                         <a href="product.php" class="btn btn-primary">Continue</a>
                        <?php

                      } else {
                        echo ' fail';
                      }// run query
      }
    
          
              ?>
           

         </div>
         <div class="col-sm-3"></div>
       </div>
     </div>

  </body>
</html>
    <?php 

    if(isset($_GET['approved'])){

    $track = $_GET['trackid'] ;
    $tt = $_GET['trtype'];
        $getuseremail = "select * from trans_record where track_id = '$track' ";
              $resultofget = mysqli_query($con,$getuseremail);  
               while($row = mysqli_fetch_array($resultofget)){
                   $userid = $row['user_id'];
                   $total = $row['total'];
                   $qty = $row['quantity'];
                   $prodid = $row['prod_id'];
               }
               $selectproduct = "select * from product where prod_id = $prodid";
                $resultofgetp = mysqli_query($con,$selectproduct); 
                  while($row = mysqli_fetch_array($resultofgetp)){
                   $nameofproduct = $row['name'];
               }
               $getemail = "select * from user_account where user_id = '$userid'";
                $qq = mysqli_query($con,$getemail);  
                 while($row = mysqli_fetch_array($qq)){
                   $email = $row['email'];
                   $name = $row['uname'];
               }
          if ($tt == 'walk in') {
              $datenow = date('Y-m-d H:i:s');
           $sqlwalkin = "UPDATE `trans_record` SET `Order_accepted`= '$datenow' ,`target_date` = date_add( '$datenow',interval 1 day), `status`='approved' where track_id ='$track' and transaction_type = 'Walk in' ";
                                   $resulta = mysqli_query($con,$sqlwalkin); // run query
                                  // to count if necessary
                                if ( $resulta ){
                                      

                                                   
                                             ?>
                                             <script>window.location.href="https://hantechpro.000webhostapp.com/Mail/notify.php?trackid=<?php echo $track?>&emails=<?php echo $email?>&qty=<?php echo $qty?>&total=<?php echo $total?>&name =<?php echo $name?>&productname=<?php echo $nameofproduct?>"</script>
                                             <?php
                                               
                                  
                                  


                                         }else {
                                          echo 'fail';
                                         } 
         

          }else if ($tt== 'reservation') {
          
            $sqlwalkin = " UPDATE `trans_record` SET  `Order_accepted` = now() , `status`='approved' where track_id ='$track' and transaction_type = 'reservation'  ";
                                   $resulta = mysqli_query($con,$sqlwalkin); // run query
                                  // to count if necessary
                                if ( $resulta ){
                                  
                                  
                                         
                                    
                                                ?>
                                             <script>window.location.href="https://hantechpro.000webhostapp.com/Mail/notify.php?trackid=<?php echo $track?>&emails=<?php echo $email?>&qty=<?php echo $qty?>&total=<?php echo $total?>&name=<?php echo $name?>&productname=<?php echo $nameofproduct?>"</script>
                                             <?php
                                               
                                         } 
          }


                    
                             

                           

                             }

                
    
    if(isset($_GET['cancel'])){ 
       $track = $_GET['trackid'] ;
         $sql = " UPDATE `pending`  SET `status`='cancelled' , `target_date` = date_add(now(),interval 5 day) where track_id ='$track' ";
                      $result = mysqli_query($con,$sql); // run query
                   if ($result) {
                    ?> <script type="text/javascript">
         
                    window.location.href="sales.php?pending&unsuccessful&&trackid=<?php echo $track?>";
                </script>    <?php
                   }
                }
    
    if(isset($_GET['expired'])){
       $track = $_GET['trackid'] ;
         $sql = " UPDATE `walkin` SET `status`='expired',`target_date` = date_add(now(),interval 5 day) where track_id ='$track' ";
                      $result = mysqli_query($con,$sql); // run query
                   if ($result) {
                    echo ' <script type="text/javascript">
         
                    window.location.href="sales.php?orders&walkin";
                </script>    ';
                   }
      
    }
   
   if(isset($_GET['expiredDelete'])){ 
        $sql = " DELETE FROM `trans_record` WHERE status = 'expired'  ";
                    $result = mysqli_query($con,$sql); // run query
                  
              if ($result) {
                 echo ' <script type="text/javascript">
         
                    window.location.href="sales.php?orders&expired";
                </script>    ';
              }
     
   }
   if(isset($_GET['Deletecancelled'])){ 
     $sql = " DELETE FROM `trans_record` WHERE status = 'cancelled'  ";
                    $result = mysqli_query($con,$sql); // run query
                  
              if ($result) {
                 echo ' <script type="text/javascript">
         
                    window.location.href="sales.php?orders&cancelled";
                </script>    ';
              }
     
   }
   if(isset($_GET['approvedall'])){
       
                        
       
                                                      $selectprod = "select * from pending where branch_id = '$branc' ";
												 		                   $resulta = mysqli_query($con,$selectprod); // run query
												 		                    $count= mysqli_num_rows($resulta);
												 		             			 while($rows = mysqli_fetch_array($resulta)){
												 		                            $userid = $rows['user_id'];
													 							

													 							for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				  $updateqty = "select * from user_account where user_id = '$userid' ";
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$updateqty); // run query*/
												 		                		 $counta= mysqli_num_rows($resultaaa);
												 		                		 	 while($rows = mysqli_fetch_array($resultaaa)){
												 		                		 	   $email = $rows['email'];
												 		                		 	    
												 		                		 	    	for ($i = 0; $i < $counta; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				 $awardspaceEmail = "noreply@hantechdesign.com";
                                                                              
                                                                                
                                                                                $from = "From: HantechDesign <" . $awardspaceEmail . ">";
                                                                                $to = $email;
                                                                                
                                                                                $subject = "Notice of Approval";
                                                                                
                                                                                $body = "
                                                                                
                                                                                 
 <!doctype html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>

<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>

<title>Welcome to HanTech</title>
</head>
 
  
<body style='	width: 100%;
	height: 100vh;
	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);'>

<div style='	text-align:center;
	margin:3rem;'>



<h3 style='	font-family:Impact;
	font-size:3rem;'>Your Orders has been approved..</h3>
        
        <h4>Thank You for Ordering. We cant wait to serve you <br>please observe quarantine protocols, wear mask and face shield upon entering our shop to avoid problems <br> Click the link to see your orders.</h4> 
            <a href='https://hantechdesign.com/orders/'>https://hantechdesign.com/orders/</a>


<p style='	font-family:arial;
	margin:1rem;
	font-size:1.2rem;'>
	
Please do a transaction before the given time . <br> For Walkin Orders - <br> You have 24 Hours to do a transaction .<br> For Reservation - <br> You must do the transaction earlier or before your given date to transact to us. <br> We are happy to serve you.. Thanks for making Orders..Keepsafe .
</p>

<h5 style='	margin-top:5rem;
	font-family:verdana;'>The Hantech Team</h5>
© 2021 Hantech, All Rights Reserved
</div>

</body>

</html>



                                                                                
                                                                                ";
                                                                                
                                                                                if(mail($to,$subject,$body,$from)){
                                                                                    
                                                                                } else {
                                                                                  
                                                                                }
                                                                                
																				}
																					// $resultae = mysqli_query($con,$ss); // run query*/
																				
												 		                		 	 }
												 		                		
												 		                	 }	

     $branc = $_SESSION["branchid"];
        $sql = " UPDATE `pending` SET `status`='approved' , `Order_accepted`=now() ,`target_date` = date_add(now(),interval 1 day) WHERE branch_id = '$branc' and transaction_type = 'walk in'";
                      $result = mysqli_query($con,$sql); // run query

        $sqlfor = " UPDATE `pending` SET `status`='approved' , `Order_accepted`=now()   WHERE branch_id = '$branc' and transaction_type = 'reservation'";
                      $resulta = mysqli_query($con,$sqlfor); // run query
                 

                   if ($result && $resulta) {
                    echo ' <script type="text/javascript">
          
                      window.location.href="sales.php?pending&orderUpdatedsuccessfully";
                      </script>    ';
                   }
    
   }
   if(isset($_GET['undo'])){

      $track = $_GET['trackid'] ;
         $sql = " UPDATE `pending`  SET `status`='pending' , `target_date` =null , `Order_accepted` =null where track_id ='$track' ";
                      $result = mysqli_query($con,$sql); // run query
                   if ($result) {
                    ?> <script type="text/javascript">
         
                    window.location.href="sales.php?pending&successfullyrestored&&trackid=<?php echo $track?>";
                </script>    <?php
                   }
   }

    ?>
