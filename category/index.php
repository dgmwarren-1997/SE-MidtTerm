<?php
	session_start();

	 if (isset($_SESSION['access_token'])) { //////////////////////////////////////////////////////////////////USER GMAIL ACCOUNT
	  ?>
	  	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- /.carousel-indicators -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<link rel="stylesheet" type="text/css" href="../css/categories.css" />
 <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

</head>
<title>Categories</title>
<?php 
    include '../administrator/connection/connect.php';
?>
</head>

<body>


<header>

<nav>

    <div class="logo ">
        <a href="../home "><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
        <li><a href="../orders/orders.php">ORDERS</a></li>
        <li><a href="#" onclick="logout()">SIGNOUT</a></li>
		<div class="dropdown">
		<?php 
			$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                           
                       ?>
                       	<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" style="background-color: white;color: black"><?php echo $countcart?></span></button>
                       <?php
			?>
				<div class="dropdown-content" style="right:0";>
			    
				<?php 
				        $selectallitemcart = "select * from cartview where user_id = '$userid'";
				         $resulta = mysqli_query($con,  $selectallitemcart);
				          $countcarts= mysqli_num_rows($resulta);
				          if($countcarts >=1) {
				          while($row = mysqli_fetch_array($resulta)){
				              $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                                ?>
                                <a onclick="clickdirect()">
				<img src="<?php echo $image_src?>" class="itemphoto"alt="" height="80"> 
				<div class="textarea">
				<b class="hantechcolordropdown">Product Name:</b> <?php echo $row['name']?> <br>
				<b class="hantechcolordropdown">Product Code:</b><?php echo $row['prod_id']?> <br>
				<b class="hantechcolordropdown">Quantity:</b><?php echo $row['qty']?> X ₱<?php echo $row['price']?> <br>
				<b class="hantechcolordropdown">Amount Due:</b> ₱<?php echo $row['total']?>
				</div>
				</a>

                                <?php
                                    
                              }
				              
				          }else {
				              echo '<h4 style="text-align:center;margin-top:20px;">Empty Cart</h4>';
				          }
				        
				?>
				
				
				
				<hr>
				<a  onclick="clickdirect()" class="viewshopcart" >View Shopping Cart</a>
				</div>
			
		</div>		
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
</nav>
	

</header>


		

<div class="main">
  
    		<?php 
			$email =$_SESSION['email'] ;
		
			     $sql = " select * from user_account where email = '$email'  ";
                             $result = mysqli_query($con,$sql); // run query
                             $count= mysqli_num_rows($result); // to count if necessary
                        
                              while($row = mysqli_fetch_array($result)){
                                    $userid = $row['user_id'];
                                    
                              }
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                           
                       ?>
                      	<button class="btn btn-dark pota" onclick="clickdirect()" style="width: 84px;float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light" style="background-color: white;color: black"><?php echo $countcart?></span></button>
                       <?php
			?>
    
    	
<form method="post" action="../category-action/index.php">			
  <div class="input-group">
    <input type="text" class="form-control texttt" name="txtsearch" placeholder="Search" >
    <div class="input-group-append">
      <button class="btn dfcolor " type="submit" name="btnsub">
          		
        <i class="fa fa-search"></i>
      </button>
    </div>
   
  </div>
  </form>
  
</div>


<div class="caroubg">
<div id="main">
<button class="openbtn" onclick="openNav()">☰</button>  

<style>
.pota {
    display:none;
}
    @media screen and (max-width:450px) and (min-width:400px) {
     
        .pota {
            display:inline-block;
            position:absolute;
            top:65px;
            left:335px;
        }
        .hideonmobi {
            display:none;
        }
        .carouselitem {
            width:100%;
            margin-left:-26px;
        
            
            
        }
        .carousel-indicators {
            margin-left:115px;
        }
        .dfcolor {
            background-color:black;
            color:white;
        }
        .img-fluid {
            height:300px;
        }
        .mobi {
            width:700px;
        }
       .card {
            width:400px;
            margin-left:-88px;
        }
   
    }
    @media screen and (max-width:400px) and (min-width:360px) { 
       
           .pota {
            display:inline-block;
            position:absolute;
            top:55px;
            left:240px;
        }
        .hideonmobi {
            display:none;
        }
        .carouselitem {
       width:300px;
           
        
            
            
        }
        .carousel-indicators {
            margin-left:36px;
        }
        .dfcolor {
            background-color:black;
            color:white;
        }
        .img-fluid {
            height:400px;
        }
        .mobi {
            width:700px;
        }
       .card {
            width:320px;
            margin-left:-84px;
        }
        .openbtn {
            margin-right:150px;
        }
        .carousel-inner {
            width:320px;
            margin-left:-25px;
          
        }
       
      
     }
</style>
<!-- Carousel -->
<div class="container carouselitem">
    
       	<div class="carousel slide" id="main-carousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol>
			
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block img-fluid ss" src="../img/a101.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid ss" src="../img/a102.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
					
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid ss" src="../img/a103.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
			</div>			
		</div>

</div>
</div>
</div>


<!-- Font Awesome Version 5.15.2 -->
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<hr>
		<a href="../category"><i class="fas fa-bars"></i> All</a><hr class="hrcate">
	<a href="../category-action/index.php?Food_category"><i class="fas fa-utensils"></i> Food</a><hr class="hrcate">
	<a href="../category-action/index.php?Clothing_category"><i class="fas fa-tshirt"></i> Clothing</a><hr class="hrcate">
	<a href="../category-action/index.php?Beverages_category"><i class="fas fa-cocktail"></i> Beverages</a><hr class="hrcate">
	<a href="../category-action/index.php?Cosmetics_category"><i class="fas fa-spa"></i> Cosmetics</a><hr class="hrcate">
	<a href="../category-action/index.php?Others_category"><i class="fas fa-ellipsis-h"></i> Others</a><hr class="hrcate">


	<div class="sblogo"><img src="../img/logo_sb.png" alt="logo"></div>
</div>



<hr>


<div class="items">
<div class="row">

<?php 
          
                
                  $sql = " select * from product";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                     		for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
		  
								$array[i] = $row['prod_id'];												
						}
                     
                    ?>
 <!--item-->	<div class="col-lg-3 col-md-6 mb-4 ">	
		<div class="card h-100">
			<a href="#"><img class="card-img-top" height="300" src="<?php echo $image_src?>" id="imahe" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <h5>₱<?php echo $row['price']?></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
					
				<form method="post" action="../category-action/index.php">
				    <input type="hidden" value="<?php echo $row['prod_id']?>" name="prod_id" >
				<button type="submit" class="btn btn-outline-dark "  name="addtocart"><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
			
              </div>
		</div>
		</div>
          <?php
                 }
          

          

            

   
?>

		
			
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<!-- FOOTER --> 
<footer>
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-service" target="_blank" class="termsofservice">Terms of Service</a><h4>
			<hr>
			<h4>Han Tech Inventory System © 2021</h4>
			<h6>Warren Josiah de Guzman I Nadeer Mukaram I Ryan Peñosa Camonias I Reenjay Caimor I Kerzen Dalman Lañojan</h6>		
		</div>
	
	</div>	
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="../js/nav.js"></script>


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "210px";
  document.getElementById("main").style.marginLeft = "200px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
 function clickdirect() {
    window.location.href="../cart";
}
function logout() {
    window.location.href="../signin/logout.php";
}
</script>

</body>

</html>
	  <?php
	}else if(isset($_SESSION['user_id'])) { /////////////////////////////////////////////////////////////USER PERSONAL ACCOUNT
	     ?>
	   	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- /.carousel-indicators -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<link rel="stylesheet" type="text/css" href="../css/categories.css" />
 <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

</head>
<title>Categories</title>
<?php 
    include '../administrator/connection/connect.php';
?>
</head>

<body>


<header>

<nav>

    <div class="logo ">
        <a href="../home "><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
       <li><a href="../orders/orders.php">ORDERS</a></li>
        <li><a href="#" onclick="logout()">SIGNOUT</a></li>
		<div class="dropdown">
		<?php 
		    $userid = $_SESSION['user_id'];
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                           
                       ?>
                       	<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" style="background-color: white;color: black"><?php echo $countcart?></span></button>
                       <?php
			?>
				<div class="dropdown-content" style="right:0";>
			    
				<?php 
				        $selectallitemcart = "select * from cartview where user_id = '$userid'";
				         $resulta = mysqli_query($con,  $selectallitemcart);
				          $countcarts= mysqli_num_rows($resulta);
				          if($countcarts >=1) {
				          while($row = mysqli_fetch_array($resulta)){
				              $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                                ?>
                                <a onclick="clickdirect()">
				<img src="<?php echo $image_src?>" class="itemphoto"alt="" height="80"> 
				<div class="textarea">
				<b class="hantechcolordropdown">Product Name:</b> <?php echo $row['name']?> <br>
				<b class="hantechcolordropdown">Product Code:</b><?php echo $row['prod_id']?> <br>
				<b class="hantechcolordropdown">Quantity:</b><?php echo $row['qty']?> X ₱<?php echo $row['price']?> <br>
				<b class="hantechcolordropdown">Amount Due:</b> ₱<?php echo $row['total']?>
				</div>
				</a>

                                <?php
                                    
                              }
				              
				          }else {
				              echo '<h4 style="text-align:center;margin-top:20px;">Empty Cart</h4>';
				          }
				        
				?>
				
				
				
				<hr>
				<a  onclick="clickdirect()" class="viewshopcart" >View Shopping Cart</a>
				</div>
		</div>		
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
</nav>
	

</header>


		

<div class="main">
  
    		<?php 
		  $userid = $_SESSION['user_id'];
		
			    
                    $cartcount = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcount); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                           
                       ?>
                      	<button class="btn btn-dark pota" onclick="clickdirect()" style="width: 84px;float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light" style="background-color: white;color: black"><?php echo $countcart?></span></button>
                       <?php
			?>
    
    	
<form method="post" action="../category-action/index.php">			
  <div class="input-group">
    <input type="text" class="form-control texttt" name="txtsearch" placeholder="Search" >
    <div class="input-group-append">
      <button class="btn dfcolor " type="submit" name="btnsub">
          		
        <i class="fa fa-search"></i>
      </button>
    </div>
   
  </div>
  </form>
  
</div>


<div class="caroubg">
<div id="main">
<button class="openbtn" onclick="openNav()">☰</button>  

<style>
.pota {
    display:none;
}
    @media screen and (max-width:450px) and (min-width:400px) {
     
        .pota {
            display:inline-block;
            position:absolute;
            top:65px;
            left:335px;
        }
        .hideonmobi {
            display:none;
        }
        .carouselitem {
            width:100%;
            margin-left:-26px;
        
            
            
        }
        .carousel-indicators {
            margin-left:115px;
        }
        .dfcolor {
            background-color:black;
            color:white;
        }
        .img-fluid {
            height:300px;
        }
        .mobi {
            width:700px;
        }
       .card {
            width:400px;
            margin-left:-88px;
        }
   
    }
     @media screen and (max-width:400px) and (min-width:360px) { 
       
           .pota {
            display:inline-block;
            position:absolute;
            top:55px;
            left:240px;
        }
        .hideonmobi {
            display:none;
        }
        .carouselitem {
       width:300px;
           
        
            
            
        }
        .carousel-indicators {
            margin-left:36px;
        }
        .dfcolor {
            background-color:black;
            color:white;
        }
        .img-fluid {
            height:400px;
        }
        .mobi {
            width:700px;
        }
       .card {
            width:320px;
            margin-left:-84px;
        }
        .openbtn {
            margin-right:150px;
        }
        .carousel-inner {
            width:320px;
            margin-left:-25px;
          
        }
      
     }
</style>
<!-- Carousel -->
<div class="container carouselitem">
    
            
		<div class="carousel slide" id="main-carousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol>
			
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block img-fluid ss" src="../img/a101.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid ss" src="../img/a102.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
					
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid ss" src="../img/a103.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
			</div>			
		</div>

</div>
</div>
</div>


<!-- Font Awesome Version 5.15.2 -->
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<hr>
		<a href="../category"><i class="fas fa-bars"></i> All</a><hr class="hrcate">
	<a href="../category-action/index.php?Food_category"><i class="fas fa-utensils"></i> Food</a><hr class="hrcate">
	<a href="../category-action/index.php?Clothing_category"><i class="fas fa-tshirt"></i> Clothing</a><hr class="hrcate">
	<a href="../category-action/index.php?Beverages_category"><i class="fas fa-cocktail"></i> Beverages</a><hr class="hrcate">
	<a href="../category-action/index.php?Cosmetics_category"><i class="fas fa-spa"></i> Cosmetics</a><hr class="hrcate">
	<a href="../category-action/index.php?Others_category"><i class="fas fa-ellipsis-h"></i> Others</a><hr class="hrcate">


	<div class="sblogo"><img src="../img/logo_sb.png" alt="logo"></div>
</div>



<hr>


<div class="items">
<div class="row">

<?php 
          
                
                  $sql = " select * from product";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                     		for ($i = 0; $i < $count; $i++) {
																				//count($id_array) --> if I input 4 fields, count($id_array) = 4)
		  
								$array[i] = $row['prod_id'];												
						}
                     
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 mb-4">	
		<div class="card h-100">
			<a href="#"><img class="card-img-top" height="300" src="<?php echo $image_src?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <h5>₱<?php echo $row['price']?></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
					
				<form method="post" action="../category-action/index.php">
				    <input type="hidden" value="<?php echo $row['prod_id']?>" name="prod_id" >
				<button type="submit" class="btn btn-outline-dark "  name="addtocart"><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</button>
				</form>
			
              </div>
		</div>
		</div>
          <?php
                 }
          

          

            

   
?>

		
			
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<!-- FOOTER --> 
<footer>
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-services" target="_blank" class="termsofservice">Terms of Service</a><h4>
			<hr>
			<h4>Han Tech Inventory System © 2021</h4>
			<h6>Warren Josiah de Guzman I Nadeer Mukaram I Ryan Peñosa Camonias I Reenjay Caimor I Kerzen Dalman Lañojan</h6>		
		</div>
	
	</div>	
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="../js/nav.js"></script>


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "210px";
  document.getElementById("main").style.marginLeft = "200px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
 function clickdirect() {
    window.location.href="../cart";
}
function logout() {
    window.location.href="../signin/logout.php";
}
</script>

</body>

</html>
	  <?php
	}else { ///////////////////////////////////////////////////////////////////////////////////////////////////Default
	    ?>
	<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> <!-- /.carousel-indicators -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="../css/homepage.css" />
<link rel="stylesheet" type="text/css" href="../css/categories.css" />
 <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

</head>
<title>Categories</title>
<?php 
    include '../administrator/connection/connect.php';
?>
</head>

<body>


<header>

<nav>

    <div class="logo ">
        <a href="../home"><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
       <li><a href="../signin">ORDERS</a></li>
        <li><a href="../signin">SIGN✎IN</a></li>
		<div class="dropdown">
			<button  onclick="clickdirect()" class="btn btn-dark" style="width: 84px"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-light" style="background-color: white;color: black">0</span></button>
		</div>		
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
</nav>
	

</header>


		

<div class="main">
    	<a href="../signin" class="btn btn-dark pota" style="width: 84px;float:right"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-light" style="background-color: white;color: black">0</span></a>
<form method="post" action="../category-action/index.php">			
  <div class="input-group">
    <input type="text" class="form-control texttt" name="txtsearch" placeholder="Search" >
    <div class="input-group-append">
      <button class="btn dfcolor " type="submit" name="btnsub">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
  </form>
</div>

<div class="caroubg">
<div id="main">
<button class="openbtn" onclick="openNav()">☰</button>  

<style>
.pota {
    display:none;
}
    @media screen and (max-width:450px) and (min-width:400px) {
     
        .pota {
            display:inline-block;
            position:absolute;
            top:65px;
            left:335px;
        }
        .hideonmobi {
            display:none;
        }
        .carouselitem {
            width:100%;
            margin-left:-26px;
        
            
            
        }
        .carousel-indicators {
            margin-left:115px;
        }
        .dfcolor {
            background-color:black;
            color:white;
        }
        .img-fluid {
            height:300px;
        }
        .mobi {
            width:700px;
        }
       .card {
            width:400px;
            margin-left:-88px;
        }
   
    }
     @media screen and (max-width:400px) and (min-width:360px) { 
       
           .pota {
            display:inline-block;
            position:absolute;
            top:55px;
            left:240px;
        }
        .hideonmobi {
            display:none;
        }
        .carouselitem {
       width:300px;
           
        
            
            
        }
        .carousel-indicators {
            margin-left:36px;
        }
        .dfcolor {
            background-color:black;
            color:white;
        }
        .img-fluid {
            height:400px;
        }
        .mobi {
            width:700px;
        }
       .card {
            width:320px;
            margin-left:-84px;
        }
        .openbtn {
            margin-right:150px;
        }
        .carousel-inner {
            width:320px;
            margin-left:-25px;
          
        }
       
       
       
     }
</style>
<!-- Carousel -->
<div class="container carouselitem">
            
		<div class="carousel slide" id="main-carousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#main-carousel" data-slide-to="1"></li>
				<li data-target="#main-carousel" data-slide-to="2"></li>
			</ol>
			
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block img-fluid ss" src="../img/a101.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid ss" src="../img/a102.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
					
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid ss" src="../img/a103.jpg" alt="">
					<div class="carousel-caption d-none d-md-block">
						
					</div>
				</div>
			</div>			
		</div>

</div>
</div>
</div>



<!-- Font Awesome Version 5.15.2 -->
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

	<hr>
		<a href="../category"><i class="fas fa-bars"></i> All</a><hr class="hrcate">
	<a href="../category-action/index.php?Food_category"><i class="fas fa-utensils"></i> Food</a><hr class="hrcate">
	<a href="../category-action/index.php?Clothing_category"><i class="fas fa-tshirt"></i> Clothing</a><hr class="hrcate">
	<a href="../category-action/index.php?Beverages_category"><i class="fas fa-cocktail"></i> Beverages</a><hr class="hrcate">
	<a href="../category-action/index.php?Cosmetics_category"><i class="fas fa-spa"></i> Cosmetics</a><hr class="hrcate">
	<a href="../category-action/index.php?Others_category"><i class="fas fa-ellipsis-h"></i> Others</a><hr class="hrcate">


	<div class="sblogo"><img src="../img/logo_sb.png" alt="logo"></div>
</div>



<hr>


<div class="items">
<div class="row">

<?php 
          
                
                  $sql = " select * from product";
                $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
            
             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                        $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                    ?>
                    <!--item-->	<div class="col-lg-3 col-md-6 mb-4 ">	
		<div class="card h-100 ">
			<a href="#"><img class="card-img-top" height="300" src="<?php echo $image_src?>" id="imahe" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#" class="itemshover" style="text-transform: uppercase;"><?php echo $row['name']?></a>
                </h4>
                <h5>₱<?php echo $row['price']?></h5>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                <i style="color:gold" class="fas fa-star"></i>
                
                <p class="card-text"><?php echo $row['description']?></p>
              </div>
              <div class="card-footer">
						
				<a href="../signin" class="btn btn-outline-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i></i> Add to cart</a>
              </div>
		</div>
		</div>
                    <?php
                 }
          

          

            

   
?>

		
			
</div>
</div>




<!-- FOOTER --> 
<footer>
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-service" target="_blank" class="termsofservice">Terms of Service</a><h4>
			<hr>
			<h4>Han Tech Inventory System © 2021</h4>
			<h6>Warren Josiah de Guzman I Nadeer Mukaram I Ryan Peñosa Camonias I Reenjay Caimor I Kerzen Dalman Lañojan</h6>		
		</div>
	
	</div>	
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="../js/nav.js"></script>


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "210px";
  document.getElementById("main").style.marginLeft = "200px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
 function clickdirect() {
    window.location.href="../signin";
}
</script>

</body>

</html> 
	<?php
	} 
?>
