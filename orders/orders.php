<?php
	session_start();

  
	if (isset($_SESSION['access_token'])) {//////////////////////////////////////////////////////////////////////////////////////GOogle Login
		include '../administrator/connection/connect.php';
	  $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
	    ?>
	    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />

<!-- Orders Tab CSS --> 
<link rel="stylesheet" type="text/css" href="../css/orders.css" />

<!-- Orders Tab JS --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<title>Orders</title>
</head>

<body>


<header>


<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
      
        
	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>






<!-- ORDERS  --> 
<article>

<div class="container m-auto">
<div class="row">

<div class="col-lg-3 col-md-4 col-sm-4">
	
<div class="ordersh">
  <img src="../img/logo_orders.png" alt="logo" />
</div>

</div>

<!-- ORDERS TAB --> 
<div class="col-lg-9 col-md-9 col-sm-9">
<div class="orderstab">

    <ul id="myTab" class="nav nav-tabs">
        <li class="nav-item">
            <a href="#a" class="nav-link active" data-toggle="tab">Pending</a>
        </li>
       
        <li class="nav-item">
            <?php 
            include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                              $orderscountforwalkin = "select * from trans_record where user_id = '$userid' and status='approved' and transaction_type = 'walk in' and status='approved' ";
                               $resultcount = mysqli_query($con,$orderscountforwalkin);
                                $countwalkin= mysqli_num_rows($resultcount); 
                               
                                $orderscountforreservation = "select * from trans_record where user_id = '$userid' and status='approved' and transaction_type = 'reservation' and status='approved' ";
                               $resultcounts = mysqli_query($con,$orderscountforreservation);
                                $countreservation= mysqli_num_rows($resultcounts); 
            ?>
            <a href="#c" class="nav-link" data-toggle="tab">Walk In <span class="badge btn btn-dark"><?php echo $countwalkin?></span></a>
        </li>
        <li class="nav-item">
            <a href="#d" class="nav-link" data-toggle="tab">Reservation <span class="badge btn btn-dark"><?php echo $countreservation?></span></a>
        </li>
        <li class="nav-item">
            <a href="#e" class="nav-link" data-toggle="tab">Completed</a>
        </li>
        <li class="nav-item">
            <a href="#f" class="nav-link" data-toggle="tab">Cancelled</a>
        </li>
    </ul>
	
	
    <div class="tab-content mt-3">
	
	<!-- All Tab  --> 
        <div class="tab-pane fade show active" id="a">
		    <?php 
		        include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                               $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.dateandtime , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'pending' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> || Order Created at : <?php echo date("F jS, Y", strtotime($row['dateandtime']))?> </p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have pending orders. </h5>
                                   <?php
                               }
		    
		    ?>
		    
		
			

        </div>
		

		
	<!--walk in --> 		
        <div class="tab-pane fade" id="c">
		
		

		 <?php 
		        include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                                $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.Order_accepted,trans_record.target_date , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'approved' and trans_record.transaction_type= 'walk in' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                                $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> || Order Accepted at : <?php echo date("F jS, Y", strtotime($row['Order_accepted']))?> <br> Expiry date : <?php echo date("F jS, Y", strtotime($row['target_date']))?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have Walk in Approved orders. </h5>
                                   <?php
                               }
		    
		    ?>
		    
		
        </div>
		
	<!-- reservation  --> 
        <div class="tab-pane fade" id="d">
		
			

		 <?php 
		        include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.Order_accepted,trans_record.target_date, trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'approved' and trans_record.transaction_type ='reservation' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                                $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> || Order Accepted at : <?php echo date("F jS, Y", strtotime($row['Order_accepted']))?> <br> Expiry date : <?php echo date("F jS, Y", strtotime($row['target_date'])) ?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have Reservation orders. </h5>
                                   <?php
                               }
		    
		    
		    
		    ?>
		    
		
        </div>
		
	<!-- Completed  --> 
        <div class="tab-pane fade" id="e">
		
		

		<?php 
		        include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.datecompleted , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'completed' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                               $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> ||  Date Completed at : <?php echo $row['datecompleted']?> || Invoice No : #<?php echo $row['invoice_no']?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?> </h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have any completed orders yet. </h5>
                                   <?php
                               }
		    
		    
		    ?>
		    
		
		

        </div>
		
	<!-- Cancelled  --> 
        <div class="tab-pane fade" id="f">

		<?php 
		        include '../administrator/connection/connect.php';
                
                	$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'cancelled' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                               $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have Cancelled orders. </h5>
                                   <?php
                               }
		    
		    ?>
		    
		
		
        </div>
		
    </div>
</div>
</div>

</div>
</div>

</article>








<div class="slider"></div>

<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            var activeTab = $(e.target).text(); 
            var previousTab = $(e.relatedTarget).text(); 
            $(".active-tab span").html(activeTab);
            $(".previous-tab span").html(previousTab);
        });
    });
</script>

<script src="../js/nav.js"></script>
</body>

</html> 
	    <?php
	    
	}
	else if(isset($_SESSION['user_id'])) { ////////////////////////////////////////////////////////////////////////////USer personal
		include '../administrator/connection/connect.php';
	  $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
	    ?>
	    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />

<!-- Orders Tab CSS --> 
<link rel="stylesheet" type="text/css" href="../css/orders.css" />

<!-- Orders Tab JS --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<title>Orders</title>
</head>

<body>


<header>


<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
      
        
	
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>






<!-- ORDERS  --> 
<article>

<div class="container m-auto">
<div class="row">

<div class="col-lg-3 col-md-4 col-sm-4">
	
<div class="ordersh">
  <img src="../img/logo_orders.png" alt="logo" />
</div>

</div>

<!-- ORDERS TAB --> 
<div class="col-lg-9 col-md-9 col-sm-9">
<div class="orderstab">

    <ul id="myTab" class="nav nav-tabs">
        <li class="nav-item">
            <a href="#a" class="nav-link active" data-toggle="tab">Pending</a>
        </li>
       
        <li class="nav-item">
            <?php 
            include '../administrator/connection/connect.php';
                
                	$userid =$_SESSION['user_id'] ;
		
			   
                              
                              $orderscountforwalkin = "select * from trans_record where user_id = '$userid' and status='approved' and transaction_type = 'walk in' and status='approved' ";
                               $resultcount = mysqli_query($con,$orderscountforwalkin);
                                $countwalkin= mysqli_num_rows($resultcount); 
                               
                                $orderscountforreservation = "select * from trans_record where user_id = '$userid' and status='approved' and transaction_type = 'reservation' and status='approved' ";
                               $resultcounts = mysqli_query($con,$orderscountforreservation);
                                $countreservation= mysqli_num_rows($resultcounts); 
            ?>
            <a href="#c" class="nav-link" data-toggle="tab">Walk In <span class="badge btn btn-dark"><?php echo $countwalkin?></span></a>
        </li>
        <li class="nav-item">
            <a href="#d" class="nav-link" data-toggle="tab">Reservation <span class="badge btn btn-dark"><?php echo $countreservation?></span></a>
        </li>
        <li class="nav-item">
            <a href="#e" class="nav-link" data-toggle="tab">Completed</a>
        </li>
        <li class="nav-item">
            <a href="#f" class="nav-link" data-toggle="tab">Cancelled</a>
        </li>
    </ul>
	
	
    <div class="tab-content mt-3">
	
	<!-- All Tab  --> 
        <div class="tab-pane fade show active" id="a">
		    <?php 
		        include '../administrator/connection/connect.php';
                
                $userid =$_SESSION['user_id'] ;
		
			   
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.dateandtime , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'pending' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> || Order Created at : <?php echo date("F jS, Y", strtotime($row['dateandtime']))?> </p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have pending orders. </h5>
                                   <?php
                               }
		    
		    ?>
		    
		
			

        </div>
		

		
	<!--walk in --> 		
        <div class="tab-pane fade" id="c">
		
		

		 <?php 
		        include '../administrator/connection/connect.php';
                
                $userid =$_SESSION['user_id'] ;
		
			    
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.Order_accepted,trans_record.target_date , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'approved' and trans_record.transaction_type= 'walk in' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                                $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> || Order Accepted at : <?php echo date("F jS, Y", strtotime($row['Order_accepted']))?> <br> Expiry date : <?php echo date("F jS, Y", strtotime($row['target_date']))?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have Walk in Approved orders. </h5>
                                   <?php
                               }
		    
		    
		    ?>
		    
		
        </div>
		
	<!-- reservation  --> 
        <div class="tab-pane fade" id="d">
		
			

		 <?php 
		        include '../administrator/connection/connect.php';
                
                $userid =$_SESSION['user_id'] ;
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.Order_accepted,trans_record.target_date, trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'approved' and trans_record.transaction_type ='reservation' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                                $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> || Order Accepted at : <?php echo date("F jS, Y", strtotime($row['Order_accepted']))?> <br> Expiry date : <?php echo date("F jS, Y", strtotime($row['target_date'])) ?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have Reservation orders. </h5>
                                   <?php
                               }
		    
		    
		    ?>
		    
		
        </div>
		
	<!-- Completed  --> 
        <div class="tab-pane fade" id="e">
		
		

		<?php 
		        include '../administrator/connection/connect.php';
                
                $userid =$_SESSION['user_id'] ;
                              
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type,trans_record.invoice_no,trans_record.datecompleted , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'completed' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                               $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?> ||  Date Completed at : <?php echo $row['datecompleted']?> || Invoice No : #<?php echo $row['invoice_no']?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?> </h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have any completed orders yet. </h5>
                                   <?php
                               }
		    
		    
		    ?>
		    
		
		

        </div>
		
	<!-- Cancelled  --> 
        <div class="tab-pane fade" id="f">

		<?php 
		        include '../administrator/connection/connect.php';
                
                $userid =$_SESSION['user_id'] ;
                              $selectitem = "select product.photo , product.name , product.description , trans_record.quantity,trans_record.transaction_type , trans_record.total from product inner join trans_record on product.prod_id = trans_record.prod_id where status = 'cancelled' and trans_record.user_id= '$userid'";
                               $resultselect = mysqli_query($con,$selectitem); // run query
                               
                               $countit= mysqli_num_rows($resultselect);
                               if($countit>=1) {
                                   
                               
                                while($row = mysqli_fetch_array($resultselect)){
                                      $image = $row['photo'];
                                      $image_src = "../administrator/bin/Item_Images/".$image;
                                  ?>
                                  	<div class="item-tab-list">
                    				<a href="#"><img src="<?php echo $image_src?>" alt="tabitem" height="120"/></a>
                    				<div class="card">
                    					<div class="card-body">
                    						<h5 class="card-title"><?php echo $row['name']?></h5>
                    						<p class="card-text"><?php echo $row['description']?>.. <br> Transaction Type : <?php echo $row['transaction_type']?> <br> Quantity : <?php echo $row['quantity']?></p>
                    						Amount Due :<h4 > ₱ <?php echo $row['total']?></h4>
                    					</div>
                    				</div>
                    			</div>
                                  <?php
                                    
                              }
                               }else {
                                   ?>
                                   <h5 style="text-align:center;margin-top:100px;">You dont have Cancelled orders. </h5>
                                   <?php
                               }
		    
		    ?>
		    
		
		
        </div>
		
    </div>
</div>
</div>

</div>
</div>

</article>








<div class="slider"></div>

<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            var activeTab = $(e.target).text(); 
            var previousTab = $(e.relatedTarget).text(); 
            $(".active-tab span").html(activeTab);
            $(".previous-tab span").html(previousTab);
        });
    });
</script>

<script src="../js/nav.js"></script>
</body>

</html> 
	    <?php
	}else {
	    ?>
	        <script>window.location.href="../signin"</script>
	    <?php
	}
?>
