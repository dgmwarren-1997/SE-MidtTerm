<?php
session_start();
if(!isset($_SESSION["admin_id"])){
header("location:index.php");
}


if(isset($_GET['btnview'])){ 
    
    include 'connection/connect.php';
   $invoice = $_GET['invoice'];
        $txtamount = $_GET['txtamount'];
        $txtchange = $_GET['txtchange'];
        $totalcost = $_GET['totalcost'];
        $tempuserid = $_GET['userid'];
        $admin = $_SESSION["name"];
        $branchid=  $_SESSION["branchid"] ;

                $selectbranch = "select * from branches where branch_id = '$branchid'";
                 $result = mysqli_query($con,$selectbranch); // run query
                       while($row = mysqli_fetch_array($result)){
                                $branchname = $row['bname'];
                                 $branchlocation = $row['location'];
                                  }

                       


?>
   		 <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=600');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>




<div id="divToPrint" style="display:none;">
<!--print content--->

 <div style="width:100%;height:100%;background-color:white;">
 	 <div class="" style="float: right">
 	 	<h2>SALES RECEIPT</h2>
 	 	 <h5>Invoice # <?php echo $invoice?>
 	 	 	<br>
 	 	 	<?php echo  date("m/d/Y")?>
 	 	 </h5>

 	 </div> 

 	 <!--end of -->
 	 <div class="" >
 	 	
 
    	<h4 >HANTECH CORP</h4> 
    	<h5>Branch : <?php echo $branchname?>
    		<br>Address : <?php echo $branchlocation?> <br>
    		Admin-in-process: <?php echo $admin?>
    	</h5>
    	 </div> 
 	 <!--end of -->
 	
 	  	<h5>Sold TO :
 	  		<br>
 	  	    Transaction No :<?php echo $tempuserid?>
 	  		<br>
 	  	<br> 
 	  	</h5>
 	 <style>
table { 
	width:100%; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: rgb(52, 152, 219); 
	color: black; 
	font-weight: bold; 
	}

td, th { 
	padding: 7px; 
	border: 1px solid #ccc; 
	text-align: center; 
	font-size: 13px;
	}
</style>
    	<table >
    		<tr >
    			<th>Product</th>
    			<th>description</th>
    			<th>UnitPrice</th>
    			<th>Quantity</th>
    			<th>Total Payable</th>
    		</tr>
    		<tbody>
                        <?php 
                
                                $sql = "select * from receiptnouser where tempuserid = '$tempuserid' and invoice_no = '$invoice' and transaction_type = 'checkout' and stat_checkout='completed' and status = 'completed' ";
                                        $result = mysqli_query($con,$sql); // run query
                                     
                                   
                                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                         while($row = mysqli_fetch_array($result)){
                        
                                            ?>

                            <tr >
                    <td><?php echo $row['name']?></td>
                   <td><?php echo $row['description']?></td>
                   <td> ₱ <?php echo $row['price']?></td>
                   <td><?php echo $row['quantity']?></td>
                   <td>₱ <?php echo $row['total']?></td>
                        </tr>
            
                                            <?php

                                         }
                                  
                
                        ?>

    		




            </tbody>
    	</table>	


    		 <div class="" style="float: right;">
    		 	<h5>VAT : 0 %
    		 		<br>
    		 		TOTAL COST :₱ <?php echo $totalcost?>
    		 		<br>
    		 		AMOUNT RENDERED :₱ <?php echo $txtamount?>
    		 		<br>
    		 		CHANGE :₱ <?php echo $txtchange?>
    		 	</h5>
    		 </div> 
    		 <!--end of -->


  </div>
</div>

  <div style="width:100%;height:100%;background-color:white;">
     <div class="" style="float: right">
        <h2>SALES RECEIPT</h2>
         <h5>Invoice # <?php echo $invoice?>
            <br>
            <?php echo  date("m/d/Y")?>
         </h5>

     </div> 

     <!--end of -->
     <div class="" >
        
 
        <h4 >HANTECH CORP</h4> 
        <h5>Branch : <?php echo $branchname?>
            <br>Address : <?php echo $branchlocation?> <br>
            Admin-in-process: <?php echo $admin?>
        </h5>
         </div> 
     <!--end of -->
    
       <h5>Sold TO :
 	  		<br>
 	  	    Transaction No :<?php echo $tempuserid?>
 	  		<br>
 	  	<br> 
 	  	</h5>
     <style>
table { 
    width:100%; 
    border-collapse: collapse; 
    margin:50px auto;
    }

/* Zebra striping */
tr:nth-of-type(odd) { 
    background: #eee; 
    }

th { 
    background: rgb(52, 152, 219); 
    color: black; 
    font-weight: bold; 
    }

td, th { 
    padding: 7px; 
    border: 1px solid #ccc; 
    text-align: center; 
    font-size: 13px;
    }
</style>
        <table >
            <tr >
                <th>Product</th>
                <th>description</th>
                <th>UnitPrice</th>
                <th>Quantity</th>
                <th>Total Payable</th>
            </tr>
            <tbody>
                        <?php 
                
                                $sql = " select * from receiptnouser where tempuserid = '$tempuserid' and invoice_no = '$invoice' and transaction_type = 'checkout' and stat_checkout='completed' and status = 'completed'  ";
                                        $result = mysqli_query($con,$sql); // run query
                                     
                                   
                                         //while($row = mysqli_fetch_array($result)){} is where we output all the data in database
                                         while($row = mysqli_fetch_array($result)){
                        
                                            ?>

                            <tr >
                    <td><?php echo $row['name']?></td>
                   <td><?php echo $row['description']?></td>
                   <td> ₱ <?php echo $row['price']?></td>
                   <td><?php echo $row['quantity']?></td>
                   <td>₱ <?php echo $row['total']?></td>
                        </tr>
            
                                            <?php

                                         }
                                  
                
                        ?>

            




            </tbody>
        </table>    


             <div class="" style="float: right;">
                <h5>VAT : 0 %
                    <br>
                    TOTAL COST :₱ <?php echo $totalcost?>
                    <br>
                    AMOUNT RENDERED :₱ <?php echo $txtamount?>
                    <br>
                    CHANGE :₱ <?php echo $txtchange?>
                </h5>
             </div> 
             <!--end of -->


  </div>
  <div>
 
  <button type="button" value="print" onclick="PrintDiv();" style="position: fixed;top:650px;font-size: 15px;left: 30px; border-radius: 5px;">
  <strong>PRINT RECEIPT <i class="fas fa-print"></i></strong>
  </button>
</div>
 <script src="https://kit.fontawesome.com/129b086bc9.js" crossorigin="anonymous"></script>

		<?php //endfile
        }
?>