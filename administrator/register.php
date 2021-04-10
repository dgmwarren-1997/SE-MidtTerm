
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
                              <br>
                               <a href="index.php" class="btn"> <h5> <i class="fas fa-arrow-left"></i></h5></a>
                               <br><br><br>
                               <nav aria-label="breadcrumb" style="text-align: center;margin-left: 20px">
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><h4 style="cursor: default;">Admin Registration</h4></li>
                                    <li class="breadcrumb-item active" aria-current="page"><h4 style="cursor: default;">Branch Registration</h4></li>
                                  </ol>
                                </nav>

                              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success form-control" style="height: 90px; font-size: 35px">New</a>
                               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
                  <div class="container">

                    <form action="index.php" name="myform" method="post">
                        <h5>Enter Administrator Access Code  <i class="fas fa-key"></i></h5>
                          <br>
                        <input type="password"  class="form" name="accesscodes"  placeholder="✪✪✪✪✪✪" required>
                        <input type="submit" class="btn btn-success" name="btnaccesscodenew">
                      
                    </form>
                
                  </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger"  data-dismiss="modal" >Close</button>
       
       
      </div>
    </div>
  </div>
</div>
                 <form method="post" action="reg_process.php">
 
                                

                  <br><br>
                                  <input type="submit" name="existingbranch" class="form-control btn btn-info" style="height: 90px; font-size: 35px" value="Existing">
                              </form> 
                              <br>
                              <h6><span style="color:rgb(21, 115, 71);font-weight: bold">NEW</span>       : for Branch Registration and Admin registration</h6>
                              <h6><span style="color:rgb(49, 210, 242);font-weight: bold">EXISTING</span> : for Admin Registration w/branch registered</h6>
                              <!---->
                            
                              <!---->


                            </div> 

                        </div>

                  </div>

              </div>
               <div class="col-sm-3"></div>

          </div>
      </div>

   
  </body>
</html>