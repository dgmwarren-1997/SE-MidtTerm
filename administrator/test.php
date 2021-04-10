<?php

 $awardspaceEmail = "noreply@hantechdesign.com";
                                                                              
                                                                                
                                                                                $from = "From: HantechDesign <" . $awardspaceEmail . ">";
                                                                                $to = "reenjie17@gmail.com";
                                                                                
                                                                                $subject = "Notice of Approval";
                                                                                $headers = "MIME-Version: 1.0" . "\r\n";
                                                                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                                                                $body = "
                                                                                
                                                                                 
 <!doctype html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>

<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>

<title>Welcome to HanTech</title>
</head>
 
  
<body style='	width: 100%;
	height: 100vh;
	background-image: linear-gradient(to top, white , #7BA9D1, #7BA9D1);'>

<div style='	text-align:center;
	margin:3rem;'>



<h3 style='	font-family:Impact;
	font-size:3rem;'>Your Orders has been approved..</h3>
        
        <h4>Thank You for Ordering. We cant wait to serve you <br>please observe quarantine protocols, wear mask and face shield upon entering our shop to avoid problems <br> Click the link to see your orders.</h4> 
            <a href='https://hantechdesign.com/orders/'>https://hantechdesign.com/orders/</a>


<p style='	font-family:arial;
	margin:1rem;
	font-size:1.2rem;'>
	
Please do a transaction before the given time . <br> For Walkin Orders - <br> You have 24 Hours to do a transaction .<br> For Reservation - <br> You must do the transaction earlier or before your given date to transact to us. <br> We are happy to serve you.. Thanks for making Orders..Keepsafe .
</p>

<h5 style='	margin-top:5rem;
	font-family:verdana;'>The Hantech Team</h5>
© 2021 Hantech, All Rights Reserved
</div>

</body>

</html>



                                                                                
                                                                                ";
                                                                                
                                                                                if(mail($to,$subject,$body,$from, $headers)){
                                                                                    
                                                                                } else {
                                                                                  
                                                                                }
                                                                                

?>