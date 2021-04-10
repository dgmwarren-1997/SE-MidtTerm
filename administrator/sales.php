<?php
session_start();
if(!isset($_SESSION["admin_id"])){
  header("location:index.php");
}
?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

     <link rel="shortout icon" type="image/x-icon" href="https://cdn.fbsbx.com/v/t59.2708-21/129691924_913408942397501_4331861266440577245_n.gif?_nc_cat=110&ccb=3&_nc_sid=041f46&_nc_eui2=AeExms4dQDTY7umZoxC1iM7y4IS0rfEewhXghLSt8R7CFcR6rJPQwvNIXCDTdGMRILEaZEExVHaA9Qb_hKCfdF6W&_nc_ohc=1SjKXqBVwr8AX8CjKE_&_nc_ht=cdn.fbsbx.com&oh=087ab825a9ccc133567592fc952fa92e&oe=60394595">



    <!-- Bootstrap CSS -->
   <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="ajax.js"></script>

    <title>Admin-Hantech</title>
        <?php 
    
        include "myStyle.php";
       include "connection/connect.php";
        ?>

        <style type="text/css">
          .active {
 
}
        </style>
  </head>
  <body>
  <!-- Header -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark dark" >

  <div class="container">
 <a class="navbar-brand logoname" href="#" style="font-size: 25px"><img class="rounded" style="height: 45px;width: 45px;" src="png/favicon.ico">
Hantech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link"  href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size: 25px"></i> Dashboard</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="product.php"><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 25px"></i> Product</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link"  id="active" href="sales.php"><i class="fa fa-usd" aria-hidden="true" style="font-size: 25px"></i> Sales</a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-external-link-square" aria-hidden="true" style="font-size: 25px"></i>  Others
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true" ></i> About Us</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out </a>
         
<!-- Button trigger modal -->

       
        </div>
      </li>
          <li class="nav-item " style="cursor: default;">
             <h5 style="color:black;font-weight:bolder;margin-top: 10px ;font-family: ravie" >Hi <i class="fas fa-exclamation"></i> <span style="color: white;  font-weight: bold;font-family: tw cent mt;font-size: 20px;background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgba(43, 43, 43));border-radius: 10px; padding: 5px;  "> <?php echo $_SESSION["name"]?></span> <i class="fas fa-smile" style="color:white;"></i></h5>
          
      </li> 
    </ul>

  </div>

</div>
</nav>
<!--ask if user want to log out -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning<i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h5>
       
          <a href="#" class="btn" data-dismiss="modal" aria-label="Close"><i class="fa fa-window-close" aria-hidden="true"></i></a>
          
      
      </div>
      <div class="modal-body">
        Are you sure you want to Log out ?


      </div>
      <div class="modal-footer">
        
        <a href="logout.php" class="btn btn-danger">Yes</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!--end of modal-->
    <!--End of Header -->
 
<br><br><br>
<br>


 <div class="sidenav" >
  <br><br>
  <br><br>
  <ul class="navi">
    <li class="navi-li " id="all"  data-toggle="tooltip" data-placement="right" title="All Sales Data"><a href="sales.php?all"><i class="fas fa-home "></i><p style="font-size: 10px;margin-left: 25px">All</p></a></li>
      
    <li class="navi-li" id="pending"  data-toggle="tooltip" data-placement="right" title="all pending Orders/transactions
    made by the customer"><a href="sales.php?pending"><i class="fas fa-redo" ></i><p style="font-size: 10px;margin-left: 13px;">Pending</p></a></li>
    
    <li class="navi-li" id="orders" data-toggle="tooltip" data-placement="right" title="Orders made by the customer"><a href="sales.php?orders&walkin" ><i class="fas fa-shopping-cart"></i><p style="font-size: 10px;margin-left: 17px;">Orders</p></a></li>
    
    <li class="navi-li" id="completed" data-toggle="tooltip" data-placement="right" title="completed Transactions"><a href="sales.php?completed" ><i class="far fa-check-circle"></i><p style="font-size: 10px;margin-left: 6px;">Completed</p></a></li>
  </ul>
</div>





<!--MAIN--->
<div class="main" >
  <!--MAIN--->
      <?php 
       if(isset($_GET['all'])){
        ?>
        <script type="text/javascript">
          
         document.getElementById("all").setAttribute('style',' background-color: grey;pointer-events: none;');       
        </script>
         <script>
window.onload = function () {
      <?php 
  
        $branc = $_SESSION['branchid'];
   $countsql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending'   ";
                           $resultaa = mysqli_query($con,$countsql); // run query
                           $countpending= mysqli_num_rows($resultaa); // to count if necessary
  
    $sql = "  SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'reservation' ";
                            $result = mysqli_query($con,$sql); // run query
             
                            $countreserve= mysqli_num_rows($result); // to count if necessary

                             $sqls = "  SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and  `stat_checkout`='false' and transaction_type = 'Walk in' ";
                            $resultae = mysqli_query($con,$sqls); // run query
                            $countwalkin= mysqli_num_rows($resultae); // to count if necessary
                             $sqlcance = " SELECT * FROM `cancelled` WHERE branch_id = '$branc' and status = 'cancelled'   ";
                           $resultee = mysqli_query($con,$sqlcance); // run query
                           $countcance= mysqli_num_rows($resultee); // to count if necessary


               $sqlexp = " SELECT * FROM `expired` WHERE branch_id = '$branc' and status = 'expired'  ";
                           $resultss = mysqli_query($con,$sqlexp); // run query
                           $countexp= mysqli_num_rows($resultss); // to count if necessary

                            $sqlcomp = " SELECT * FROM `completed` WHERE branch_id = '$branc' and status = 'completed'  ";
                           $resultsss = mysqli_query($con,$sqlcomp); // run query
                           $countcomp= mysqli_num_rows($resultsss); // to count if necessary

      ?>
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "Sales RECORD",
    horizontalAlign: "left"
  },
  data: [{
    type: "doughnut",
    startAngle: 60,
    //innerRadius: 60,
    indexLabelFontSize: 17,
    indexLabel: "{label} - #percent%",
    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
    dataPoints: [
     { y: <?php echo $countpending?>, label: "Pending Orders" },
      { y: <?php echo $countcance?>, label: "Cancelled " },
      { y: <?php echo $countreserve?>, label: "Reservation" },
      { y: <?php echo $countwalkin?>, label: "Walk in"},
      { y: <?php echo $countexp?>, label: "Expired"},
      { y: <?php echo $countcomp?>, label: "Completed"}
    ]
  }]
});
chart.render();

}
</script>

  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

       <br><br>
        <div class="container">
    <div class="row">
          <div class="col-sm-6">
            
            <div class="card" style="width: 100%; ">
  <div class="card-header third" >
 <strong>Pending ORDERS</strong>
 <?php 
  $branc = $_SESSION['branchid'];
   $countsql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending'   ";
                           $resultaa = mysqli_query($con,$countsql); // run query
                           $count= mysqli_num_rows($resultaa); // to count if necessary
                           ?>
                           <h6>Showing <strong></strong> Order/s : <strong><?php echo $count?></strong><a href="sales.php?pending" style="color:white" class="btn btn-link">CLICK TO ACCEPT ORDERS</a> </h6>
                           <?php
  ?>

  </div>
   <div class="card-body">
          <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 500px; }
                  .tableFixHead thead th { position: sticky; top: 0; }
                </style>
                    <div class="tableFixHead">
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Order Created</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
       <th scope="col">Price</th>
        <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $branc = $_SESSION['branchid'];
      $sql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending' limit 5   ";
                           $result = mysqli_query($con,$sql); // run query
                          $count= mysqli_num_rows($result); // to count if necessary
                 
                        if ($count >= 1) {

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                          
                            while($row = mysqli_fetch_array($result)){ 
                              ?>
                              <tr>
                                <td><?php echo $row['dateandtime']?></td>
                                <td><?php echo $row['uname']?></td>
                                 <td><?php echo $row['name']?></td>
                                  <td><?php echo $row['quantity']?></td>
                                   <td><?php echo $row['price']?></td>
                                    <td><?php echo $row['total']?></td>
                              </tr>
                              <?php
                            }

                        } else {
                          ?>
                          <tr>
                            <td colspan="2">
                                <h5>No PENDING Orders yet.</h5>
                            </td>
                          </tr>
                          <?php
                        }
     ?>

  </tbody>
</table>
</div>
   </div> 
   <!--end of card-body-->
    <div class="card-footer third">
      
    </div> 
    <!--end of card-footer-->
</div>
<br><br>

          </div>

           <!--end of -->
          <div class="col-sm-6">
              <div class="card" style="width: 100%; ">
  <div class="card-header secon" >
  <STRONG>Accepted ORDERS , Validity & Transcations</STRONG>
  </div>
   <div class="card-body">
   <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <strong>WALKIN ORDERS</strong>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Walkin Orders are orders that have been process through online by the customer with their own account registered to this system .
        Their Orders once accepted will be valid only for 24 hours. if this validity past order will no longer be valid.
        <br>
            <?php 
                $sql = "  SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and  `stat_checkout`='false' and transaction_type = 'Walk in' ";
                            $result = mysqli_query($con,$sql); // run query
                            $count= mysqli_num_rows($result); // to count if necessary
                       
                          ?>
                          <h5>Walkin Order/s at this moment : <strong style="color: red"><?php echo $count?></strong><br> <a href="sales.php?orders&walkin">CLICK HERE TO PROCEED</a>. </h5>
                          <?php
            
        
            ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         <strong>RESERVE ORDERS</strong>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Reserve Orders are orders that have been process through online by the customer with their own account registered to this system .
        this type of transaction is made for customers who cant transact for 24 hours , they are given privilege to make reservation up to the 
        date given or created by them.
        <br>
            <?php 
                $sql = "  SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'reservation' ";
                            $result = mysqli_query($con,$sql); // run query
                            $count= mysqli_num_rows($result); // to count if necessary
                       
                          ?>
                          <h5>RESERVE Order/s at this moment : <strong style="color: red"><?php echo $count?></strong><br> <a href="sales.php?orders&reserve">CLICK HERE TO PROCEED</a>. </h5>
                          <?php
            
        
            ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <strong>COMPLETED</strong>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
       A fully Accomplished Transcation.
       <h5><a href="sales.php?completed">CLICK HERE TO PROCEED</a></h5>
      </div>
    </div>
  </div>
</div>
   </div> 
   <!--end of card-body-->
    <div class="card-footer secon">
      
    </div> 

    <!--end of card-footer-->
</div>
<br><br>
  
          </div>
    </div>
  </div>



        <?php
       
      }else
  
      if(isset($_GET['pending'])){
         
        
                     
        ?>

         <script type="text/javascript">
          
           document.getElementById("pending").setAttribute('style',' background-color: grey;pointer-events: none;'); 
        </script>
       <h4 style="font-family:elephant;text-align: center;border-bottom: 1px solid rgba(10,0,0,.5);">Pending Customer Transactions</h4>
         
          
       <br>

          <?php 
           $branc = $_SESSION["branchid"];
      
          if(isset($_GET['successful'])){ 
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data have been <strong>Approved</strong> Successfully!!
 
        <a href="#" class="close" data-dismiss="alert" aria-label="Close" style="float: right"><i class="fas fa-window-close"></i></a>
      </div>';
            
          }else  if(isset($_GET['unsuccessful'])){
            $track = $_GET['trackid'];
            ?> <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data have been <strong>Cancelled</strong> Successfully!! ..<br><br> Accidentally click? click <a href="dataprocessing.php?undo&trackid=<?php echo $track?>"  style="text-decoration: none;border: 1px solid grey;padding: 5px;margin-top: -5px;border-radius: 14px;">UNDO <i class="fas fa-sync fa-spin"></i></a>
         <a href="#" class="close" data-dismiss="alert" aria-label="Close" style="float: right"><i class="fas fa-window-close"></i></a>
            
         
       
      </div><?php
          }else if (isset($_GET['orderUpdatedsuccessfully'])) {
             echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        All Data  have been <strong>Approved</strong> Successfully!!
 
        <a href="#" class="close" data-dismiss="alert" aria-label="Close" style="float: right"><i class="fas fa-window-close"></i></a>
      </div>';
          }
             

          if(isset($_GET['approvedall'])){ 
            
                              echo '<script type="text/javascript">
            
                            myFunction();
                                function myFunction() {
                                  setInterval(function(){ 

                                      window.location.href= "dataprocessing.php?approvedall&trackid=<?php echo $tid?>&trtype=<?php echo $typ?>";
                                   },3000); //////SET THE EXPIRED DATA DELETED AFTER 5 DAYS
                                }
                                    

                  
                               </script>


                                 <div class="alert alert-success" role="alert">
               

                                  <strong>  APPROVING</strong> all Orders at ONCE  <i class="fas fa-spinner fa-pulse"></i>
                                  </div>
                               ' ;
                                          }

            
                      if(isset($_GET['successfullyrestored'])){ 
                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data have been <strong>Restored</strong> .
 
        <a href="#" class="close" data-dismiss="alert" aria-label="Close" style="float: right"><i class="fas fa-window-close"></i></a>
      </div>';
            
                      }

       
          
      
          ?>

     

       

      
        <div class="container">

          <div class="row">
                
   <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 500px; }
                  .tableFixHead thead th { position: sticky; top: 0; }
                </style>
                    <div class="tableFixHead">
              <table class="table">
                    <?php 
                 $branc = $_SESSION["branchid"];
                      $sql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                        ?>
                        <h6 style="position:fixed">Showing  <a href="sales.php?pending">  <strong style="text-decoration: underline;"><?php echo $count?></strong> </a>Order/s..</h6>
                        <br><br>
                       
                        <?php
                
                    ?>

                  
                     <div class="wrapper" style="position:fixed">
  <a href="sales.php?pending&approvedall" id="btnbtn"><span>Approved All orders</span></a>
</div>
 <br>
  <br>
   <style type="text/css">
 .wrapper{
 

}

#btnbtn{
  display: block;
  width: 180px;
  height: 30px;
  line-height: 30px;
  font-size: 12px;
  font-family: sans-serif;
  text-decoration: none;
  color: #333;
  border: 2px solid #333;
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
  border-radius: 5px;
}

#btnbtn span{
  position: relative;
  z-index: 2;
}

#btnbtn:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(28, 36, 73);
  transition: all .35s;
}

#btnbtn:hover{
  color: #fff;
}

#btnbtn:hover:after{
  width: 100%;
}

                        </style>
  <thead class="thead-dark">
    <tr>
      <th scope="col">ACTION</th>

      <th scope="col">Customer Name</th>
      <th scope="col">Product</th>
      <th scope="col">Description</th>
       <th scope="col">price</th>
        <th scope="col">Quantity</th>
         <th scope="col">Type</th>
          <th scope="col">Order Created</th>
         
         <th scope="col">Total</th>
    </tr>
  </thead>
    
  <tbody>
      <?php 
  
       

               $sql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                        
                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                         $orderdate =  date("F d, y",strtotime($row['dateandtime']));
                         $target = date("F d, y",strtotime($row['target_date']));
                              ?>
                               <tr>
                                <th scope="row">
                                  <br>
                                  <a href="dataprocessing.php?approved&trackid=<?php echo $row['track_id']?>&trtype=<?php echo $row['transaction_type']?>" class="btn btn-success" style="font-size: 12px; width: 98px;background-color: white;color: black">Approved <i class="fas fa-check-circle"></i></a><br>
                                   <a href="dataprocessing.php?cancel&trackid=<?php echo $row['track_id']?>" class="btn btn-danger" style="font-size: 12px;margin-top: 10px;width: 98px;background-color: white;color: black">Cancel  <i class="fas fa-trash"></i></a>

                                </th>
                                <td><br><br><h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6></td>
                                <td>
                                  <img src="<?php echo $image_src?>"  height="100" width="80">
                                  <br>
                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong></td>
                                <td><br><?php echo $row['description']?></td>
                                <td><br><br>₱<?php echo $row['price']?></td>
                                <td><br><br><?php echo $row['quantity']?></td>
                                 <td><br><br><strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong></td>
                                   <td><br><br><?php echo $orderdate?></td>
                               
                                <td><br><br><strong>₱<?php echo $row['total']?></strong></td>
                              </tr>
                              <?php
           
                            }
                          }else {
                            ?>
                            <tr>

                              <td><h5><strong>No Orders yet <i class="fas fa-box-open" style="font-size: 25px"></i> . .</strong></h5></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <?php
                          }

  
      ?>
   
   
  </tbody>
</table>
     </div>       
  
          </div>
        </div>
       
        <h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>
        <?php
        
     



      }else
       if(isset($_GET['orders'])){
          $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
        ?>
         <script type="text/javascript">
          
            document.getElementById("orders").setAttribute('style',' background-color: grey;pointer-events: none;'); 
            
          

        </script>
          <h4 style="font-family:elephant;text-align: center;border-bottom: 1px solid rgba(10,0,0,.5);">Orders</h4>
         
         <div class="wrapper">
  <a href="#" id="btnbtn" data-toggle="modal" data-target="#newtrans"><span>NEW TRANSACTION</span></a>

</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="newtrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NEW TRANSACTION</h5>
       
      </div>
      <div class="modal-body">
         
            
        <a href="accessor.php?newtrans" class="btn btn-info" style="width: 200px;margin-left: 27px;">New </a>
        <a href="#" class="btn btn-success" style="width: 200px"  data-toggle="modal" data-target="#custs">Customer Tansaction</a>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 13px;">Cancel</button>
       
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="custs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Transaction</h5>
       
      </div>
      <div class="modal-body">
         
         
        <form method="post" action="accessor.php">
          <h5>SELECT USER</h5>
          <select name="txtuserid" class="form-select">
              <?php 
              $sql = " select * from user_account order by user_id   ";
                          $result = mysqli_query($con,$sql); // run query
                        
                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           while($row = mysqli_fetch_array($result)){
                            ?>
                            <option value ="<?php echo $row['user_id']?>" style ="font-size: 18px">
                             <?php echo $row['uname']?> <br>
                            <?php echo $row['surname']?>
                              

                            </option>
                            <?php
                    }
          ?>
          </select>
          
            
             <button type="submit" class="form-control btn btn-info" style="margin-top: 30px" name="proceedcust">PROCEED</button>                
        </form>
       
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 13px;">Cancel</button>
       
      </div>
    </div>
  </div>
</div>
   <style type="text/css">
 .wrapper{
 

}

#btnbtn{
  display: block;
  width: 180px;
  height: 30px;
  line-height: 30px;
  font-size: 12px;
  font-family: sans-serif;
  text-decoration: none;
  color: #333;
  border: 2px solid #333;
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
  border-radius: 5px;
}

#btnbtn span{
  position: relative;
  z-index: 2;
}

#btnbtn:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(28, 36, 73);
  transition: all .35s;
}

#btnbtn:hover{
  color: #fff;
}

#btnbtn:hover:after{
  width: 100%;
}

                        </style>

      
       <br>
     <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   
  
   

        <p>
   <?php 
              $branc = $_SESSION["branchid"];
        
                       $cooo = " SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'Walk in'   ";
                           $resulta = mysqli_query($con,$cooo); // run query
                           $counta= mysqli_num_rows($resulta); // to count if necessary
                           ?>
                            <li class="breadcrumb-item">
                           <a href="sales.php?orders&walkin" id="walkin" class="btn btn-link">
                           WALK-IN <span class="badge badge-light" style="background-color: black;white: rgb(187, 45, 59);"><?php echo $counta?></span>
                           </a></li>
                         
                           <?php
        
          
           
                $sql = " SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'reservation'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                           ?>
                             <li class="breadcrumb-item">
                            <a href="sales.php?orders&reserve" id="reserve" class="btn btn-link">

                            RESERVE <span class="badge badge-light" style="background-color: black;color:rgb(11, 94, 215);"><?php echo $count?></span>
                              </a></li>
                          
                           <?php
           
             
        
              $sql = " SELECT * FROM `cancelled` WHERE branch_id = '$branc' and status = 'cancelled'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                           ?>
                            <li class="breadcrumb-item" >
                              <a href="sales.php?orders&cancelled" id="cancelled" class="btn btn-link " >
                           
                            CANCELLED <span class="badge badge-light" style="background-color: black;color:red"><?php echo $count?></span>
                             </a></li>

                          
                           <?php

                $sql = " SELECT * FROM `expired` WHERE branch_id = '$branc' and status = 'expired'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                           ?>
                            <li class="breadcrumb-item" >
                              <a href="sales.php?orders&expired" id="expired" class="btn btn-link " >
                           
                           EXPIRED <span class="badge badge-light" style="background-color: black;color:red"><?php echo $count?></span>
                             </a></li>

                          
                           <?php


                           //////////////////////////////////////////////////////////////////////

                                       if(isset($_GET['viewvalidity'])){ 
         
        $trackid = $_GET['track_id'];
        $datee= $_GET['date'];
           $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'Walk in' and track_id = '$trackid'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                           $orderdate =  date("F d, y",strtotime($row['dateandtime']));
                       
                          $orderaccepted = $row['Order_accepted'];
                            $targetdate= $row['target_date'];

                   
                    
                   

                  
       ?>

         <script type="text/javascript">
            document.getElementById("walkin").setAttribute('style','border-bottom:1px solid black;text-decoration:none;color:black;pointer-events:none'); 
            document.getElementById("orders").setAttribute('style',' background-color: grey;pointer-events: none;'); 
                                                
                          const today = new Date('<?php echo  $orderaccepted ?>');
                         
                          const tomorrow = new Date(today);
                          tomorrow.setHours(tomorrow.getHours() +8);
                          var countDownDate=tomorrow.setDate(tomorrow.getDate()+1);
                            
                       
                          var x = setInterval(function() {

                          
                            var now = new Date().getTime();
                              
                          
                            var distance = countDownDate - now;
                       
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                              
                          
                           
                                document.getElementById("demo").innerHTML = days + "d : " + hours + "h : "
                            + minutes + "m : " + seconds + "s " ;
                             document.getElementById("demo1").innerHTML = hours + " hours : " + " remaining";
                           
                            // If the count down is over, write some text 
                            if (distance < 0) {
                              clearInterval(x);

                              document.getElementById("demo").innerHTML = "EXPIRED";
                              window.location.href="dataprocessing.php?expired&trackid=<?php echo $row['track_id']?>";
                                
                            }
                         

                          }, 1000);
                              function goBack() {
                                window.history.back();
                              }
                            
        </script>
         <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong><br>
                                  <strong>Valid until : </strong> <p style="font-size: 25px; font-weight: bolder" id="demo">-- : -- : -- : --</p>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                   <a href="sales.php?orders&walkin" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black"> Back</a>
                                    <a id="transact" href="accessor.php?topay&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>

                                   <br><br>
                                   
                                    
                                     <p id="demo1"></p> <h6>of Order type '<strong>WALK IN</strong>' will expire.</h6>

                                </div>
                              </div>

     <br>
  </div>
   <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
}
                        </style>

      
      

       <?php 
          }
    }


      }else

                           if(isset($_GET['walkin'])){ 

                             ?>
                             <script type="text/javascript">
                               
                               document.getElementById("walkin").setAttribute('style','border-bottom:1px solid black;text-decoration:none;color:black;pointer-events:none');      
                            
                                     
                             </script>
   <style> 
input[type=text] {
  width: 180px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  outline: none;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 4px 5px 5px 12px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 190px;
}
</style>
                             <form method="post" action="sales.php?orders&walkin"   >
                                  <input type="text" name="searchbar" id="searchbar" placeholder="🔍Search" onclick="this.select();" autofocus="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-toggle="tooltip" data-placement="right"
                                   title="Input valid track numbers and User ID/s only." > 
                                   <input type="submit" name="btnsearchtrackwalkin" value="Track-No" class="btn btn-danger" style="font-size: 15px;margin-bottom: 4px;background-color: white;color: black">
                                   <input type="submit" name="btnsearchUserwalkin" value="User-ID" class="btn btn-primary" style="font-size: 15px;margin-bottom: 4px;background-color: white;color: black">
                                  <a href="sales.php?orders&walkin"> <i class="fas fa-window-close"></i></a>
                             </form>
                            
                               
    
     <?php 
     $branc = $_SESSION["branchid"];
        if(isset($_POST['btnsearchtrackwalkin'])){ 
          $searchdata = $_POST['searchbar'];
                 $sql ="select * from walkin where branch_id = '$branc' AND status='approved' and `stat_checkout`= 'false' and transaction_type='walk in' and concat (`track_id`) like '%$searchdata%' ";
                            $result = mysqli_query ($con,$sql);
                              $count= mysqli_num_rows($result);
                              


                              if ($count >= 1) {
                                 ?>
                                <script type="text/javascript">
                                  
                                        document.getElementById("searchbar").setAttribute('value','<?php echo $searchdata?>'); 
                                       
                                        
                                </script>

                                 

                                <?php
                                 while($row = mysqli_fetch_array($result)){ 
                                   $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $userid = $row['user_id'];
                         $target = $row['target_date'];

                             $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                             
                                      ?>
                                          <br><br>
                              

   <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                   <a href="sales.php?orders&walkin&viewvalidity&<?php echo $mes?>&date=<?php echo $row['target_date']; ?>&<?php echo $mes?>&track_id=<?php echo $row['track_id']?>" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black">Check <i class="fas fa-directions"></i></a>
                                   <a id="transact" href="accessor.php?topay&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                  
                                </div>
                              </div>

     <br>
  </div>
                        <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
  color: white;
}
                        </style>


                                      <?php
                                 }
                                 ?>
                                  
                                 <?php
                               
                            
                            }else {
                            

                               ?>
                                <script type="text/javascript">
                                  
                                        document.getElementById("searchbar").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                 <br><br><br>
                                <div class="container">
                                  <div class="row">
                                   
                                    <h5>No Track Number Found in Reference key : <strong style="font-size: 40px; color: red"><?php echo $searchdata?></strong></h5>
                                  
                                    <h6>404 error;</h6>
                                     <a href="sales.php?orders&walkin" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black">refresh <i class="fas fa-sync"></i></a>
                                  </div>
                                </div>
                                <?php


                            
                            }//-------------------
          
        }else if(isset($_POST['btnsearchUserwalkin'])){ 
              $searchdata = $_POST['searchbar'];
                 $sql ="select * from walkin where branch_id = '$branc' AND status='approved' and `stat_checkout` = 'false'  and transaction_type='walk in' and concat (`user_id`) like '%$searchdata%' ";
                            $result = mysqli_query ($con,$sql);
                              $count= mysqli_num_rows($result);
                              


                              if ($count >= 1) {
                                 ?>
                                <script type="text/javascript">
                                  
                                        document.getElementById("searchbar").setAttribute('value','<?php echo $searchdata?>'); 
                                       
                                        
                                </script>

                                 

                                <?php
                                 while($row = mysqli_fetch_array($result)){ 
                                   $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $userid = $row['user_id'];
                          
                           $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                             

                                      ?>
                                          <br><br>
                              

   <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                   <a href="sales.php?orders&walkin&viewvalidity&<?php echo $mes?>&date=<?php echo $row['target_date']; ?>&<?php echo $mes?>&track_id=<?php echo $row['track_id']?>" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black">Check <i class="fas fa-directions"></i></a>
                                 <a id="transact" href="accessor.php?topay&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                </div>
                              </div>

     <br>
  </div>
                        <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
  color: white;
}
                        </style>


                                      <?php
                                 }
                                 ?>
                                    <div class="container">
                                   <div class="row">
                                      <a href="accessor.php?checkoutallwalkinuser&id=<?php echo $userid?>" class="btn btn-success" style="font-size: 15px;width: 110px;background-color: white;color: black;margin-left: 14px;">Select All <i class="far fa-check-square"></i></a>
                                   </div>
                                 </div>
                                
                                 <?php
                               
                            
                            }else {
                            

                               ?>
                                <script type="text/javascript">
                                  
                                        document.getElementById("searchbar").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                 <br><br><br>
                                <div class="container">
                                  <div class="row">
                                   
                                    <h5>No User Identification number Found in Reference key : <strong style="font-size: 40px; color: red"><?php echo $searchdata?></strong></h5>
                                  
                                    <h6>404 error;</h6>
                                     <a href="sales.php?orders&walkin" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black">refresh <i class="fas fa-sync"></i></a>
                                  </div>
                                </div>
                                <?php


                            
                            }//-------------------
        }else


         {
        $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and  `stat_checkout`='false' and transaction_type = 'Walk in'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $datee = $row['target_date'];
                            $target= $row['target_date'];

                          
                             $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                           

                              ?>
                            
                              

                            
                              <br><br>
                              

   <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                   <a href="sales.php?orders&walkin&viewvalidity&<?php echo $mes?>&date=<?php echo $row['Order_accepted']; ?>&<?php echo $mes?>&track_id=<?php echo $row['track_id']?>" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black">Check <i class="fas fa-directions"></i></a>
                                <a id="transact" href="accessor.php?topay&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                </div>
                              </div>

     <br>
  </div>
                  <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
  color: white;
}
                        </style>
         

                              <?php
            
                            }
                          }else {
                            ?>
                            
                             <br><br><br>
                                <div class="container">
                            <div class="row">

                              <h5><strong>No WALKIN Orders yet <i class="fas fa-box-open" style="font-size: 25px"></i> . .</strong></h5>
                             </div>
                             
                           
                            <?php
                          }

  
        
    }
  
 
                            
                           }else   
                                       if(isset($_GET['viewvalidityofreserve'])){ 
         
        $trackid = $_GET['track_id'];
        $datee= $_GET['date'];
           $branc = $_SESSION["branchid"];

               $sql = "SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved'  and transaction_type = 'reservation' and track_id = '$trackid' ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                           $orderdate =  date("F d, y",strtotime($row['dateandtime']));
                       



       ?>

         <script type="text/javascript">
            document.getElementById("reserve").setAttribute('style','border-bottom:1px solid black;text-decoration:none;color:black;pointer-events:none'); 
            document.getElementById("orders").setAttribute('style',' background-color: grey;pointer-events: none;'); 

                                     const today = new Date('<?php echo  $datee ?> ').getTime();
                          const tomorrow = new Date(today)
                          var countDownDate=tomorrow.setDate(tomorrow.getDate())

                       
                          var x = setInterval(function() {

                          
                            var now = new Date().getTime();
                              
                          
                            var distance = countDownDate - now;
                       
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                              
                          
                           
                                document.getElementById("demo").innerHTML = days + "d : " + hours + "h : "
                            + minutes + "m : " + seconds + "s " ;
                             document.getElementById("demo1").innerHTML =days + " days "+" and "+ hours + " hours : " + " remaining";
                           
                            // If the count down is over, write some text 
                            if (distance < 0) {
                              clearInterval(x);

                              document.getElementById("demo").innerHTML = "EXPIRED";
                              window.location.href="dataprocessing.php?expired&trackid=<?php echo $row['track_id']?>";
                                
                            }
                         

                          }, 1000);
                              function goBack() {
                                window.history.back();
                              }
                            
        </script>
         <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong><br>
                                  Order Created : <?php echo $orderdate?> <br>
                                  <strong>Valid until : </strong> <p style="font-size: 25px; font-weight: bolder" id="demo">-- : -- : -- : --</p>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                   <a href="sales.php?orders&reserve" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black"> Back</a>

                                     <a id="transact" href="accessor.php?topayreserve&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                   <br><br>
                                   
                                    
                                     <p id="demo1"></p> <h6>of Order type '<strong>RESERVE</strong>' will expire.</h6>

                                </div>
                              </div>

     <br>
  </div>

       <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
}
                        </style>
      

       <?php 
          }
    }
  }else if(isset($_GET['reserve'])){ 
                             ?>
                               <script type="text/javascript">
                               
                               document.getElementById("reserve").setAttribute('style','border-bottom:1px solid black;text-decoration:none;color:black;pointer-events:none');      
                                     
                             </script>

                             <style> 
input[type=text] {
  width: 180px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 4px 5px 5px 12px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 190px;
}
</style>
                             <form method="post" action="sales.php?orders&reserve"  >
                                  <input type="text" name="searchbarreserve" id="searchbarreserve" placeholder="🔍Search" onclick="this.select();" autofocus="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" data-toggle="tooltip" data-placement="right"
                                   title="Input valid track numbers and User ID/s only." > 
                                    <input type="submit" name="btnsearchtrackreserve" value="Track-No" class="btn btn-danger" style="font-size: 15px;margin-bottom: 4px;background-color: white;color: black">
                                   <input type="submit" name="btnsearchUserreserve" value="User-ID" class="btn btn-primary" style="font-size: 15px;margin-bottom: 4px;background-color: white;color: black">
                                  <a href="sales.php?orders&reserve"> <i class="fas fa-window-close"></i></a>
                             </form>
                            
    <?php 
      if(isset($_POST['btnsearchtrackreserve'])){ 

        $searchdata = $_POST['searchbarreserve'];
                 $sql ="select * from reserve where branch_id = '$branc' AND status='approved' and transaction_type='reservation' and concat (`track_id`) like '%$searchdata%' ";
                            $result = mysqli_query ($con,$sql);
                              $count= mysqli_num_rows($result);


                              if ($count >= 1) {
                                   ?>
                                <script type="text/javascript">
                                  
                                        document.getElementById("searchbarreserve").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                

                                <?php
                                 while($row = mysqli_fetch_array($result)){ 
                                   $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $userid = $row['user_id'];
                     $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                             
                         ?>
                           <br><br>
                              

   <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                 
                                 

                             

                                <a href="sales.php?orders&reserve&viewvalidityofreserve&<?php echo $mes?>&date=<?php echo $row['target_date']; ?>&<?php echo $mes?>&track_id=<?php echo $row['track_id']?>" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black">Check <i class="fas fa-directions"></i></a>
                                 <a id="transact" href="accessor.php?topayreserve&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                </div>
                              </div>

     <br>
  </div>
                        <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
}
                        </style>
                         
                         <?php

                       }
                        ?>
                        
                        <?php



                              }else {
                                ?>
                                 <script type="text/javascript">
                                  
                                        document.getElementById("searchbarreserve").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                 <br><br><br>
                                <div class="container">
                                  <div class="row">
                                   
                                    <h5>No Track number Found in Reference key : <strong style="font-size: 40px; color: red"><?php echo $searchdata?></strong></h5>

                                    <h6>404 error;</h6>
                                      <a href="sales.php?orders&reserve" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black">refresh <i class="fas fa-sync"></i></a>
                                  </div>
                                </div>
                                <?php

                              }//----------------------------

      } else if(isset($_POST['btnsearchUserreserve'])){ 
           $searchdata = $_POST['searchbarreserve'];
                 $sql ="select * from reserve where branch_id = '$branc' AND status='approved' and transaction_type='reservation' and concat (`user_id`) like '%$searchdata%' ";
                            $result = mysqli_query ($con,$sql);
                              $count= mysqli_num_rows($result);


                              if ($count >= 1) {
                                   ?>
                                <script type="text/javascript">
                                  
                                        document.getElementById("searchbarreserve").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                

                                <?php
                                 while($row = mysqli_fetch_array($result)){ 
                                   $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $userid = $row['user_id'];
                       
                        $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                             
                         ?>
                           <br><br>
                              

   <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                 <a href="sales.php?orders&reserve&viewvalidityofreserve&<?php echo $mes?>&date=<?php echo $row['target_date']; ?>&<?php echo $mes?>&track_id=<?php echo $row['track_id']?>" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black">Check <i class="fas fa-directions"></i></a>
                                  <a id="transact" href="accessor.php?topayreserve&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                </div>
                              </div>

     <br>
  </div>
                        <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
}
                        </style>
                         
                         <?php

                       }
                        ?>
                         <div class="container">
                                   <div class="row">
                                <a href="accessor.php?checkoutallreserveuser&id=<?php echo $userid?>" class="btn btn-success" style="font-size: 15px;width: 110px;background-color: white;color: black;margin-left: 14px;">Select All <i class="far fa-check-square"></i></a>
                                   </div>
                                 </div>
                        <?php



                              }else {
                                ?>
                                 <script type="text/javascript">
                                  
                                        document.getElementById("searchbarreserve").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                 <br><br><br>
                                <div class="container">
                                  <div class="row">
                                   
                                    <h5>No User identification number Found in Reference key : <strong style="font-size: 40px; color: red"><?php echo $searchdata?></strong></h5>

                                    <h6>404 error;</h6>
                                      <a href="sales.php?orders&reserve" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black">refresh <i class="fas fa-sync"></i></a>
                                  </div>
                                </div>
                                <?php

                              }//----------------------------
      }else

       {
  
        $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'reservation'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $datee = $row['target_date'];
                          $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                             
                              ?>
                            
               
                            
                          <br><br>
                              

   <div class="container">
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
         TOTAL:
          <strong> ₱ <?php echo $row['total']?></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                 <a href="sales.php?orders&reserve&viewvalidityofreserve&<?php echo $mes?>&date=<?php echo $row['target_date']; ?>&<?php echo $mes?>&track_id=<?php echo $row['track_id']?>" class="btn btn-info" style="font-size: 12px; width: 110px;background-color: white;color: black">Check <i class="fas fa-directions"></i></a>
                                  <a id="transact" href="accessor.php?topayreserve&trackid=<?php echo $row['track_id']?>&userid=<?php echo $row['user_id']?>" class="btn btn-success" style="font-size: 12px; width: 110px;background-color: white;color: black"><span>Transact <i class="fas fa-arrow-right"></i></span></a>
                                </div>
                              </div>

     <br>
  </div>
                        <style type="text/css">
                          #transact{
  
  
  
  
  
  text-decoration: none;
  
  
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}

#transact span{
  position: relative;
  z-index: 2;
}

#transact:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: rgb(20, 108, 67);
  transition: all .35s;
}

#transact:hover{
  color: #fff;
}

#transact:hover:after{
  width: 100%;
}
                        </style>
                         
                         <?php

                       }
                       


                              }else {
                                ?>
                                 <script type="text/javascript">
                                  
                                        document.getElementById("searchbarreserve").setAttribute('value','<?php echo $searchdata?>'); 
                                        
                                </script>
                                 <br><br><br>
                                <div class="container">
                                  <div class="row">
                                   
                                    <h5><strong>No RESERVE Orders yet <i style="font-size: 25px" class="fas fa-box-open"></i> ..</strong></h5>

                                    
                                  </div>
                                </div>
                                <?php

                              }//-

}
                }

                           if(isset($_GET['cancelled'])){
                           ?>
                               <script type="text/javascript">
                               
                               document.getElementById("cancelled").setAttribute('style','border-bottom:1px solid black;text-decoration:none;color:black;pointer-events:none');      
                              

                          
                            
                             </script>

      <div class="container">
        <div class="row"> <h6>Note : Data of order/s with a status of <span style="color: red">CANCELLED</span> will be Automatically Deleted by the system after 5 days..</h6>
         </div>
      </div>
     <?php 
  
        $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `cancelled` WHERE branch_id = '$branc' and status = 'cancelled'   ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $datee = $row['target_date'];

                       $checkifvalid ="UPDATE `trans_record` SET `status`='expired'  WHERE status= 'approved' and target_date < now()";
                              $resulta = mysqli_query($con,$checkifvalid); 
                               $countaa= mysqli_num_rows($resulta); // to count if necessary
                              if ($countaa >=1 ) {
                                  ?>
                                  <script type="text/javascript">
                                    
                                           window.location.href="dataprocessing.php?Deletecancelled=<?php echo $row['track_id']?>";
                                          
                                  </script>
                                 
                                  <?php
                              }
                              ?>
                           
                               

                           
                            
                              <br><br>
                              

   <div class="container">
    
    
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
       STATUS :
          <strong> <h5 style="text-transform: uppercase;font-size: 25px;color:red"><?php echo $row['status']?></h5></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                 


                                </div>
                              </div>

     <br>
  </div>

                              <?php
            
                            }
                          }else {
                            ?>
                               <br><br><br>
                              <div class="container">
                            <div class="row">

                              <h5><strong>No <span style="color: red">CANCELLED</span> Orders yet <i class="fas fa-box-open" style="font-size: 25px"></i> . .</strong></h5>
                            
                             </div>
                           </div>
                            <?php
                          }
                             
                           }  

    
            if(isset($_GET['expired'])){ 
                ?>
                               <script type="text/javascript">
                               
                               document.getElementById("expired").setAttribute('style','border-bottom:1px solid black;text-decoration:none;color:black;pointer-events:none');     
                                                    
                             </script>
                             <div class="container">
                               <div class="row">  <h6>Note : Data of order/s with a status of <span style="color: red">EXPIRED</span> will be Automatically Deleted by the system after 5 days..</h6></div>
                             </div>
    <?php 
  
        $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `expired` WHERE branch_id = '$branc' and status = 'expired'  ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary

                            
                             
                              
                           
                              



                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                         $datee= $row['target_date'];
                         
                              
                              ?>
                            

                            
                            
                              <br><br>
                              

   <div class="container">
     
           <div class="card">
                                <div class="card-header">
                                  Track NO : <strong> <?php echo $row['track_id']?></strong>
                                </div>
                                <div class="card-body">
                                     <div class="row">
                       
      <div class="col-sm-2">
          <p>PRODUCT </p>
        <img src="<?php echo $image_src?>"  class="img-thumbnail" style="height: 100px;width: 90px">
                                  <br>

                                  <strong style="text-transform: uppercase;"><?php echo $row['name']?> </strong>
      </div>
       <div class="col-sm-2">
         Product Description :
         
          <h6><?php echo $row['description']?></h6><br>
          Customer Name:
           <h6 style="font-family: comic sans ms;font-weight: bolder;text-transform: uppercase;"><?php echo $row['uname']?>  <?php echo $row['surname']?></h6>
          
       </div>
        <div class="col-sm-3">
           Type of Transaction : <br>
          <strong style="text-transform: uppercase;"><?php echo $row['transaction_type']?></strong><br><br>
          Item Price :
         <h6> ₱<?php echo $row['price']?></h6>
         
        </div>
        <div class="col-sm-3">
          Quantity :
          <h6><?php echo $row['quantity']?></h6> <br>
        STATUS :
          <strong> <h5 style="text-transform: uppercase;font-size: 25px;color:red"><?php echo $row['status']?></h5></strong>
           
        </div>
       
    </div>
                                </div>
                                <div class="card-footer">
                                  

                                </div>
                              </div>

     <br>
  </div>

                              <?php
            
                            }
                          }else {
                              
                            ?>
                               <br><br><br>
                              <div class="container">
                            <div class="row">

                              <h5><strong>No <span style="color:red">EXPIRED</span> Orders yet <i class="fas fa-box-open" style="font-size: 25px"></i> . .</strong></h5>
                            
                             </div>
                           </div>
                            <?php
                          }
                          //validityof
              
            
             
            }

        
            ?>
   </ol>
</nav>


 <h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>
  

       
      




      




 

        <?php
        
      }
      else
     if(isset($_GET['completed'])){
        ?>
          <script type="text/javascript">
          document.getElementById("completed").setAttribute('style',' background-color: grey;pointer-events: none;');          
                
        </script>
        
              <h4 style="font-family:elephant;text-align: center;border-bottom: 1px solid rgba(10,0,0,.5);">All Successful Transactions</h4>
       <br>
      <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
         
         <div class="container">
             <div class="row">
                 <div class="col-sm-6">
                          <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 500px; }
                  .tableFixHead thead th { position: sticky; top: 0; }
                </style>
                    <div class="tableFixHead">
        <table class="table table-hover">
  <thead class="thead-dark  table-success ">
    <tr>
      <th scope="col">Invoice No</th>
      <th scope="col">Product</th>
      <th scope="col">Description</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount due</th>
      
    </tr>
  </thead>
  <tbody>
   
            <?php 
  
        $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `completed` WHERE branch_id = '$branc' and status = 'completed' and DATE(NOW()) = DATE(datecompleted)  ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                                $totalearnings = 0;
                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                                 $totalearnings += $row['total'];
                              ?>
                            
                             <tr>
                                 <td><?php echo $row['invoice_no']?></td>
                                 <td><?php echo $row['name']?></td>
                                 <td><?php echo $row['description']?></td>
                                 <td>₱ <?php echo $row['price']?></td>
                                 <td><?php echo $row['quantity']?></td>
                                 <td>₱ <?php echo $row['total']?></td>
                             </tr>
                                   
                              <?php
                            
                            }
                           ?>
                          
                           <h5>TOTAL EARNINGS AS OF ( <?php echo date('M/d/Y')?> ) :<strong style="font-size:25px"> ₱ <?php echo  $totalearnings?></strong></h5>
                            <p>For Registered customer.</p>
                           <?php
                          }else {
                            ?>
                              
                             <tr>
                                 <td colspan="8">No completed Orders yet ..</td>
                             </tr>
                             <h5>TOTAL EARNINGS AS OF ( <?php echo date('M/d/Y')?> ) : None
                            <p>For Registered customer.</p>
                            <?php
                          }
                          //validityof
                          ?>

   
  </tbody>
</table>
     
</div>
<br><br>
                 </div>
                 <div class = "col-sm-6">
                       <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 500px; }
                  .tableFixHead thead th { position: sticky; top: 0; }
                </style>
                    <div class="tableFixHead">
        <table class="table table-hover">
  <thead class="thead-dark  table-primary ">
    <tr>
      <th scope="col">Invoice No</th>
      <th scope="col">Product</th>
      <th scope="col">Description</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount due</th>
      
    </tr>
  </thead>
  <tbody>
   
            <?php 
  
        $branc = $_SESSION["branchid"];

               $sql = " SELECT * FROM `completedtempuser` WHERE branch_id = '$branc' and status = 'completed' and DATE(NOW()) = DATE(datecompleted) ";
                           $result = mysqli_query($con,$sql); // run query
                           $count= mysqli_num_rows($result); // to count if necessary
                                $totalearnings = 0;
                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                           if($count>=1) {
                            while($row = mysqli_fetch_array($result)){
                                $image = $row['photo'];
                          $image_src = "bin/Item_Images/".$image;
                          $track = $row['track_id'];
                         $mes = md5("imissyoupa");
                                 $totalearnings += $row['total'];
                              ?>
                            
                             <tr>
                                 <td><?php echo $row['invoice_no']?></td>
                                 <td><?php echo $row['name']?></td>
                                 <td><?php echo $row['description']?></td>
                                 <td>₱ <?php echo $row['price']?></td>
                                 <td><?php echo $row['quantity']?></td>
                                 <td>₱ <?php echo $row['total']?></td>
                             </tr>
                                   
                              <?php
                            
                            }
                           ?><h5>TOTAL EARNINGS AS OF ( <?php echo date('M/d/Y')?> ) :<strong style="font-size:25px"> ₱ <?php echo  $totalearnings?></strong></h5>
                            <p>For Unregistered customer.</p>
                           <?php
                          }else {
                            ?>
                              
                             <tr>
                                 <td colspan="8">No completed Orders yet ..</td>
                             </tr>
                             <h5>TOTAL EARNINGS AS OF ( <?php echo date('M/d/Y')?> ) : None
                            <p>For Unregistered customer.</p>
                            <?php
                          }
                          //validityof
                          ?>

   
  </tbody>
</table>
     
</div>
                 </div>
                 
             </div>
             
         </div>
        </div>
        <div class="card-footer"></div>
      </div>
       


        <h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>
        <?php
        
      }
      else {

       
       ?>

             <script type="text/javascript">
          
         document.getElementById("all").setAttribute('style',' background-color: grey;pointer-events: none;');       
        </script>
         <script>
window.onload = function () {
      <?php 
  
        $branc = $_SESSION['branchid'];
   $countsql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending'   ";
                           $resultaa = mysqli_query($con,$countsql); // run query
                           $countpending= mysqli_num_rows($resultaa); // to count if necessary
  
    $sql = "  SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'reservation' ";
                            $result = mysqli_query($con,$sql); // run query
             
                            $countreserve= mysqli_num_rows($result); // to count if necessary

                             $sqls = "  SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and  `stat_checkout`='false' and transaction_type = 'Walk in' ";
                            $resultae = mysqli_query($con,$sqls); // run query
                            $countwalkin= mysqli_num_rows($resultae); // to count if necessary
                             $sqlcance = " SELECT * FROM `cancelled` WHERE branch_id = '$branc' and status = 'cancelled'   ";
                           $resultee = mysqli_query($con,$sqlcance); // run query
                           $countcance= mysqli_num_rows($resultee); // to count if necessary


               $sqlexp = " SELECT * FROM `expired` WHERE branch_id = '$branc' and status = 'expired'  ";
                           $resultss = mysqli_query($con,$sqlexp); // run query
                           $countexp= mysqli_num_rows($resultss); // to count if necessary

                            $sqlcomp = " SELECT * FROM `completed` WHERE branch_id = '$branc' and status = 'completed'  ";
                           $resultsss = mysqli_query($con,$sqlcomp); // run query
                           $countcomp= mysqli_num_rows($resultsss); // to count if necessary

      ?>

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "Sales RECORD",
    horizontalAlign: "left"
  },
  data: [{
    type: "doughnut",
    startAngle: 60,
    //innerRadius: 60,
    indexLabelFontSize: 17,
    indexLabel: "{label} - #percent%",
    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
    dataPoints: [
      { y: <?php echo $countpending?>, label: "Pending Orders" },
      { y: <?php echo $countcance?>, label: "Cancelled " },
      { y: <?php echo $countreserve?>, label: "Reservation" },
      { y: <?php echo $countwalkin?>, label: "Walk in"},
      { y: <?php echo $countexp?>, label: "Expired"},
      { y: <?php echo $countcomp?>, label: "Completed"}
    ]
  }]
});
chart.render();

}
</script>

  <div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

       <br><br>
        <div class="container">
    <div class="row">
          <div class="col-sm-6">
            
            <div class="card" style="width: 100%; ">
  <div class="card-header third" >
 <strong>Pending ORDERS</strong>
 <?php 
  $branc = $_SESSION['branchid'];
   $countsql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending'   ";
                           $resultaa = mysqli_query($con,$countsql); // run query
                           $count= mysqli_num_rows($resultaa); // to count if necessary
                           ?>
                           <h6>Showing <strong></strong> Order/s : <strong><?php echo $count?></strong><a href="sales.php?pending" style="color:white" class="btn btn-link">CLICK TO ACCEPT ORDERS</a> </h6>
                           <?php
  ?>

  </div>
   <div class="card-body">
        <style type="text/css">
                  .tableFixHead          { overflow-y: auto; height: 500px; }
                  .tableFixHead thead th { position: sticky; top: 0; }
                </style>
                    <div class="tableFixHead">
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Order Created</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
       <th scope="col">Price</th>
        <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    $branc = $_SESSION['branchid'];
      $sql = " SELECT * FROM `pending` WHERE branch_id = '$branc' and status = 'pending' limit 5   ";
                           $result = mysqli_query($con,$sql); // run query
                          $count= mysqli_num_rows($result); // to count if necessary
                 
                        if ($count >= 1) {

                          //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                          
                            while($row = mysqli_fetch_array($result)){ 
                              ?>
                              <tr>
                                <td><?php echo $row['dateandtime']?></td>
                                <td><?php echo $row['uname']?></td>
                                 <td><?php echo $row['name']?></td>
                                  <td><?php echo $row['quantity']?></td>
                                   <td><?php echo $row['price']?></td>
                                    <td><?php echo $row['total']?></td>
                              </tr>
                              <?php
                            }

                        } else {
                          ?>
                          <tr>
                            <td colspan="2">
                                <h5>No PENDING Orders yet.</h5>
                            </td>
                          </tr>
                          <?php
                        }
     ?>

  </tbody>
</table>
</div>
   </div> 
   <!--end of card-body-->
    <div class="card-footer third">
      
    </div> 
    <!--end of card-footer-->
</div>
<br><br>

          </div>

           <!--end of -->
          <div class="col-sm-6">
              <div class="card" style="width: 100%; ">
  <div class="card-header secon" >
  <STRONG>Accepted ORDERS , Validity & Transcations</STRONG>
  </div>
   <div class="card-body">
   <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <strong>WALKIN ORDERS</strong>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Walkin Orders are orders that have been process through online by the customer with their own account registered to this system .
        Their Orders once accepted will be valid only for 24 hours. if this validity past order will no longer be valid.
        <br>
            <?php 
                $sql = "  SELECT * FROM `walkin` WHERE branch_id = '$branc' and status = 'approved' and  `stat_checkout`='false' and transaction_type = 'Walk in' ";
                            $result = mysqli_query($con,$sql); // run query
                            $count= mysqli_num_rows($result); // to count if necessary
                       
                          ?>
                          <h5>Walkin Order/s at this moment : <strong style="color: red"><?php echo $count?></strong><br> <a href="sales.php?orders&walkin">CLICK HERE TO PROCEED</a>. </h5>
                          <?php
            
        
            ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         <strong>RESERVE ORDERS</strong>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Reserve Orders are orders that have been process through online by the customer with their own account registered to this system .
        this type of transaction is made for customers who cant transact for 24 hours , they are given privilege to make reservation up to the 
        date given or created by them.
        <br>
            <?php 
                $sql = "  SELECT * FROM `reserve` WHERE branch_id = '$branc' and status = 'approved' and transaction_type = 'reservation' ";
                            $result = mysqli_query($con,$sql); // run query
                            $count= mysqli_num_rows($result); // to count if necessary
                       
                          ?>
                          <h5>RESERVE Order/s at this moment : <strong style="color: red"><?php echo $count?></strong><br> <a href="sales.php?orders&reserve">CLICK HERE TO PROCEED</a>. </h5>
                          <?php
            
        
            ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <strong>COMPLETED</strong>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
       A fully Accomplished Transcation.
       <h5><a href="sales.php?completed">CLICK HERE TO PROCEED</a></h5>
      </div>
    </div>
  </div>
</div>
   </div> 
   <!--end of card-body-->
    <div class="card-footer secon">
      
    </div> 

    <!--end of card-footer-->
</div>
<br><br>
  
          </div>
    </div>
  </div>

<h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>

        <?php
       
       ////////////////////////////////////////////////////////////////////End of ALL////////////////////////////////////////////
      }
  
      ?>
  
  
   <!--end of Main-->
</div>
   <!--end of Main-->

 
 
 
  </body>
</html>
<?php 



?>