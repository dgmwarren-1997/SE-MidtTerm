<?php 
session_start();   

include '../administrator/connection/connect.php';
  if (isset($_POST['login-submit'])) {
					            $user = $_POST['username'];
					            $pass = $_POST['password'];
					            
      
                  
            
		$sql = " select * from user_account where email = '$user' and password = '$pass'  ";
               $result = mysqli_query($con,$sql); // run query
                $count= mysqli_num_rows($result); // to count if necessary
             
             if ($count==1){
            while($row = mysqli_fetch_array($result)){
               
                $_SESSION['user_id']= $row["user_id"];
                $_SESSION['name'] = $row["uname"];
                $_SESSION['email'] = $row["email"];
                
            
                
             
                }
            
               ?>
                <script>
                 window.location.href = "https://hantechdesign.com";
                </script>
               <?php
          }else {
              header('location:https://hantechdesign.com/signin  ');
          }
					        
                       
                   
  }else if (isset($_POST['btnregister'])) {
      $uname = $_POST['givenname'];
      $lastname = $_POST['lastname'];
      $address = $_POST['address'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $password = $_POST['password'];
       $repassword = $_POST['confirm-password'];
       
       if ($password != $repassword) {
             ?>
        <script>
            alert('Password Does not MATCH.');
            history.back();</script>
      <?php
       }else {
                    $checkifemail = " select * from user_account where email = '$email' and logintype = 'personal'  ";
 						                $resulta = mysqli_query($con,$checkifemail); // run query
 						                $count= mysqli_num_rows($resulta); // to count if necessary
 						             if ($count==1){
 						             	//while($row = mysqli_fetch_array($result)){} is where we output all the data in database
 						                 while($row = mysqli_fetch_array($result)){
 						
 						                 }
 						                   
      ?>
        <script>
            alert('Email is already Taken.');
            history.back();</script>
      <?php 
 						                 
 						          }else {
           
          	$sql = " INSERT INTO `user_account`(`uname`, `surname`, `address`, `contact_no`, `logintype`, `email`, `password`) VALUES ('$uname','$lastname','$address','$contact','personal','$email','$password')  ";
 					                $result = mysqli_query($con,$sql); // run query
 					               
 			if ($result) {
 			    
 			    ?>
 			        <script>
 			            window.location.href="index.php?login&authentication-Success";
 			        </script>
 			    <?php
 			}
          
 						          
 						              
 						              
 						              
 						          
       
       }
       
       
                        
      
  
   
  }
  }

?>