<?php
	session_start();
  
	if (isset($_SESSION['access_token'])) {//////////////////////////////////////////////////////////////////////////////////////GOogle Login
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
<title>Shopping Cart</title>
<?php 
    include '../administrator/connection/connect.php';
?>
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
         <li><a href="../orders/orders.php"><i class="fas fa-shopping-cart"></i>MY ORDERS</a></li>
        
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>	
</nav>



<article>

    <main>
<div class="row">
  <br><br>
  <?php
   if(isset($_POST['btnremove'])) {
        $cartno = $_POST['cartno'];
            $sql = "DELETE FROM `cart` WHERE cart_id = '$cartno' ";
             $result = mysqli_query($con,$sql); // run query
             if($result) {
                ?>
      <span style="color:rgb(128,0,0);margin-left:20px;margin-top:20px;font-family:cooper;font-weight:bolder" id="hidenote">Item has been removed.</span>
      <script>
        
          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
      </script>
       <?php 
             }
                
       
   }
   if(isset($_POST['qtychange'])) {
       $qty = $_POST['qtychange'];
       $cartno = $_POST['cartno'];
                          $sql = " select * from cart where cart_id = '$cartno'  ";
 						                $result = mysqli_query($con,$sql); // run query
 						                $count= mysqli_num_rows($result); // to count if necessary
 						         
 						                 while($row = mysqli_fetch_array($result)){
 						                            $prod_id = $row['prod_id'];
 						                 }
 						 
 						
 						 $getprice = "select * from product where prod_id = '$prod_id'";
             						  $getpriceres = mysqli_query($con,$getprice); // run query
             						   while($row = mysqli_fetch_array($getpriceres)){
             						                            $price= $row['price'];
 						                 }
 						                 
 						        $overallamountdue = $qty * $price;  
 						        
 						        ////update
 						        
 						        $updatecart = "update cart set `qty`='$qty', `total` = '$overallamountdue' where cart_id = '$cartno' ";
 						                    $resultupdate= mysqli_query($con,$updatecart);
 						                    if ($resultupdate) {
 						                     ?>
                                      <span style="color:green;margin-left:10px;margin-top:20px;font-family:cooper;font-weight:bolder" id="hidenote">Quantity Changed  <i class='fas fa-check-circle'></i> </span>
                                      <script>
                                        
                                          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
                                      </script>
                                       <?php    
 						                    }
 						       
         
   }
  ?>
  <br>
</div>  
<div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta btn btn-dark">Apply</button>
      </div>
    
<div class="basket" style="overflow-y: scroll; height: 500px;">

    
    <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">₱</li>
          <li class="quantity">Ǭ</li>
          <li class="subtotal">Subtotal</li>
        </ul>
    </div>
	   <?php 
	   	$email =$_SESSION['email'] ;
			     $sql = " select * from user_account where email = '$email'  ";
                             $resultforuser = mysqli_query($con,$sql); // run query
                            
                        
                              while($row = mysqli_fetch_array($resultforuser)){
                                    $userid = $row['user_id'];
                                    
                              }
                              
                             
	   
	         $sqlall = " SELECT * FROM `cartview` WHERE user_id = '$userid' "; /////////////////////////////////////////TODO
                             $resulta = mysqli_query($con,$sqlall); // run query
                           
                           $count= mysqli_num_rows($resulta); // to count if necessary
                              if ($count>=1){
                                $amountdue= 0;
                              //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                              while($row = mysqli_fetch_array($resulta)){
                                    $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                          $amountdue += $row['total'];
                          $prodid = $row['prod_id'];
                          $cartid =$row['cart_id'];
                               ?>
                               	<!-- ITEM 1 -->    
                                    <div class="basket-product">
                                        <div class="item">
                                          <div class="product-image">
                                            <img src="<?php echo $image_src?>" alt="Placholder Image 2" class="product-frame" height="100">
                                          </div>
                                          <div class="product-details">
                                            <h1><b><span class="item-quantity"><?php echo $row['qty']?></span> x </b> <span style="text-transform:uppercase"><?php echo $row['name']?></span></h1>
                                            <p><b>Product Code</b><br><?php echo $row['prod_id']?></p>
                                          </div>
                                        </div>
                                        <div class="price"><?php echo $row['price']?></div>
                                        <div class="quantity">
                                           
                                            <form method="post">
                                                  <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                          <input type="number"  name="qtychange" value="<?php echo $row['qty']?>" min="1" class="quantity-field">
                                          <p style="font-size:12px">Press <button type="submit">Enter</button> to Update Quantity</p>
                                          </form>
                                          
                                        </div>
                                     
                                        <div class="subtotal"><?php echo $row['total']?></div>
                                       
                                        <div class="remove">
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                      
                                          <button type="submit" name="btnremove">Remove</button>
                                          </form>
                                         
                                        </div>
                                    </div>
	
<!---->
	  
                               <?php
                              }
                              } else {
                                    ?>
                                               <h4>Your Cart is Empty <i class="fas fa-cog fa-spin"></i> <br>  <a href="https://hantechdesign.com/category">CLICK HERE</a> to make some order.</h4>
                                    <?php
                              }
                       
    	?>

 
	  
</div>
<?php 

                            $cartcounta = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcounta); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                             
                           
                             
?>

<form method="post" action="../orders/index.php" >
    
<aside>
      <div class="summary">
        <div class="summary-total-items"><span id="itemscount"><?php echo $countcart?></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal"><?php echo  $amountdue?></div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select name="transtype" class="summary-delivery-selection">
              <option  selected="selected">Type Of Transaction:</option>
             <option value="walk in">WALK IN</option>
             <option value="reservation" >RESERVATION</option>
            
          </select>
         
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total"><?php echo  $amountdue?></div>
        </div>
        <div class="summary-checkout">
          <button type="submit" id="changeletter" class="checkout-cta btn btn-dark">PROCEED</button>
          
        </div>
      </div>
</aside>
</form>

</main>




</article>



<div class="slider"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/shoppingcart.js"></script>
<script src="../js/nav.js"></script>
</body>

</html> 
	  <?php
	}else if(isset($_SESSION['user_id'])) {/////////////////////////////////////////////////////////////////////////////////////////Personal login
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
<title>Shopping Cart</title>
<?php 
    include '../administrator/connection/connect.php';
?>
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



<article>

    <main>
<div class="row">
  <br><br>
  <?php
   if(isset($_POST['btnremove'])) {
        $cartno = $_POST['cartno'];
            $sql = "DELETE FROM `cart` WHERE cart_id = '$cartno' ";
             $result = mysqli_query($con,$sql); // run query
             if($result) {
                ?>
      <span style="color:rgb(128,0,0);margin-left:20px;margin-top:20px;font-family:cooper;font-weight:bolder" id="hidenote">Item has been removed.</span>
      <script>
        
          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
      </script>
       <?php 
             }
                
       
   }
     if(isset($_POST['qtychange'])) {
       $qty = $_POST['qtychange'];
       $cartno = $_POST['cartno'];
                          $sql = " select * from cart where cart_id = '$cartno'  ";
 						                $result = mysqli_query($con,$sql); // run query
 						                $count= mysqli_num_rows($result); // to count if necessary
 						         
 						                 while($row = mysqli_fetch_array($result)){
 						                            $prod_id = $row['prod_id'];
 						                 }
 						 
 						
 						 $getprice = "select * from product where prod_id = '$prod_id'";
             						  $getpriceres = mysqli_query($con,$getprice); // run query
             						   while($row = mysqli_fetch_array($getpriceres)){
             						                            $price= $row['price'];
 						                 }
 						                 
 						        $overallamountdue = $qty * $price;  
 						        
 						        ////update
 						        
 						        $updatecart = "update cart set `qty`='$qty', `total` = '$overallamountdue' where cart_id = '$cartno' ";
 						                    $resultupdate= mysqli_query($con,$updatecart);
 						                    if ($resultupdate) {
 						                     ?>
                                      <span style="color:green;margin-left:10px;margin-top:20px;font-family:cooper;font-weight:bolder" id="hidenote">Quantity Changed  <i class='fas fa-check-circle'></i> </span>
                                      <script>
                                        
                                          setInterval(function(){   document.getElementById('hidenote').setAttribute('style','display:none'); }, 3000);
                                      </script>
                                       <?php    
 						                    }
 						       
         
   }
  ?>
  <br>
</div>  
<div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta btn btn-dark">Apply</button>
      </div>
    
<div class="basket" style="overflow-y: scroll; height: 500px;">

    
    <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">₱</li>
          <li class="quantity">Ǭ</li>
          <li class="subtotal">Subtotal</li>
        </ul>
    </div>
	   <?php 
	   	$userid =$_SESSION['user_id'] ;
			   
                              
                             
	   
	         $sqlall = " SELECT * FROM `cartview` WHERE user_id = '$userid' "; /////////////////////////////////////////TODO
                             $resulta = mysqli_query($con,$sqlall); // run query
                           
                           $count= mysqli_num_rows($resulta); // to count if necessary
                              if ($count>=1){
                                $amountdue= 0;
                              //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                              while($row = mysqli_fetch_array($resulta)){
                                    $image = $row['photo'];
                          $image_src = "../administrator/bin/Item_Images/".$image;
                          $amountdue += $row['total'];
                               ?>
                               	<!-- ITEM 1 -->    
                                    <div class="basket-product">
                                        <div class="item">
                                          <div class="product-image">
                                            <img src="<?php echo $image_src?>" alt="Placholder Image 2" class="product-frame" height="100">
                                          </div>
                                          <div class="product-details">
                                            <h1><b><span class="item-quantity"><?php echo $row['qty']?></span> x </b> <span style="text-transform:uppercase"><?php echo $row['name']?></span></h1>
                                            <p><b>Product Code</b><br><?php echo $row['prod_id']?></p>
                                          </div>
                                        </div>
                                        <div class="price"><?php echo $row['price']?></div>
                                        <div class="quantity">
                                         <form method="post">
                                                  <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                          <input type="number"  name="qtychange" value="<?php echo $row['qty']?>" min="1" class="quantity-field">
                                           <p style="font-size:12px">Press <button type="submit">Enter</button> to Update Quantity</p>
                                          </form>
                                        </div>
                                     
                                        <div class="subtotal"><?php echo $row['total']?></div>
                                        <div class="remove">
                                            <form method="post">
                                                <input type="hidden" value="<?php echo $row['cart_id']?>" name="cartno">
                                          <button type="submit" name="btnremove">Remove</button>
                                          </form>
                                        </div>
                                    </div>
	
<!---->
	  
                               <?php
                              }
                              } else {
                                    ?>
                                            <h4>Your Cart is Empty <i class="fas fa-cog fa-spin"></i> <br>  <a href="https://hantechdesign.com/category">CLICK HERE</a> to make some order.</h4>
                                    <?php
                              }
                       
    	?>

 
	  
</div>
<?php 

                            $cartcounta = "select * from cart where user_id = '$userid'";
                            $resultcart = mysqli_query($con,$cartcounta); // run query
                          
                             $countcart= mysqli_num_rows($resultcart);
                             
?>
<form method="post" action="../orders/index.php" >
    
<aside>
      <div class="summary">
        <div class="summary-total-items"><span id="itemscount"><?php echo $countcart?></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal"><?php echo  $amountdue?></div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select name="transtype" class="summary-delivery-selection">
              <option  selected="selected">Type Of Transaction:</option>
             <option value="walk in">WALK IN</option>
             <option value="reservation" >RESERVATION</option>
            
          </select>
         
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total"><?php echo  $amountdue?></div>
        </div>
        <div class="summary-checkout">
          <button type="submit" id="changeletter" class="checkout-cta btn btn-dark">PROCEED</button>
          
        </div>
      </div>
</aside>
</form>

</main>




</article>



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
                window.location.href="https://hantechpro.000webhostapp.com/signin";
            </script>
        <?php
	}

?>
