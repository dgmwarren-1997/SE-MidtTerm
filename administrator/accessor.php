<?php 
session_start();
if(!isset($_SESSION["admin_id"])){
  header("location:index.php");
}

?>		  
		  <?php 

		  include "connection/connect.php";
      
    if(isset($_GET['selectData'])){ 
    	$id = $_GET['selectData'];
    	
    	 $sqlupdate = " UPDATE `trans_record` SET  `oncheckout`='false' WHERE track_id = '$id'  ";
                            $resultaa = mysqli_query($con,$sqlupdate); // run query
                            
      	header("location:transact_process.php");
    }

      if(isset($_GET['cancelid'])){ 
    $invoice = $_GET['cancelid'];

      $sql = " UPDATE `trans_record` SET `invoice_no`= NULL  WHERE invoice_no= '$invoice' and `stat_checkout`='false'  ";
                            $result = mysqli_query($con,$sql); // run query
                            if ($result ) {
                              $del = "DELETE FROM `invoice_record` WHERE invoice_no = '$invoice'";
                              $resulta = mysqli_query($con,$del); // run query

                             


                              $deleteloaded = "DELETE FROM `trans_record` WHERE `stat_checkout`= 'true' ";
                               $resultofdelete = mysqli_query($con,$deleteloaded); // run query
 ?>
    <script type="text/javascript">
      
      window.location.href="sales.php?orders&walkin";      
            
    </script>
    <?php
                            }else {
                               ?>
    <script type="text/javascript">
      
      window.location.href="sales.php?orders&walkin";      
            
    </script>
    <?php
                            }
                         
   

  }
  if(isset($_GET['cancelnew'])){ 
     $invoice = $_GET['cancelnew'];

     
                            
                              $del = "DELETE FROM `invoice_record` WHERE invoice_no = '$invoice'";
                              $resulta = mysqli_query($con,$del); // run query

                             


                              $deleteloaded = "DELETE FROM `trans_record` WHERE `stat_checkout`= 'true' ";
                               $resultofdelete = mysqli_query($con,$deleteloaded); // run query
 ?>
    <script type="text/javascript">
      
      window.location.href="sales.php?orders&walkin";      
            
    </script>
    <?php
                          
                         
   
  }

      if(isset($_GET['cancelidreserve'])){ 
    $invoice = $_GET['cancelidreserve'];

      $sql = " UPDATE `trans_record` SET `invoice_no`= NULL  WHERE invoice_no= '$invoice' and `stat_checkout`='false'  ";
                            $result = mysqli_query($con,$sql); // run query
                            if ($result ) {
                              $del = "DELETE FROM `invoice_record` WHERE invoice_no = '$invoice'";
                              $resulta = mysqli_query($con,$del); // run query

                             


                              $deleteloaded = "DELETE FROM `trans_record` WHERE `stat_checkout`= 'true' ";
                               $resultofdelete = mysqli_query($con,$deleteloaded); // run query
 ?>
    <script type="text/javascript">
      
      window.location.href="sales.php?orders&reserve";      
            
    </script>
    <?php
                            }else {


                               ?>
    <script type="text/javascript">
      
      window.location.href="sales.php?orders&reserve";      
            
    </script>
    <?php
                            }
                         
   

  }

   if(isset($_GET['topay'])){ 

   	 $trackid =$_GET['trackid'];
                $userid = $_GET['userid'];
              
 			 $branc = $_SESSION["branchid"];


                    $sql = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`) VALUES ('$userid','$branc',now()) ";
                                $result = mysqli_query($con,$sql); // 

                                $unique = "select * from invoice_record  where user_id = '$userid' and branch_id = '$branc' ";
                                $resulte = mysqli_query($con,$unique); // 
                                 while($rows = mysqli_fetch_array($resulte)){
                                        $date = $rows['dateprocess'];
                                  
                                     } 


                        $sqlforselect = " select * from `invoice_record` where user_id = '$userid' and branch_id = '$branc' and dateprocess = '$date' ";
                                    $resulta = mysqli_query($con,$sqlforselect); // run query
                                   
                                   //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                    if ($resulta) {
                                      while($row = mysqli_fetch_array($resulta)){
                                        $invoice_no = $row['invoice_no'];
                                  
                                     } 
                                      $update = "UPDATE `trans_record` SET `invoice_no`='$invoice_no'  WHERE track_id = $trackid ";
                                      $resultangupdate = mysqli_query($con,$update); // run query
                                    ?>
                                    <script type="text/javascript">
                                    	
                                    	window.location.href="transact_process.php?topay&trackid=<?php echo $trackid?>&userid=<?php echo $userid?>&invoice_no=<?php echo $invoice_no
                                    	?>"      
                                          	
                                    </script>
                                    <?php
                                  }

   }

if(isset($_GET['checkoutallwalkinuser'])){
$id = $_GET['id'];
 $branc = $_SESSION["branchid"];

   $makeinvoice = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`) VALUES ('$id','$branc',now()) ";
                                $resultinvoice = mysqli_query($con,$makeinvoice); // 

                              

                                $unique = "select * from invoice_record  where user_id = '$id' and branch_id = '$branc' ";
                                $resulte = mysqli_query($con,$unique); // 
                              
                                 while($rows = mysqli_fetch_array($resulte)){
                                        $date = $rows['dateprocess'];
                                  
                                     } 
                                
                                   $sqlforselect = " select * from `invoice_record` where user_id = '$id' and branch_id = '$branc' and dateprocess = '$date' ";
                                    $resulta = mysqli_query($con,$sqlforselect); // run query
                                    

   
                 
                    if ($resulta) {
                     
                                      while($row = mysqli_fetch_array($resulta)){
                                        $invoice_no = $row['invoice_no'];
                                  
                                     } 
                                      $update = "UPDATE `trans_record` SET `invoice_no`='$invoice_no'  WHERE user_id = '$id' and transaction_type = 'walk in' and status = 'approved'  ";
                                      $resultangupdate = mysqli_query($con,$update); // run query

                                    ?>
                                    <script type="text/javascript">
                                      
                         window.location.href="transactall.php?topay&userid=<?php echo $id?>&invoice_no=<?php echo $invoice_no?>";      

                                            
                                    </script>
                                    <?php
                                  }else {
                                    echo "fail";
                                  }
                   

                  

                              


                       
                                  
                                  
           
  
}


 if(isset($_GET['topayreserve'])){ 

     $trackid =$_GET['trackid'];
                $userid = $_GET['userid'];
              
       $branc = $_SESSION["branchid"];



                 $sql = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`) VALUES ('$userid','$branc',now()) ";
                                $result = mysqli_query($con,$sql); // 

                                $unique = "select * from invoice_record  where user_id = '$userid' and branch_id = '$branc' ";
                                $resulte = mysqli_query($con,$unique); // 
                                 while($rows = mysqli_fetch_array($resulte)){
                                        $date = $rows['dateprocess'];
                                  
                                     } 


                        $sqlforselect = " select * from `invoice_record` where user_id = '$userid' and branch_id = '$branc' and dateprocess = '$date' ";
                                    $resulta = mysqli_query($con,$sqlforselect); // run query
                                   
                                   //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                    if ($resulta) {
                                      while($row = mysqli_fetch_array($resulta)){
                                        $invoice_no = $row['invoice_no'];
                                  
                                     } 
                                      $update = "UPDATE `trans_record` SET `invoice_no`='$invoice_no'  WHERE track_id = $trackid ";
                                      $resultangupdate = mysqli_query($con,$update); // run query
                                    ?>
                                    <script type="text/javascript">
                                      
                 window.location.href="transact_reserve.php?topay&trackid=<?php echo $trackid?>&userid=<?php echo $userid?>&invoice_no=<?php echo $invoice_no
                                      ?>"      
                                            
                                    </script>
                                    <?php
                                  } 

   }


   if(isset($_GET['checkoutallreserveuser'])){
$id = $_GET['id'];
 $branc = $_SESSION["branchid"];


   $makeinvoice = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`) VALUES ('$id','$branc',now()) ";
                                $resultinvoice = mysqli_query($con,$makeinvoice); // 

                              

                                $unique = "select * from invoice_record  where user_id = '$id' and branch_id = '$branc' ";
                                $resulte = mysqli_query($con,$unique); // 
                              
                                 while($rows = mysqli_fetch_array($resulte)){
                                        $date = $rows['dateprocess'];
                                  
                                     } 
                                
                                   $sqlforselect = " select * from `invoice_record` where user_id = '$id' and branch_id = '$branc' and dateprocess = '$date' ";
                                    $resulta = mysqli_query($con,$sqlforselect); // run query
                                    

   
                 
                    if ($resulta) {
                     
                                      while($row = mysqli_fetch_array($resulta)){
                                        $invoice_no = $row['invoice_no'];
                                  
                                     } 
                                      $update = "UPDATE `trans_record` SET `invoice_no`='$invoice_no'  WHERE user_id = '$id' and transaction_type = 'reservation' and status = 'approved'  ";
                                      $resultangupdate = mysqli_query($con,$update); // run query

                                    ?>
                                    <script type="text/javascript">
                                      
                         window.location.href="transactall_reserve.php?topay&userid=<?php echo $id?>&invoice_no=<?php echo $invoice_no?>";      

                                            
                                    </script>
                                    <?php
                                  }else {
                                    echo "fail";
                                  }
                   

                  

                              


                       
                                  
                                  
           
  
}


if(isset($_GET['newtrans'])){ 
   $branc = $_SESSION["branchid"];
   $usertempid = rand(10,10000000);
  
  $makeinvoice = "INSERT INTO `invoice_record`(`tempuserid`, `branch_id`, `dateprocess`) VALUES ('$usertempid','$branc',now()) ";
                                $resultinvoice = mysqli_query($con,$makeinvoice); // 

                                  $unique = "select * from invoice_record  where tempuserid = '$usertempid' and branch_id = '$branc' ";
                                $resulte = mysqli_query($con,$unique); // 
                              
                                 while($rows = mysqli_fetch_array($resulte)){
                                        $date = $rows['dateprocess'];
                                  
                                     } 
                                $sqlforselect = " select * from `invoice_record` where tempuserid = '$usertempid' and branch_id = '$branc' and dateprocess = '$date' ";
                                    $resulta = mysqli_query($con,$sqlforselect); // run query
                                    

   
                 
                    if ($resulta) {
                     
                                      while($row = mysqli_fetch_array($resulta)){
                                        $invoice_no = $row['invoice_no'];
                                  
                                     } 
                                     

                                    ?>
                                    <script type="text/javascript">
                                      
                         window.location.href="newtrans.php?topay&userid=<?php echo $usertempid?>&invoice_no=<?php echo $invoice_no?>";      

                                            
                                    </script>
                                    <?php
                                  }else {
                                    echo "fail";
                                  }
                   

                  

                              

  
}

 if(isset($_POST['proceedcust'])){ 

   $userid = $_POST['txtuserid'];
 

    $branc = $_SESSION["branchid"];
  

  $makeinvoice = "INSERT INTO `invoice_record`(`user_id`, `branch_id`, `dateprocess`) VALUES ('$userid','$branc',now()) ";
                                $resultinvoice = mysqli_query($con,$makeinvoice); // 

                                 $unique = "select * from invoice_record  where user_id = '$userid' and branch_id = '$branc' ";
                                $resulte = mysqli_query($con,$unique); // 
                          
                                 while($rows = mysqli_fetch_array($resulte)){
                                        $date = $rows['dateprocess'];
                                  
                                     } 
                                $sqlforselect = " select * from `invoice_record` where user_id = '$userid' and branch_id = '$branc' and dateprocess = '$date' ";
                                    $resulta = mysqli_query($con,$sqlforselect); // run query
                                    

   
                 
                    if ($resulta) {
                     
                                      while($row = mysqli_fetch_array($resulta)){
                                        $invoice_no = $row['invoice_no'];
                                  
                                     } 
                                     

                                    ?>
                                    <script type="text/javascript">
                                      
                         window.location.href="newcusttrans.php?topay&userid=<?php echo $userid?>&invoice_no=<?php echo $invoice_no?>";      

                                            
                                    </script>
                                    <?php
                                  }else {
                                    echo "fail";
                                  }
                   

                  

                              

 }

    ?>