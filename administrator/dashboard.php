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
    <title>Admin-Hantech</title>
     <?php 
    
        include "myStyle.php";
       include "connection/connect.php";
        ?>
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
        <a class="nav-link" id="active" href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true" style="font-size: 25px"></i> Dashboard</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="product.php"><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 25px"></i> Product</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="sales.php"><i class="fa fa-usd" aria-hidden="true" style="font-size: 25px"></i> Sales</a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-external-link-square" aria-hidden="true" style="font-size: 25px"></i>  
        Others
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true" ></i> About Us</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out </a>
         
<!-- Button trigger modal -->

       
        </div>

         <li class="nav-item " style="cursor: default;">
             <h5 style="color:black;font-weight:bolder;margin-top: 10px ;font-family: ravie" >Hi <i class="fas fa-exclamation"></i> <span style="color: white;  font-weight: bold;font-family: tw cent mt;font-size: 20px;background-image: linear-gradient(to bottom, rgba(255,0,0,0), rgba(43, 43, 43));border-radius: 10px; padding: 5px;  "> <?php echo $_SESSION["name"]?></span> <i class="fas fa-smile" style="color:white;"></i></h5>
          
      </li>  
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
<br>  <h1 style="text-align: center">DASHBOARD</h1>
<br><br>


 
  <!--content here-->
  <div class="container">
     
 
<div class="row">
  <div class="col-sm-6">
     
<script>
window.onload = function () {

 <?php 
        $selectproduct = "select * from product";
         $resulta = mysqli_query($con,$selectproduct); // run query
         $countproduct= mysqli_num_rows($resulta); // to count if necessary
       
       
        $selectrecord = "select * from trans_record";
         $resultae = mysqli_query($con,$selectrecord); // run query
         $counttrans= mysqli_num_rows($resultae); // to count if necessary
         
        
        
        $selectuser = "select * from user_account";
         $resultaee = mysqli_query($con,$selectuser); // run query
         $countuser= mysqli_num_rows($resultaee); // to count if necessary
        ?>
        
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Unit , Orders and Users Records"
	},
	axisY: {
		title: "R E C O R D S"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "HANTECH",
		dataPoints: [      
			{ y: <?php echo $countproduct?>, label: "Unit Records" },
			{ y: <?php echo $counttrans?>,  label: "Orders" },
			{ y: <?php echo $countuser?>,  label: "Users" },
		
		]
	}]
});
chart.render();

}
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>

<br>
  </div>
  <div class="col-sm-6">
    
    
   <div class="card">
     <div class="card-header secon">
     Everything You need.
     </div>
     <div class="card-body">
   <div class="row">
     <div class="col">
        Manage Products , Update Stocks , Name ,Description etc.<a href="product.php">HERE<i class="fas fa-arrow-left"></i></a>
        <br><br>
        Want to know About us ? <br>
        click <a href="aboutus.php">HERE<i class="fas fa-arrow-left"></i></a>
     </div>
      <div class="col" >
         Manage PENDING Orders <a href="sales.php?pending" >HERE <i class="fas fa-arrow-left"></i></a><br><br>
          Manage WALKIN Orders <a href="sales.php?orders&walkin" >HERE  <i class="fas fa-arrow-left"></i></a><br><br>
          Manage RESERVED Orders <a href="sales.php?orders&reserve" >HERE<i class="fas fa-arrow-left"></i></a>
      </div>
   </div>
     </div>
     <div class="card-footer secon"></div>
   </div>   

  </div>
</div>
<br><br>
<div class="row">
  <div class="col-sm-6">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php 
              $sql = " select * from invoice_record  ";
                $result = mysqli_query($con,$sql); // run query
              
               //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                 while($row = mysqli_fetch_array($result)){
                   ?> ['<?php echo $row['dateprocess']?>', <?php echo $row['total']?>],   <?php         
                 }
          
          ?>
         
         
        ]);

        var options = {
          title: 'Hantech Performance',
          hAxis: {title: 'Daily Sales',  titleTextStyle: {color: 'blue'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
      <div id="chart_div" style="width: 100%; height: 500px;"></div>

  </div>
  <div class="col-sm-6">
      <h5>Description</h5><br>
      <p> -Han Tech is a company consist of elite of WMSU ICS department that share innovative goals and ideas that the buyer needs. Our company provides assistant and ideas on how to manage the specific needs of the system to develop.</p><br>
       <h5>Mission</h5><br>
       <p>- To provide a convenient system to satisfy the buyer with the help customer needs and company’s ideas</p><br>
       <h5>Vission</h5><br>
       <p>- To be one country’s customer-centric company where both company’s employees and customer will be satisfied of the result.</p>
  </div>
</div>
<div class="container" style="height: 200px;">
  <br><br><br>
  <h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>

</div>
  </div>
  <!--end of content-->
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  </body>
</html>