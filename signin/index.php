<?php
    require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: ../home');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="../img/tabicon.png" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/login-stylea.css" rel="stylesheet">
<link href="../css/login-styleb.css" rel="stylesheet">
<link href="../css/homepage.css" rel="stylesheet">
<title>Sign In/Sign Up</title>
 <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
 <?php 
    include '../administrator/connection/connect.php';
 ?>
</head>
<body>




<!-- SIGN IN/SIGN UP --> 
<div class="container" style="margin-top:-100px;">
		<div class="col-md-12 text-center hantechlogo">
			<a href="../home"><img src="../img/logoregister.png" alt="logo" id="idel"></a>
		</div>
		<style>
		 @media screen and (max-width:450px) and (min-width:400px) {
		     #idel{
		            margin-left:-25px;
		        }
		 }
		   @media screen and (max-width:400px) and (min-width:300px) {
		       #idel{
		            margin-left:-47px;
		        }
		    }
		    
		</style>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">SIGN IN</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">SIGN UP</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
					    <h5 style="color:red;display:none" id="shothis">Sorry we could not complete your request at this moment..<br> Try logging in with your account or with your Google Account..</h5>
					    <?php
					      if(isset($_GET['failed-Authentication'])) {
					          ?>
					            <h5 style="color:red" id="hidethis">Sorry you have entered an incorrect email or password <br> Login Failed : Invalid Credentials.</h5>
					            <script>
					                setInterval(function(){  document.getElementById('hidethis').setAttribute('style','display:none'); }, 7000);
					            </script>
					          <?php
					      }else if (isset($_GET['login'])) {
					           ?>
					            <h5 style="color:green" id="hidethis">You are successfully Registered to our website <br>Thank You !!! <br> Login and make some Orders .</h5>
					            <script>
					                setInterval(function(){  document.getElementById('hidethis').setAttribute('style','display:none'); }, 7000);
					            </script>
					          <?php
					      }
					    ?>
					    <script>
					        function showthiserror() {
					          document.getElementById('shothis').setAttribute('style','display:inline-block;color:red');
					          setInterval(function(){  document.getElementById('shothis').setAttribute('style','display:none'); }, 10000);
					        }
					    </script>
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" autofocus>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember" checked>
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In"><br>
											 <br>
											     	<button type="button" onclick="showthiserror()"  class="form-control google btn btn-primary" disabled> <i class="fa fa-facebook fa-fw"></i> Login with Facebook</button>
											     	
											     <button type="button"  style="margin-top:10px"  onclick="window.location = '<?php echo $loginURL ?>';"  class="form-control google btn btn-danger" button><i class="fa fa-google fa-fw">
          </i>Login with Google</button>
        
                                                                
									
										   
											
											
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://ph.yahoo.com/?p=us&guccounter=1" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								
								<!--REGISTER-->
								<form id="register-form" action="login.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="givenname"  tabindex="1" class="form-control" placeholder="Given Name" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="lastname" tabindex="2" class="form-control" placeholder="Last Name" value=""required>
									</div>
									<div class="form-group">
										<input type="text" name="address"  tabindex="3" class="form-control" placeholder="Address" value=""required>
									</div>
									<div class="form-group">
										<input type="text" name="contact"  tabindex="4" class="form-control" placeholder="Contact#" value=""required>
									</div>
									<div class="form-group">
										<input type="email" name="email"  id="emails" tabindex="5" onClick="this.select();"  class="form-control" placeholder="Email Address" value=""required autofocus>
										
										
									</div>
									<div class="form-group">
										<input type="password"  name="password" onclick="checkemail()" id="passworde" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  tabindex="6" class="form-control" placeholder="Password" required>
										
										<p id="passs">PASSWORD MUST CONTAIN  :</p>
								    <p id="letter" class="invalid s ">Lowercase</p>
                                  <p id="capital" class="invalid s ">Uppercase</p>
                                  <p id="number" class="invalid s ">Number</b></p>
                                  <p id="length" class="invalid s ">Minimum of 8 characters</b></p>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="7" class="form-control" placeholder="Confirm Password" required>
									<p id="error" class="hide s">Password Does not Match</p>
									<p id="match" class="hide" >✔  Password Match</p>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="btnregister"id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							<style>
							
							.s {
							    font-size : 13px;
							    margin-left:50px;
							}
                							#message {
                                      display:none;
                                      background: #f1f1f1;
                                      color: #000;
                                      position: relative;
                                      padding: 20px;
                                      margin-top: 10px;
                                    }
                                    
                                    #message p {
                                      padding: 10px 35px;
                                      font-size: 18px;
                                    }
                                    
                                    /* Add a green text color and a checkmark when the requirements are right */
                                    .valid {
                                      color: green;
                                    }
                                    
                                    .valid:before {
                                      position: relative;
                                      left: -35px;
                                      content: "✔";
                                    }
                                    
                                    /* Add a red text color and an "x" when the requirements are wrong */
                                    .invalid {
                                      color: red;
                                    }
                                    
                                    .invalid:before {
                                      position: relative;
                                      left: -35px;
                                      content: "✖";
                                    }
                                    .hide {
                                        display:none;
                                    }
                							</style>
                       
							<script>
							
                                    	var myInput = document.getElementById("passworde");
                                        var letter = document.getElementById("letter");
                                        var capital = document.getElementById("capital");
                                        var number = document.getElementById("number");
                                        var length = document.getElementById("length");
                                        var passhide = document.getElementById("passs");
                                       
                                        
                                        // When the user clicks on the password field, show the message box
                                        myInput.onfocus = function() {
                                          document.getElementById("message").style.display = "block";
                                        }
                                        
                                        // When the user clicks outside of the password field, hide the message box
                                        myInput.onblur = function() {
                                          document.getElementById("message").style.display = "none";
                                        }
                                        
                                        // When the user starts to type something inside the password field
                                        myInput.onkeyup = function() {
                                          // Validate lowercase letters
                                          var lowerCaseLetters = /[a-z]/g;
                                          if(myInput.value.match(lowerCaseLetters)) {  
                                            letter.classList.remove("invalid");
                                            letter.classList.add("hide");
                                            
                                          
                                          } else {
                                              
                                            letter.classList.remove("hide");
                                            letter.classList.add("invalid");
                                           
                                          }
                                          
                                          // Validate capital letters
                                          var upperCaseLetters = /[A-Z]/g;
                                          if(myInput.value.match(upperCaseLetters)) {  
                                            capital.classList.remove("invalid");
                                            capital.classList.add("hide");
                                          } else {
                                            capital.classList.remove("hide");
                                            capital.classList.add("invalid");
                                          }
                                        
                                          // Validate numbers
                                          var numbers = /[0-9]/g;
                                          if(myInput.value.match(numbers)) {  
                                            number.classList.remove("invalid");
                                            number.classList.add("hide");
                                          } else {
                                            number.classList.remove("hide");
                                            number.classList.add("invalid");
                                          }
                                          
                                          // Validate length
                                          if(myInput.value.length >= 8) {
                                            length.classList.remove("invalid");
                                            length.classList.add("hide");
                                            
                                               
                                            
                                          } else {
                                            length.classList.remove("hide");
                                            length.classList.add("invalid");
                                           passhide.classList.remove("hide");
                                           
                                          }
                                        }
                                        var reinput = document.getElementById("confirm-password");
                                        var error =  document.getElementById("error");
                                         var match =  document.getElementById("match");
                                        reinput.onkeyup = function() { 
                                             var password = document.getElementById("passworde");  
                                             
                                             if(reinput.value == password.value) {
                                                 match.classList.remove('hide');
                                                 match.classList.add('valid');
                                                 error.classList.add('hide');
                                                 setInterval(function(){  match.classList.add('hide'); }, 3000);
                                             }else {
                                                  match.classList.add('hide');
                                                  error.classList.remove('hide');
                                                  error.classList.add('invalid');
                                             }
                                             
                                             
                                         }
                                  
        						                
                                                                
							</script>	
                                               
							           
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>


<!-- FOOTER --> 
<div class="footerforlogin">
	<div class="row">
 
		<div class="col-md-12">
			<h4><a href="../terms-of-service" target="_blank" class="termsofserviceforlogin">Terms of Service</a><h4>
			<hr>
			<h4>Han Tech Inventory System © 2021</h4>
			<h6>Warren Josiah de Guzman I Nadeer Mukaram I Ryan Peñosa Camonias I Reenjay Caimor I Kerzen Dalman Lañojan</h6>		
		</div>
	
	</div>	
</div>


<!-- SCRIPTS USED --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>

<script src="../js/login.js"></script>

</body>
</html>
