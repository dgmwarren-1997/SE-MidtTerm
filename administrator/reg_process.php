<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortout icon" type="image/x-icon" href="https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/125568526/original/cd9c93141521436a112722e8c5c0c7ba0d60a4a2/be-your-telegram-group-admin.jpg">
    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Admin-Registration</title>
    <style type="text/css">
      .panel-body {
  height: 580px;

  

}
    </style>

     <?php 
      include "connection/connect.php";
     ?>
  </head>
  <body style=" background-image: url('https://images.pexels.com/photos/34577/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');background-repeat: no-repeat;
  background-size: cover" >

      <div class="container">
        <div class="row">
          <br><br>
          
        </div>
          <div class="row">
                    
              <div class="col-sm-3 "></div>
              <div class="col-sm-6">
              <div class="panel panel-default" style="box-shadow: 0 5px 5px 4px rgba(10,0,0,.5);border-radius: 10px; background-color: #FDFEFE">
                   <div class="panel-body">
                            <div class="container"> 

                              
                              <?php 
                             if(isset($_GET['newbranch'])){ 
                              echo '
                                <br><br>
                                 <a href="register.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                                <br>
                                  
                                <br><br>
                                <div class="container">

                              <h3 style="cursor:default">Save New Branch</h3>
                              <br><br>
                                    <form method="post" action="reg_process.php">
                                            <h5 style="cursor:default">Enter Branch Name</h5>
                                             <input type="text" name="txtname" autofocus class="form-control" placeholder="Branch Name">
                                              <br>
                                                <h5 style="cursor:default">Enter Branch Location</h5>
                                            <input type="text" name="txtloc" class="form-control" placeholder="Location">

                                            <br><br>
                                            <input type="submit" name="btnsavebranch" value="PROCEED" style="height: 50px" class="form-control btn btn-info">

                                    </form>
                                </div>



                              ';
                              


                               }
                               /////////////////////////////////////////////////////////////////////New////////////////////////////////////////////////////////////
                                if(isset($_POST['btnsavebranch'])){ 
                                    $bname = $_POST['txtname'];
                                    $bloc = $_POST['txtloc'];
                                      
                                       $sql = " select * from branches where bname = '$bname'  ";
                                  $query = mysqli_query($con,$sql);
                                      $count= mysqli_num_rows($query);
                                  if ($count==1){
                                      while($row = mysqli_fetch_array($query)){ 
                                        echo ' 

                                         <br><br>
                                         <a href="register.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                                         <br>
                                   
                                <br><br>
                                <div class="container">
                                 
                              <h3 style="cursor:default">Save New Branch</h3>
                              <br><br>
                                    <form method="post" action="reg_process.php">
                                    <h5 style="color:Red">Sorry the Branch name Already Exist!</h5>
                                            <h5 style="cursor:default">Enter Branch Name</h5>
                                             <input type="text" name="txtname" autofocus class="form-control" placeholder="Branch Name">
                                              <br>
                                                <h5 style="cursor:default">Enter Branch Location</h5>
                                            <input type="text" name="txtloc" class="form-control" placeholder="Location">

                                            <br><br>
                                            <input type="submit" name="btnsavebranch" value="PROCEED" style="height: 50px" class="form-control btn btn-info">

                                    </form>
                                </div>
                                        ';

                                      }}
                                      else {


                                           $sql = " INSERT INTO `branches`( `bname`, `location`) VALUES ('$bname','$bloc') ";
                                          if  (mysqli_query($con,$sql)) {
                                            ///////////////////////////////////////
                                          ?> 
                                           <a href="register.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                                               <br>

                                <div id="tohide">
                               <h6   style="background-color: grey;color: white ; border-radius: 5px; height: 25px;">New Branch successfully SAVED<i style="color:white" class="fas fa-check-circle" style=""></i><a href="#" id="btnex"  style="float: right;color: white"><i class="fas fa-times-circle"></i></a>  </h6></div>
                               <script type="text/javascript">
                                 $( document ).ready(function() {
                                $('#btnex').click(function(e) {
                                    e.preventDefault();
                                    
                                      document.getElementById("tohide").setAttribute('style','visibility:hidden');    
                                  }) 
                              });
                               </script>
                             
                              
                                <h4 style="cursor:default">Admin Registration</h4>
                                <form method="post" action="reg_process.php">
                                  <input type="hidden" name="txtbname" value="<?php echo $bname ?>">
                                <br>
                                <h5>Name</h5>

                                <input type="text" name="txtname" autofocus class="form-control" placeholder="Enter Name" Required>
                                <br>
                                <h5>Surname</h5>
                                <input type="text" name="txtsurname" class="form-control" placeholder="Enter Surname" Required>
                                <br>
                                <h5>Address</h5>
                                <input type="text" name="txtaddress" class="form-control" placeholder="Enter Address" Required>
                                <br>
                                <h5>Contact</h5>
                                <input type="number" name="txtcontact" class="form-control" placeholder="Enter Contact" Required>
                                <br>
                                <input type="submit" name="btnnextnew" value="Next" class="form-control btn btn-info" style="height: 50px">

                             
                             
                                

                               

                                
                                 
                               
                                

                                 </form>




                                         
                                        <?php
                                          }
                                           }
                                   
 
                                }
                                if(isset($_POST['btnnextnew'])){
                              $name=$_POST['txtname'];
                              $surname=$_POST['txtsurname'];
                              $address=$_POST['txtaddress'];
                              $contact=$_POST['txtcontact'];
                              $bname = $_POST['txtbname'];
                             
                             
                                echo ' 
                                
                            <br>
                                 <h6 style="cursor:default">◌ ●‬ ◌‬ </h6>
                                  <h4 style="cursor:default">Admin Registration</h4>
                                <br>
                                <form method="post" action="reg_process.php">
                                      <br>
                                <h5>Company</h5>

                                <input type="text" name="txtcompanyname" autofocus class="form-control" placeholder="Enter Company" Required>
                                <br>
                                <h5>Position</h5>
                                <input type="text" name="txtposition" class="form-control" placeholder="Enter Position" Required>
                                <br>
                                <h5>Branch</h5>
                                <select class="form-select" name="txtbranch" Required> ';
                                  

                                     $sql = " select * from branches where bname = '$bname' ";
                                  $query = mysqli_query($con,$sql);
                                 
                                  
                                  while($row = mysqli_fetch_array($query)){
                                            $data = $row ['bname'];  
                                                 echo' <option> ';
                                                       echo $data;
                                                echo '</option>';
                                                echo $row['bname'];
                                  }


                                echo '
                                
                                </select>
                                <br><br>
                                 <input type="submit" name="btnnextnew2" value="Next" class="form-control btn btn-info" style="height: 50px">
                                   <textarea name="aname" style="visibility:hidden">';
                                 echo $name;
                                 echo '</textarea>

                                  <textarea name="asurname" style="visibility:hidden" >';
                                 echo $surname;
                                 echo '</textarea>
                                  <textarea name="aaddress"  style="visibility:hidden">';
                                 
                                 echo $address;
                                 echo '</textarea>
                                  <textarea name="acontact" style="visibility:hidden" >';
                                 
                                 echo $contact;
                                 echo '</textarea>
                                </form>
                           


                                ';


                             }
                             if(isset($_POST['btnnextnew2'])){ 
                              $name = $_POST['aname'];
                              $surname = $_POST['asurname'];
                              $address = $_POST['aaddress'];
                              $contact = $_POST['acontact'];
                              $company=$_POST['txtcompanyname'];
                              $position=$_POST['txtposition'];
                              $branch=$_POST['txtbranch'];
                              
                                echo '

                                 
                                <br>
                                <h6 style="cursor:default">◌ ◌‬ ●‬</h6>
                                 <h4 style="cursor:default">Admin Registration</h4>
                                 <br>
                             <form method="post" action="reg_process.php">
                                <h5>Email</h5>

                                <input type="text" name="txtemail" autofocus class="form-control" placeholder="Enter Email" Required>
                                <br><br><br>
                                <h5>Password</h5>
                                <input type="password" name="txtpassword" class="form-control" placeholder="Enter Password" Required>
                                <br>

                                 <h5>Repeat Password</h5>
                                <input type="password" name="txtrepassword" class="form-control" placeholder="Enter Password" Required>
                                <br><br>
                                <input type="submit" style="height: 50px;" name="btnsavenew" value="Save" class="btn btn-success form-control">
                                <input type="hidden" name="aname" value="'; echo $name ; echo'">
                                 <input type="hidden" name="asurname" value="'; echo $surname; echo'">
                                 <input type="hidden" name="aaddress" value="'; echo $address; echo'">
                                 <input type="hidden" name="acontact" value="'; echo $contact ;echo'">
                                 <input type="hidden" name="txtcompanyname" value="'; echo $company; echo'">
                                 <input type="hidden" name="txtposition" value="'; echo $position; echo'">
                                  <input type="hidden" name="txtbranch" value="'; echo $branch; echo'">
                             </form>
                                ';


                             }

                             /////////////////////////////Save new Admin //////////////////
                             if(isset($_POST['btnsavenew'])){ 
                              $name = $_POST['aname'];
                              $surname = $_POST['asurname'];
                              $address = $_POST['aaddress'];
                              $contact = $_POST['acontact'];
                              $company=$_POST['txtcompanyname'];
                              $position=$_POST['txtposition'];
                              $branch=$_POST['txtbranch'];
                              $email = $_POST['txtemail'];
                              $password = $_POST['txtpassword'];
                               $repassword = $_POST['txtrepassword'];
                             $securepass= md5($password);
                                $outputid = "SELECT branch_id FROM `branches` WHERE bname = '$branch' ";
                                $result =  mysqli_query($con,$outputid);

                                 while($row = mysqli_fetch_array($result)){
                           $id = $row['branch_id'];
                                   }
                                  
                                  $checkemail = "SELECT * FROM `admin_account` WHERE email = '$email'";
                                  $resultcheckemail =  mysqli_query($con,$checkemail);
                                     $count= mysqli_num_rows($resultcheckemail);
                                  if ($count==1){
                                       echo '
                                           <br><br><br><br><br>
                             <br>
                           <h3 style="color:red"><i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           </h3>
                             <br><br>
                            <h3>This email address has <span style="text-transform: uppercase;color: red;font-weight: bolder">Already Been</span>Taken. </h3>
                            <br>
                              <button onclick="goBack()" class="btn btn-info form-control" style="height: 50px;" >Please Try Again</button>

                              <script>
                              function goBack() {
                                window.history.back();
                              }
                              </script>
                                       '; 
                                    } else
                                  
                       
                                
                                if($password != $repassword){

                                        echo '
                                        <br><br><br><br><br>
                             <br>
                           <h3 style="color:red"><i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           </h3>
                             <br><br>
                            <h3>Password <span style="text-transform: uppercase;color: red;font-weight: bolder"> Does not</span> Match . </h3>
                            <br>
                              <button onclick="goBack()" class="btn btn-info form-control" style="height: 50px;" >Please Try Again</button>

                              <script>
                              function goBack() {
                                window.history.back();
                              }
                              </script>
                                        ';

                                 }else {
                                     
                                                     
                                 $sql = "INSERT INTO `admin_account`( `aname`, `surname`, `company`, `position`, `branch_id`, `address`, `contact_no`, `email`, `password`) VALUES ('$name','$surname','$company','$position','$id','$address','$contact','$email',' $securepass')";
                                 if (mysqli_query($con,$sql)) {

                                 ?> 

                                    <br><br><br><br>
                              <h3 style="font-family: centaur;text-align: center;">Data Successfully Saved <span style="color:green;font-size: 30px;"> <i class="fas fa-save"></i></span></h3>
                              <br><br>
                             <h2 style="color:green;font-size: 70px;text-align: center">  <i class="fas fa-user-check"></i></h2>
                             <br>
                             <h5 style="text-align: center;">You are now an Official Admin</h5>
                             <br>
                                <h5 style="text-align: center"> Click <a href="index.php?logindetails&email='<?php echo $email?>'&password='<?php echo $password?>'" style="text-decoration: none">HERE</a> to Login</h5>




                                  <?php
                               }

                               }


                             }
                             /////////////////////////////////////////////////////////////////




                               ////////////////////////////////////////////////////////////////////end New///////////////////////////////////////////////////
                             else if(isset($_POST['existingbranch'])){ 
                              echo '
                               <a href="register.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                              <br>

                              <h6 style="cursor:default">● ◌‬ ◌‬ </h6>
                                <h4 style="cursor:default">Admin Registration</h4>
                                <form method="post" action="reg_process.php">
                                <br>
                                <h5>Name</h5>

                                <input type="text" name="txtname" autofocus class="form-control" placeholder="Enter Name" Required>
                                <br>
                                <h5>Surname</h5>
                                <input type="text" name="txtsurname" class="form-control" placeholder="Enter Surname" Required>
                                <br>
                                <h5>Address</h5>
                                <input type="text" name="txtaddress" class="form-control" placeholder="Enter Address" Required>
                                <br>
                                <h5>Contact</h5>
                                <input type="number" name="txtcontact" class="form-control" placeholder="Enter Contact" Required>
                                <br>
                                <input type="submit" name="btnnext" value="Next" class="form-control btn btn-info" style="height: 50px">

                             
                              
                                

                               

                                
                                 
                               
                                

                                 </form>



                              ';
                             
                             }
                             if(isset($_POST['btnnext'])){
                              $name=$_POST['txtname'];
                              $surname=$_POST['txtsurname'];
                              $address=$_POST['txtaddress'];
                              $contact=$_POST['txtcontact'];
                             
                             
                                echo ' 
                           
                            <br>
                             <a href="register.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                                 <h6 style="cursor:default">◌ ●‬ ◌‬ </h6>
                                  <h4 style="cursor:default">Admin Registration</h4>
                                <br>
                                <form method="post" action="reg_process.php">
                                      <br>
                                <h5>Company</h5>

                                <input type="text" name="txtcompanyname" autofocus class="form-control" placeholder="Enter Company" Required>
                                <br>
                                <h5>Position</h5>
                                <input type="text" name="txtposition" class="form-control" placeholder="Enter Position" Required>
                                <br>
                                <h5>Select your Branch</h5>
                                <select class="form-select" name="txtbranch" Required> ';
                                  

                                     $sql = " select * from branches";
                                  $query = mysqli_query($con,$sql);
                                 
                                  
                                  while($row = mysqli_fetch_array($query)){
                                            $data = $row ['bname'];  
                                                 echo' <option> ';
                                                       echo $data;
                                                echo '</option>';
                                                echo $row['bname'];
                                  }


                                echo '
                                
                                </select>
                                <br><br>
                                 <input type="submit" name="btnnext2" value="Next" class="form-control btn btn-info" style="height: 50px">
                                   <textarea name="aname" style="visibility:hidden">';
                                 echo $name;
                                 echo '</textarea>

                                  <textarea name="asurname" style="visibility:hidden" >';
                                 echo $surname;
                                 echo '</textarea>
                                  <textarea name="aaddress"  style="visibility:hidden">';
                                 
                                 echo $address;
                                 echo '</textarea>
                                  <textarea name="acontact" style="visibility:hidden" >';
                                 
                                 echo $contact;
                                 echo '</textarea>
                                </form>
                           


                                ';


                             }

                             if(isset($_POST['btnnext2'])){ 
                              $name = $_POST['aname'];
                              $surname = $_POST['asurname'];
                              $address = $_POST['aaddress'];
                              $contact = $_POST['acontact'];
                              $company=$_POST['txtcompanyname'];
                              $position=$_POST['txtposition'];
                              $branch=$_POST['txtbranch'];
                              
                                echo '
                                  <a href="register.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                                <br>
                                <h6 style="cursor:default">◌ ◌‬ ●‬</h6>
                                 <h4 style="cursor:default">Admin Registration</h4>
                                 <br>
                             <form method="post" action="reg_process.php">
                                <h5>Email</h5>

                                <input type="text" name="txtemail" autofocus class="form-control" placeholder="Enter Email" Required>
                                <br><br><br>
                                <h5>Password</h5>
                                <input type="password" name="txtpassword" class="form-control" placeholder="Enter Password" Required>
                                <br>

                                 <h5>Repeat Password</h5>
                                <input type="password" name="txtrepassword" class="form-control" placeholder="Enter Password" Required>
                                <br><br>
                                <input type="submit" style="height: 50px;" name="btnsave" value="Save" class="btn btn-success form-control">
                                <input type="hidden" name="aname" value="'; echo $name ; echo'">
                                 <input type="hidden" name="asurname" value="'; echo $surname; echo'">
                                 <input type="hidden" name="aaddress" value="'; echo $address; echo'">
                                 <input type="hidden" name="acontact" value="'; echo $contact ;echo'">
                                 <input type="hidden" name="txtcompanyname" value="'; echo $company; echo'">
                                 <input type="hidden" name="txtposition" value="'; echo $position; echo'">
                                  <input type="hidden" name="txtbranch" value="'; echo $branch; echo'">
                             </form>
                                ';


                             }
                             /////////////////////////////////////save new Admin for existing ////////////////////////

                             if(isset($_POST['btnsave'])){ 
                              $name = $_POST['aname'];
                              $surname = $_POST['asurname'];
                              $address = $_POST['aaddress'];
                              $contact = $_POST['acontact'];
                              $company=$_POST['txtcompanyname'];
                              $position=$_POST['txtposition'];
                              $branch=$_POST['txtbranch'];
                              $email = $_POST['txtemail'];
                              $password = $_POST['txtpassword'];
                               $repassword = $_POST['txtrepassword'];
                                $securepass= md5($password);
                               
                                $outputid = "SELECT branch_id FROM `branches` WHERE bname = '$branch' ";
                                $result =  mysqli_query($con,$outputid);

                                 while($row = mysqli_fetch_array($result)){
                           $id = $row['branch_id'];
                                   }
                                  
                                  $checkemail = "SELECT * FROM `admin_account` WHERE email = '$email'";
                                  $resultcheckemail =  mysqli_query($con,$checkemail);
                                     $count= mysqli_num_rows($resultcheckemail);
                                  if ($count==1){
                                       echo '
                                           <br><br><br><br><br>
                             <br>
                           <h3 style="color:red"><i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           </h3>
                             <br><br>
                            <h3>This email address has <span style="text-transform: uppercase;color: red;font-weight: bolder">Already Been</span>Taken. </h3>
                            <br>
                              <button onclick="goBack()" class="btn btn-info form-control" style="height: 50px;" >Please Try Again</button>

                              <script>
                              function goBack() {
                                window.history.back();
                              }
                              </script>
                                       '; 
                                    } else
                                  
                       
                                
                                if($password != $repassword){

                                        echo '
                                        <br><br><br><br><br>
                             <br>
                           <h3 style="color:red"><i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           <i class="fas fa-exclamation-triangle"></i>
                           </h3>
                             <br><br>
                            <h3>Password <span style="text-transform: uppercase;color: red;font-weight: bolder"> Does not</span> Match . </h3>
                            <br>
                              <button onclick="goBack()" class="btn btn-info form-control" style="height: 50px;" >Please Try Again</button>

                              <script>
                              function goBack() {
                                window.history.back();
                              }
                              </script>
                                        ';

                                 }else {
                                 $sql = "INSERT INTO `admin_account`( `aname`, `surname`, `company`, `position`, `branch_id`, `address`, `contact_no`, `email`, `password`) VALUES ('$name','$surname','$company','$position','$id','$address','$contact','$email','$securepass')";
                                 if (mysqli_query($con,$sql)) {

                                 ?> 

                                    <br><br><br><br>
                              <h3 style="font-family: centaur;text-align: center;">Data Successfully Saved <span style="color:green;font-size: 30px;"> <i class="fas fa-save"></i></span></h3>
                              <br><br>
                             <h2 style="color:green;font-size: 70px;text-align: center">  <i class="fas fa-user-check"></i></h2>
                             <br>
                             <h5 style="text-align: center;">You are now an Official Admin</h5>
                             <br>
                                <h5 style="text-align: center"> Click <a href="index.php?logindetails&email='<?php echo $email?>'&password='<?php echo $password?>'" style="text-decoration: none">HERE</a> to Login</h5>




                                  <?php
                               }

                               }

                             }
                             /////////////////////////////////////////////////////////////////////////////////////////
                              ?> 
                            

                            </div> 

                        </div>

                  </div>

              </div>
               <div class="col-sm-3"></div>

          </div>
      </div>

   
  </body>
</html>