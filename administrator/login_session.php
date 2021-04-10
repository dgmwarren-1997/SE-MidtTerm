<?php 
if(isset($_POST['logindata'])){
    $email= $_POST['user'];   
   $password= $_POST['pass']; 
               $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        if (!preg_match($emailValidation,$email)){
                   echo "retard";
                exit();
                   } else { 
            $email= $_POST['user'];   
            $password= $_POST['pass'];
            $securepass= md5($password);
  $connect = mysqli_connect("localhost","i7685129_wp1","Reenjay17","i7685129_wp1");
            session_start();

            $sql = " select * from admin_account where email = '$email' and  password = '$securepass' ";
            $query = mysqli_query($connect,$sql);
                $count= mysqli_num_rows($query);
            if ($count==1){
                while($row = mysqli_fetch_array($query)){
                $_SESSION["admin_id"] = $row["admin_id"];
                $_SESSION["name"] = $row["aname"];
                 $_SESSION["branchid"] = $row["branch_id"];
                  $_SESSION["emails"] = $row["email"];
              
           
                   echo "login_success" ;
                
                }
            } else {
                echo "Fail";
            }
      
      
  
       
    }
          
                       
                   
     
 }

             
             ?>