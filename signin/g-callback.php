<?php
	require_once "config.php";
    
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: https://hantechdesign.com/');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];

    $usermail = $userData['email'];
    $name = $userData['givenName'];
    $surname = $userData['familyName']; 
    include '../administrator/connection/connect.php';
    
                                 $sql = " select * from user_account where email = '$usermail' and logintype = 'gmail'  ";
					                $result = mysqli_query($con,$sql); // run query
					                $count= mysqli_num_rows($result); // to count if necessary
					             if ($count==1){
					             	header('Location:https://hantechdesign.com/');
	                                    exit();	
					             	
					          }else {
					              
					              
									$sql = " INSERT INTO `user_account`(`uname`, `surname`, `logintype`, `email`) VALUES ('$name','$surname','gmail','$usermail')  ";
							                $result = mysqli_query($con,$sql); // run query
							                
							               if ($result) {
							                  
							                
                                           
                                               
							                    ?>
	  <script>window.location.href="https://hantechpro.000webhostapp.com/Mail/index.php?email=<?php echo $usermail?>&name=<?php echo $name?>"</script>
							                    <?php
							                
							               }
							          
					          }
    
    

?>