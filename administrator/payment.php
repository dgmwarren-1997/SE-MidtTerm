<?php
session_start();
if(!isset($_SESSION["admin_id"])){
header("location:index.php");
}
?> 
	
	
		<?php 
		include 'connection/connect.php';

		if(isset($_GET['btnpayin'])){
		$invoice = $_GET['invoice'];
		$txtamount = $_GET['txtamount'];
		$txtchange = $_GET['txtchange'];
		$totalcost = $_GET['totalcost'];
		$userid = $_GET['userid'];
		$admin = $_SESSION["name"];

								$sql = " UPDATE `invoice_record` SET `total`='$totalcost',`amount_rendered`='$txtamount',`amount_change`='$txtchange' WHERE invoice_no  = '$invoice'  ";
						                $result = mysqli_query($con,$sql); // run query
						              
						           if ($result) {
						           	 $update = "UPDATE `trans_record` SET 
												`transaction_type`='checkout' ,`stat_checkout`='completed',`status`='completed' , `datecompleted`= now() WHERE user_id = '$userid' and invoice_no = '$invoice' ";
												 $resulta = mysqli_query($con,$update); // run query
												 if($resulta) {
												 					$sqlselect = " select * from trans_record where invoice_no = '$invoice'  ";
												 		                $resultaa = mysqli_query($con,$sqlselect); // run query
												 		             
												 		             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
												 		                 while($row = mysqli_fetch_array($resultaa)){

												 							$pro_id = $row['prod_id'];
												 							$qtyy = $row['quantity'];
												 							
												 							
													 							
													 						 $selectprod = "select * from product where prod_id = '$pro_id'";
												 		                   $resulta = mysqli_query($con,$selectprod); // run query
												 		                    $count= mysqli_num_rows($resulta);
												 		             			 while($rows = mysqli_fetch_array($resulta)){
												 		                 	$stock = $rows['stock'];
												 		                 	$prod_ide= $rows['prod_id']; 
												 		                		$stockupdate = $stock - $qtyy;
												 		                	
													 							

													 							for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				  $updateqty = "UPDATE `product` SET `stock`='$stockupdate' WHERE prod_id ='$prod_ide' ";
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$updateqty); // run query*/
												 		                		
												 		                	 }	

												 		                	 


												 		                 }
												 		                 


												 		          
												 	?>
												    
												 	
				 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		 <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
  
		 	<div class="container-fluid"> 
		 	<div class="col">
			 <div class="	" style="text-align: center; justify-content: center; margin-top: 200px">
			 	<h1><strong>Payment Successfully Saved <i style="color:green" class="fas fa-check-circle"></i></strong></h1>
			 	<br>
			 	 
			 	 
			 	   <a href="receipt.php?btnview&invoice=<?php echo $invoice?>&txtamount=<?php echo $txtamount?>&txtchange=<?php echo $txtchange?>&totalcost=<?php echo $totalcost?>&userid=<?php echo $userid?>&admin=<?php echo $admin?>" target="_blank" type="submit" name="btnview" class="btn btn-success"  style="width: 200px">View Receipt <i class="fas fa-eye"></i></a>	                  
			 	
			 	
			 	
			 	<a href="sales.php?orders&walkin" class="btn btn-info" style="width: 200px">New Transaction <i class="far fa-file"></i></a>
			 </div> 
			 <!--end of 	-->
			<div class="back">
		  	
	 				</div>
	 				<br><br><br> 
	 				<br><br><br> 
	 				<br>
	 				<div class="bottom">
		  	
	 				</div> 

		  <!--end of -->
		  <style type="text/css">
		  	.back {
		  		background-image: url(https://image.freepik.com/free-vector/abstract-design-background_1048-8430.jpg);
		  		height: 200px;
		  		background-repeat: no-repeat;
		  		position: absolute;
		  		width: 450px;
		  		top: 0;
		  	}
		  	.bottom {
		  		background-image: url(https://image.freepik.com/free-vector/abstract-design-background_1048-8430.jpg);
		  		height: 200px;
		  		background-repeat: no-repeat;
		  		
		  		width: 450px;
		  		transform: scaleY(-1);
		  		transform: scaleX(-1);
		  		float: right;
		  	}
		  </style>
		  </div>
</div>
				<?php


												 } 
						           }

							
				
		
		}

		?> <!--end file-->
