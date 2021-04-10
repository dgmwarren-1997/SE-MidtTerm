<?php
	session_start();
include '../administrator/connection/connect.php';

 if (isset($_SESSION['access_token'])) { ///////////////////////////////////////////////////////////////////////////// USER GMAIL ACCOUNT
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

<title>Home</title>
</head>

<body style="background-image: url(https://images.pexels.com/photos/3687999/pexels-photo-3687999.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
		 background-repeat: no-repeat;
		background-attachment: fixed;
		background-size:100% 100%;
">


<header>

<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
        <li><a href="../orders/orders.php">ORDERS</a></li>
        <li><a href="#" onclick="logout()">SIGNOUT</a>
        <!-- Button trigger modal -->



        </li>
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



<style>
    
        @media screen and (max-width:450px) and (min-width:300px) {
       
        .dfcolor {
            background-color:black;
            color:white;
          
        }
      
       
      
    }
</style>


<section>		
		<div class="han">
		
		<!-- SEARCH BAR MOBILE --> 	
			<form method="post" action="../category-action/index.php">
		<div class="searchbarmobile">
		<div class="input-group">
		<input type="text" class="form-control textss" placeholder="Search Item's/Products" name="txtsearch"  autofocus>
		<div class="input-group-append">
			<button class="btn dfcolor" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		</div>
		</form>
		
		<!-- SEARCH BAR --> 
		<form method="post" action="../category-action/index.php">
		<div class="search-wrapper">	
			<div class="input-holder">
				<input type="text" class="search-input" placeholder="Search" name="txtsearch" />
				<button type="button" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
			</div>
				<span class="close" onclick="searchToggle(this, event);"></span>
		</div>	
		</form>
		
		<!-- HANTECH COVER PHOTO --> 	
		<img src="../img/aaa.jpg" alt="">
		
		<div class="row">
		<div class="col-md-12">
		<h1 class="headline">HAN TECH</h1>
		</div>
		<div class="col-md-12">
		<h5 class="headline2">Inventory System</h5>
		<h6 class="headline3">HeLLo <span id="givenname" style=""><?php echo $_SESSION['givenName']?>!ツ </span><h6>
		</div>
		</div>
		
		</div>	
</section>
<style>
 
</style>

</header>

<style>
#givenname {
   color:Black;font-weight:bolder;font-size:35px; 
}
    .headline3 {
	position: absolute;
	top: 110%;
	left:9%;
	font-size:27px;
	transform: translate(-20%, -70%);
	color: white;

	}
	 @media screen and (max-width:450px) and (min-width:400px) { 
	     .headline3 {
	position: absolute;
	top:30%;
	left:20%;
	width:200px;
	font-size:20px;
	transform: translate(-20%, -70%);
	color: white;
	

	}
	#givenname {
   font-size:20px; 
}
	 }
	  @media screen and (max-width:400px) and (min-width:360px) { 
	     .headline3 {
	position: absolute;
	top:35%;
	left:20%;
	width:200px;
	font-size:20px;
	transform: translate(-20%, -70%);
	color: white;
	

	}
	#givenname {
   font-size:20px; 
}
.textss {
    margin-left:-55px;
}
	 }
	 
</style>




<!-- MISSION, VISION, ABOUT US SECTION --> 
<div class="aboutus">
<hr id="hr">
<div class="container mt-5 mb-4">
    <div class="row popup-gallery">
        
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="../css/imgp/mission.jpg">
                <img src="../css/imgp/mission_preview.jpg" class="img-fluid">
            </a>
        </div>
		
		<div class="col-lg-4 col-md-6 mb-4" >
            <a href="../css/imgp/aboutus.jpg">
                <img src="../css/imgp/aboutus_preview.jpg" class="img-fluid">
            </a>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="../css/imgp/vision.jpg">
                <img src="../css/imgp/vision_preview.jpg" class="img-fluid">
            </a>
        </div>
        
    </div>
</div>
<hr id="hr">
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

<!-- SLIDER ANIMATION FOR NAV--> 
<div class="slider"></div>




<!-- SCRIPTS USED --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineMax.min.js" integrity="sha512-lJDBw/vKlGO8aIZB8/6CY4lV+EMAL3qzViHid6wXjH/uDrqUl+uvfCROHXAEL0T/bgdAQHSuE68vRlcFHUdrUw==" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
<script src="../js/animation.js"></script>
<script src="../js/searchbar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>



<!-- POP UP GALLERY FUNCTION JS --> 
<script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
});
function logout() {
    window.location.href="../signin/logout.php";
}
function clickdirect() {
    window.location.href="../cart";
}
</script>


</body>

</html> 
	    <?php
	}
	else if (isset($_SESSION['user_id'])) { //////////////////////////////////////////////////////////////////////////USER PERSONAL ACCOUNT
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

<title>Home</title>
</head>

<body style="background-image: url(https://images.pexels.com/photos/3687999/pexels-photo-3687999.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
		 background-repeat: no-repeat;
		background-attachment: fixed;
		background-size:100% 100%;
">


<header>

<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
        <a href="../home"><img src="../img/logo.png" alt="logo"></a>
	</div>


    <ul class="nav-links">
        <li><a href="../home">⟰HOME</a></li>
        <li><a href="../category">☰CATEGORIES</a></li>
       <li><a href="../orders/orders.php">ORDERS</a></li>
        <li><a href="#" onclick="logout()">SIGNOUT</a>
        <!-- Button trigger modal -->



        </li>
		<div class="dropdown">
			
	<?php 
		$userid= $_SESSION['user_id'];
		
			    
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
                                <a>
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



<style>
    
        @media screen and (max-width:450px) and (min-width:300px) {
       
        .dfcolor {
            background-color:black;
            color:white;
            
        }
       
      
    }
</style>


<section>		
		<div class="han">
		
		<!-- SEARCH BAR MOBILE --> 	
			<form method="post" action="../category-action/index.php">
		<div class="searchbarmobile">
		<div class="input-group">
		<input type="text" class="form-control textss" placeholder="Search Item's/Products" name="txtsearch"  autofocus>
		<div class="input-group-append">
			<button class="btn dfcolor" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		</div>
		</form>
		
		<!-- SEARCH BAR --> 
		<form method="post" action="../category-action/index.php">
		<div class="search-wrapper">	
			<div class="input-holder">
				<input type="text" class="search-input" placeholder="Search" name="txtsearch" />
				<button type="button" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
			</div>
				<span class="close" onclick="searchToggle(this, event);"></span>
		</div>	
		</form>
		
		<!-- HANTECH COVER PHOTO --> 	
		<img src="../img/aaa.jpg" alt="">
		
		<div class="row">
		<div class="col-md-12">
		<h1 class="headline">HAN TECH</h1>
		</div>
		<div class="col-md-12">
		<h5 class="headline2">Inventory System</h5>
		<h6 class="headline3">HeLLo <span id="givenname"><?php echo $_SESSION['name']?>! ツ</span><h6>
		</div>
		</div>
		
		</div>	
</section>


</header>

<style>
#givenname {
 color:Black;font-weight:bolder;font-size:35px   
}
    .headline3 {
	position: absolute;
	top: 115%;
	left:9%;
	font-size:27px;
	transform: translate(-20%, -70%);
	color: white;

	}
		 @media screen and (max-width:450px) and (min-width:300px) { 
	     .headline3 {
	position: absolute;
	top:30%;
	left:20%;
	width:200px;
	font-size:27px;
	transform: translate(-20%, -70%);
	color: white;
	

	}
	 }
	   @media screen and (max-width:400px) and (min-width:360px) { 
	     .headline3 {
	position: absolute;
	top:35%;
	left:20%;
	width:200px;
	font-size:20px;
	transform: translate(-20%, -70%);
	color: white;
	

	}
	#givenname {
   font-size:20px; 
}
.textss {
    margin-left:-55px;
}
	 }
</style>




<!-- MISSION, VISION, ABOUT US SECTION --> 
<div class="aboutus">
<hr id="hr">
<div class="container mt-5 mb-4">
    <div class="row popup-gallery">
        
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="../css/imgp/mission.jpg">
                <img src="../css/imgp/mission_preview.jpg" class="img-fluid">
            </a>
        </div>
		
		<div class="col-lg-4 col-md-6 mb-4" >
            <a href="../css/imgp/aboutus.jpg">
                <img src="../css/imgp/aboutus_preview.jpg" class="img-fluid">
            </a>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="../css/imgp/vision.jpg">
                <img src="../css/imgp/vision_preview.jpg" class="img-fluid">
            </a>
        </div>
        
    </div>
</div>
<hr id="hr">
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

<!-- SLIDER ANIMATION FOR NAV--> 
<div class="slider"></div>




<!-- SCRIPTS USED --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineMax.min.js" integrity="sha512-lJDBw/vKlGO8aIZB8/6CY4lV+EMAL3qzViHid6wXjH/uDrqUl+uvfCROHXAEL0T/bgdAQHSuE68vRlcFHUdrUw==" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
<script src="../js/animation.js"></script>
<script src="../js/searchbar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>



<!-- POP UP GALLERY FUNCTION JS --> 
<script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
});
function logout() {
    window.location.href="../signin/logout.php";
}
function clickdirect() {
    window.location.href="../cart";
}
</script>


</body>

</html> 
	    <?php
	}else { //////////////////////////////////////////////////////////////////////////////////////////////DEFAULT NO USER
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

<title>Home</title>
</head>

<body style="background-image: url(https://images.pexels.com/photos/3687999/pexels-photo-3687999.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
		 background-repeat: no-repeat;
		background-attachment: fixed;
		background-size:100% 100%;
">



<header>

<!-- NAVIGATION BAR --> 
<nav>
    <div class="logo">
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



<style>
    
        @media screen and (max-width:450px) and (min-width:300px) {
       
        .dfcolor {
            background-color:black;
            color:white;
            
        }
       
      
    }
      @media screen and (max-width:400px) and (min-width:360px) { 
	
.textss {
    margin-left:-55px;
}
	 }
</style>


<section>		
		<div class="han">
		
		<!-- SEARCH BAR MOBILE --> 	
			<form method="post" action="../category-action/index.php">
		<div class="searchbarmobile">
		<div class="input-group">
		<input type="text" class="form-control textss" placeholder="Search Item's/Products" name="txtsearch"  autofocus>
		<div class="input-group-append">
			<button class="btn dfcolor" type="submit">
			<i class="fa fa-search"></i>
			</button>
			</div>
		</div>
		</div>
		</form>
		
		<!-- SEARCH BAR --> 
		<form method="post" action="../category-action/index.php">
		<div class="search-wrapper">	
			<div class="input-holder">
				<input type="text" class="search-input" placeholder="Search" name="txtsearch" />
				<button type="button" class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
			</div>
				<span class="close" onclick="searchToggle(this, event);"></span>
		</div>	
		</form>
		
		<!-- HANTECH COVER PHOTO --> 	
		<img src="../img/aaa.jpg" alt="">
		
		<div class="row">
		<div class="col-md-12">
		<h1 class="headline">HAN TECH</h1>
		</div>
		<div class="col-md-12">
		<h5 class="headline2">Inventory System</h5>
		</div>
		</div>
		
		</div>	
</section>


</header>





<!-- MISSION, VISION, ABOUT US SECTION --> 
<div class="aboutus">
<hr id="hr">
<div class="container mt-5 mb-4">
    <div class="row popup-gallery">
        
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="../css/imgp/mission.jpg">
                <img src="../css/imgp/mission_preview.jpg" class="img-fluid">
            </a>
        </div>
		
		<div class="col-lg-4 col-md-6 mb-4" >
            <a href="../css/imgp/aboutus.jpg">
                <img src="../css/imgp/aboutus_preview.jpg" class="img-fluid">
            </a>
        </div>
        
        <div class="col-lg-4 col-md-6 mb-4">
            <a href="../css/imgp/vision.jpg">
                <img src="../css/imgp/vision_preview.jpg" class="img-fluid">
            </a>
        </div>
        
    </div>
</div>
<hr id="hr">
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

<!-- SLIDER ANIMATION FOR NAV--> 
<div class="slider"></div>




<!-- SCRIPTS USED --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js" integrity="sha512-8Wy4KH0O+AuzjMm1w5QfZ5j5/y8Q/kcUktK9mPUVaUoBvh3QPUZB822W/vy7ULqri3yR8daH3F58+Y8Z08qzeg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineMax.min.js" integrity="sha512-lJDBw/vKlGO8aIZB8/6CY4lV+EMAL3qzViHid6wXjH/uDrqUl+uvfCROHXAEL0T/bgdAQHSuE68vRlcFHUdrUw==" crossorigin="anonymous"></script>
<script src="../js/nav.js"></script>
<script src="../js/animation.js"></script>
<script src="../js/searchbar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>



<!-- POP UP GALLERY FUNCTION JS --> 
<script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });
});
function clickdirect() {
    window.location.href="../signin";
}
</script>


</body>

</html> 
	    <?php
	}
?>
