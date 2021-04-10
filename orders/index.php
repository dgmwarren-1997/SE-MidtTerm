<?php 
	session_start();

if (isset($_SESSION['access_token'])) { ////////////////////////////////////////////////////////////////////////gmail users
    
    if (isset($_POST['transtype'])) {
 include '../administrator/connection/connect.php';
        $trans_type =$_POST['transtype'];
            	$email =$_SESSION['email'] ;
	
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                           
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                           if ($trans_type == 'walk in') { ////////////////////////////////////////////////////////////////////////////////////////for walkin
                          
                              $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				  $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`, `status`) VALUES ('$userid','$prodid','$qty','$total',now(),'$trans_type','false','pending') ";
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
}
/* Center the loader */
#loader {
    background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your Order Click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    }else {
       ?>
        <script>
            alert("please Select Item First before doing proceedings! thankyou..");
            window.location.href="../category";
        </script>
        <?php 
    }
    
    }else  if ($trans_type == 'reservation') { ////////////////////////////////////////////////////////////////////////////////////////////////for reservation
        
            
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css" />

</head>
<title>CheckOut</title>
<?php 
    include '../administrator/connection/connect.php';
?>
</head>

<body>
<form method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                     
                </div>
                <div class="col">
                    <h5 style="margin-top:220px">SELECT TARGET DATE <br> for Reservation :</h5>
                     <input type="datetime-local" name="datetarget" class="form-control" Placeholder="Select Date" >
                     <br>
                           <input type="submit" name="btnsubmit"  class="btn btn-dark form-control" value="SELECT" style="height:50px">   
                </div>
                  <div class="col">
                     
                </div>
            </div>
                    
                        
                   
        </div>
         </form>


<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
 
 <?php
         
       
    }else {
         ?>
        <script>
            alert("Please Specify transaction Type and Select Items first before proceedings! thankyou..");
            window.location.href="../cart";
        </script>
        <?php 
    }
 
} else  if (isset($_POST['btnsubmit'])) {
        include '../administrator/connection/connect.php';
        	$email =$_SESSION['email'] ;
        	 $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                           
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
        $datetarget= $_POST['datetarget'];
           $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				  $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`target_date`,`stat_checkout`, `status`) VALUES ('$userid','$prodid','$qty','$total',now(),'reservation','$datetarget','false','pending') ";
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }else {
                         
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
}
/* Center the loader */
#loader {
    background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your Order Click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    } else {
        ?>
        <script>
            alert("please Select Item First before doing proceedings! thankyou..");
            window.location.href="../category";
        </script>
        <?php 
    }   
    }
    
    
    
    
}else if (isset($_SESSION['user_id'])) { //////////////////////////////////////////////////////////////personal users
        
    if (isset($_POST['transtype'])) {
 include '../administrator/connection/connect.php';
        $trans_type =$_POST['transtype'];
            	$userid =$_SESSION['user_id'] ;
	
			   
                           if ($trans_type == 'walk in') { ////////////////////////////////////////////////////////////////////////////////////////for walkin
                          
                              $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				  $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`stat_checkout`, `status`) VALUES ('$userid','$prodid','$qty','$total',now(),'$trans_type','false','pending') ";
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
}
/* Center the loader */
#loader {
    background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your Order Click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    }else {
        echo 'fail';
    }
    
    }else  if ($trans_type == 'reservation') { ////////////////////////////////////////////////////////////////////////////////////////////////for reservation
        
            
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />

<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css" />

</head>
<title>CheckOut</title>
<?php 
    include '../administrator/connection/connect.php';
?>
</head>

<body>
<form method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                     
                </div>
                <div class="col">
                    <h5 style="margin-top:220px">SELECT TARGET DATE <br> for Reservation :</h5>
                     <input type="datetime-local" name="datetarget" class="form-control" Placeholder="Select Date" >
                     <br>
                           <input type="submit" name="btnsubmit"  class="btn btn-dark form-control" value="SELECT" style="height:50px">   
                </div>
                  <div class="col">
                     
                </div>
            </div>
                    
                        
                   
        </div>
         </form>


<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
 
 <?php
         
       
    }
 
} else  if (isset($_POST['btnsubmit'])) {
        include '../administrator/connection/connect.php';
        	$userid =$_SESSION['user_id'] ;
        	 
                              
        $datetarget= $_POST['datetarget'];
           $insertcart = "select * from cart where user_id = '$userid'  ";
                             $resultcart = mysqli_query($con,$insertcart); // run query
                                 $count= mysqli_num_rows($resultcart); 
                        if ($count >=1) {
                              
                                 
                              while($row = mysqli_fetch_array($resultcart)){
                                  $prodid = $row['prod_id'];
                                  $qty = $row['qty'];
                                  $total = $row['total'];
                                    
                                                                	for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)

																				  
																				  $insert = "  INSERT INTO `trans_record`(`user_id`, `prod_id`, `quantity`, `total`, `dateandtime`, `transaction_type`,`target_date`,`stat_checkout`, `status`) VALUES ('$userid','$prodid','$qty','$total',now(),'reservation','$datetarget','false','pending') ";
																				}
												 		            
												 		                		 $resultaaa = mysqli_query($con,$insert); // run query*/  
                                 
                                    
                              }
                        }else {
                         
                        }
                        if ( $resultaaa) {
                              $deletecartitem = "DELETE FROM `cart` WHERE user_id= '$userid'";
                                 mysqli_query($con,$deletecartitem); 
                            
        
 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
}
/* Center the loader */
#loader {
    background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);
    	background-repeat:no-repeat;
    	background-size:100% 100%;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
i {
   margin-top:100px;  
   font-size:80px;
   color:white;
}

h1 {
   
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
                             <i style="" class='fas fa-check-circle'></i>
     <h1>Transaction  Completed. <br>thankyou!</h1> <br>
        <h4> To see the status of your Order Click <a href="../orders/orders.php">HERE</a>  <br> <br>To make some more orders click  <a href="../category">HERE</a></h4>
    
 
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

 <?php   
    } else {
        echo 'fail';
        echo $datetarget;
    }   
    }
    
    
    
}else {
    ?>
    <script>window.location.href="../home/index.php"</script>
    <?php
}

?>
