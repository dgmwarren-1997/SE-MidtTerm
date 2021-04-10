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
        <a class="nav-link"   href="sales.php"><i class="fa fa-usd" aria-hidden="true" style="font-size: 25px"></i> Sales</a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-external-link-square" aria-hidden="true" style="font-size: 25px"></i>  Others
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" id="active" href="aboutus.php"><i class="fa fa-info-circle" aria-hidden="true" ></i> About Us</a>
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

<br><br>
 

 
  <!--content here-->
  <div class="container">


<style type="text/css">
  @-webkit-keyframes zoom {
    
     40%   {transform: scale(0.7);}
      60%   {transform: scale(0.8);}
        80%   {transform: scale(0.9);}
    100% {transform: scale(1); }
}

.image {
    -webkit-animation: zoom 1s 1;
}
</style>

<div class="container">
<div class="back" style="text-align: center">
  <img src="png/logo222.gif" alt="Avatar" class="image" width="300">
</div>
</div>
    

     <div class="card">
       
        <div class="card-header">
             <h5 style="text-align: center;"><strong>HANTECH</strong></h5>
        </div>
        <div class="card-body">

          <h6>  -The company is consist of individual role that working together to create the desired system of the client. Our team works on a flexible time with 24/7 availability as long as the member finish the assigned task designated to the individual on time. Project planning usually done on facebook messenger group chat for sharing ideas on how to execute the process of planning. The archivist weekly reminds the members for the progress of the deliverables.</h6>
          <br><br><br>
              <p>
                  
                  
      
<strong>Warren DeGuzman</strong> <br>Project Manager <br><br>- is responsible for company meeting and 
Project Manager   company budget. He/she is also responsible for overall project output and project cost
  <br><br>

<strong>Ryan Camonias</strong>  <br>Analyst/assistant Project manager <br><br> - is responsible for company project planning, 
Analyst/assistant Project manager project’s deliverable and client’s needs during company/client meeting
<br><br>

<strong>Nadeer Mukaram</strong> <br>Designer <br><br> - provides design of what the client’s 
Designer      expectation 
<br><br>
<strong>Kerzen Lanojan</strong><br>System Tester<br><br>   -provides ideas or suggestion to ensure client’s 
 Tester   satisfaction
   
<br><br>

<strong>Reenjay Caimor</strong> <br>Developer<br><br>  -provides deliverable of the software project.
Developer Responsible for software estimated cost and estimates timeline duration to finish the project.

    </p>

        </div>
        <div class="card-footer"></div>
     </div>
     <br><br><br>
  

    <h4><strong>PROHIBITED AND RESTRICTED ITEMS POLICY</strong></h4>

It is Seller’s responsibility to ensure that their proposed item complies with all laws and is allowed to be listed for sale in accordance with HanTech’s terms and policies before listing the item on the selling platform. For the Sellers’ convenience, HanTech has provided below a non-exhaustive guideline on prohibited and restricted items that are not allowed for sale on HanTech.  HanTech will update this guideline from time to time where necessary. Please visit this page regularly for updates.
<ul>
  <li>
  <strong>     VIOLATION OF OUR TERMS OF SERVICE</strong> 

Violations of this Prohibited and Restricted Items Policy may subject the Seller to a range of adverse actions, including but not limited to any or all of the following:

-            Listing deletion

-            Account suspension and termination
  </li>
  <li>
    <strong>    LIST OF PROHIBITED AND RESTRICTED ITEMS</strong>
<br><br>

<strong>(i)</strong>        Animal and wildlife products (including, without limitation, wild animals);
<br><br>
<strong>(ii) </strong>        Artifacts and antiquities;
<br><br>
<strong>(iii)</strong>       Drugs, prescription-only medicines, pharmacy-only medicines, drug-like substances and associated paraphernalia. For a list of prohibited medicines, please click here;
<br><br>
<strong>(iv) </strong>     Telecommunication equipment that has not been registered with the National Telecommunications Commission of the Philippines, and electronic surveillance equipment and other similar electronic equipment such as cable TV, de-scramblers, radar scanners, traffic signal control devices, wiretapping devices and telephone bugging devices;
<br><br>
<strong>(v) </strong>       Embargoed goods;
<br><br>
<strong>(vi) </strong>        Firearms, weapons such as pepper spray, replicas, and stun guns, etc.;
<br><br>
<strong>(viii) </strong>       Alcohol (a valid license must be submitted to, and approved by, HanTech);
  </li>
  <li>
    
<strong>Food not falling into the Prohibited Food category above must adhere to these minimum standards and guidelines:</strong>
<br><br>
<strong>(a) </strong>              Expiration dates – all food items must be clearly and properly labelled with an expiration or “use by” date. Expired food items must not be listed;
<br><br>
<strong>(b)    </strong>           Sealed containers – all food and related products sold on the Site should be packaged or sealed to ensure that Buyer can identify evidence of tampering or defect; and
<br><br>
<strong>(c) </strong>               Perishable food items – Sellers who list perishable items should clearly identify in the item description the steps that they will take to ensure that the goods are properly packaged;
<br><br>
<strong>(ix)</strong>      Government or Police related items such as badges, insignia or uniforms;
<br><br>
<strong>(x) </strong>    Human parts or remains;
<br><br>
<strong>(xi)</strong>      Lock-picking devices;
<br><br>
<strong>(xii)</strong>    Pesticides;
<br><br>
       <strong>   (xiii) </strong>   Mislabeled goods; and

  </li>
</ul>





If you see a listing that violates our policies, please report it to us by clicking the “Report this Product” or “Report this User” button from the dropdown menu in the product or the user page. When a policy violation occurs, we will send an email, system message and push notification to Seller to let them know that the listing has been removed from our Website. We will also send a push notification to Buyer of said listing. You are responsible for ensuring that your phone settings allow you to receive push notifications.
<br><br><br>



  <strong style="font-size: 25px;text-align: center">Terms of Service</strong>
<br><br><br>
<strong style="font-size: 20px">1.  INTRODUCTION</strong>
<p style="font-size: 15px;font-family: comic sans ms">
1.1 Welcome to the HanTech website. Please read the following Terms of Service carefully before using this Site or opening a HanTech account so that you are aware of services. The "Services" we provide or make available include (a) the Site, (b) the services provided by the Site available through the Web, and (c) all information, linked pages, features, data, text, images, photographs, graphics, messages, tags, content, programming, software, application services (including, without limitation, any mobile application services) or other materials made available through the Site or its related services ("Content"). Any new features added to or augmenting the Services are also subject to these Terms of Service. These Terms of Service controls your use of Services 
Provided by HanTech.
<br><br><br>
1.2 The Services include an online platform service that provides a place and opportunity for the sale of products between the buyer (“Buyer”) and the seller (“Seller”) (collectively “you”, “Users” or “Parties”). The actual contract for sale is directly between Buyer and Seller and we (HanTech) are not part of the contract between Buyer and Seller and accepts no obligations in connection with any such contract. Parties to such transaction will be entirely responsible for the sales contract between them, the listing of products.
<br><br><br>
1.3 Before becoming a User of the Site, you must read and accept all of the terms and conditions in these policy. These Terms of Service and you must consent to the processing of your personal data as described in the Privacy Policy linked hereto.
<br><br><br>
2     Privacy
<br><br><br>
2.1 By using the Services, registering for an account with us, visiting our Website, or accessing the Services, you acknowledge and agree that you accept the practices, requirements, and/or policies outlined in this Privacy Policy, and you hereby consent to us collecting, using, disclosing and/or processing your personal data as described herein. IF YOU DO NOT CONSENT TO THE PROCESSING OF YOUR PERSONAL DATA AS DESCRIBED IN THIS PRIVACY POLICY, PLEASE DO NOT USE OUR SERVICES OR ACCESS OUR WEBSITE. If we change our Privacy Policy, we will post those changes or the amended Privacy Policy on our Website. We reserve the right to amend this Privacy Policy at any time.
<br><br><br>
2.2  This Policy applies to both buyers and sellers who use the Services except where expressly stated otherwise.
 WHEN WILL HANTECH COLLECT PERSONAL DATA?
 <br><br><br>
2.3 We will/may collect personal data about you:
• when you register and/or use our Services or Platform, or open an account with us;
<br><br>
• when you submit any form, including, but not limited to, application forms or other forms relating to any of our products and services, whether online or by way of a physical form;
<br><br>
• when you enter into any agreement or provide other documentation or information in respect of your interactions with us, or when you use our products and services;
<br><br>
• when you interact with us, such as via telephone calls (which may be recorded), letters, emails, including when you interact with our customer service agents;
<br><br>
• when you grant permissions on your device to share information with our application or Platform;
<br><br>
• when you carry out transactions through our Services;
<br><br>
• when you provide us with feedback or complaints;
<br><br>
• when you submit your personal data to us for any reason
<br><br>
The above does not appear to be accessible and sets out some common instances of when personal data about you may be collected.
<br><br>
WHAT PERSONAL DATA WILL HANTECH COLLECT?
<br><br>
2.4 The personal data that HanTech may collect includes but is not limited to:
<br><br>
• name;
<br><br>
• email address;
<br><br>
• date of birth;
<br><br>
• billing address;
<br><br>
• bank account and payment information;
<br><br>
• telephone number;
<br><br>
• gender;
<br><br>
• photographs or audio or video recordings that you share with us;
<br><br>
• government issued identification or other information required for our due diligence, know your customer, identity verification, or fraud prevention purposes
<br><br>
(i) 2.1        Your privacy is very important to us at HanTech. To better protect your rights we have provided the HanTechDeisgn.com Privacy Policy to explain our privacy practices in detail. Please review the Privacy Policy to understand how HanTech collects and uses the data or information associated with your Account and/or your use of the Services (the “User Information”).
<br><br> By using the Services or providing information on the Site, you:
<br><br>
 
(i)  consent to HanTech collection, use, disclosure and/or processing of your Content, personal data and User Information as described in the Privacy Policy;
 
 <br><br>
(ii)         agree and acknowledge that the proprietary rights of your User Data are mutually owned by you and HanTech; and
 <br><br>
(iii)        shall not, whether directly or indirectly, disclose your User Data to any third party, or otherwise allow any third party to access or use your User Information, without HanTech prior written consent..
<br><br>
 
2.5        Users in possession of another User’s personal data through the use of the Services (the “Receiving Party”) hereby agree that, they will (i) comply with all applicable personal data protection laws with respect to any such data; 
<br><br>(ii) allow the User whose personal data the Receiving Party has collected (the “Disclosing Party”) to remove his or her data so collected from the Receiving Party’s database; and 
<br><br>(iii) allow the Disclosing Party to review what information have been collected about them by the Receiving Party, in each case of (ii) and (iii) above, in compliance with and where required by applicable laws.
<br><br>

      3.1  ACCOUNTS AND SECURITY
      <br><br>
 
3.1        Some functions of our Services require registration for an Account by selecting a unique user identification ("User ID") and password, and by providing certain personal information. 
<br><br>
 
3.2        You agree to (a) keep your password confidential and use only your User ID and password when logging in, (b) ensure that you log out from your account at the end of each session on the Site, (c)) ensure that your Account data is accurate and up-to-date. You are fully responsible for all activities that occur under your User ID and Account even if such activities or uses were not committed by you. HanTech will not be liable for any loss or damage arising from unauthorized use of your password or your failure to comply with this Section.
 <br><br>
 
3.3        Users may terminate their Account if they notify HanTechDesign in writing (including via email at ask@support.hantechdesign.com) of their desire to do so. You understand and agree that your account will, at the earliest, be terminated twenty-four (48) hours after the request for termination. Notwithstanding any such termination, Users remain responsible and liable for any incomplete transaction (whether commenced prior to or after such termination), , payment for the product, or the like, and Users must contact HanTech after he or she has promptly and effectively carried out and completed all incomplete transactions according to the Terms of Service. HanTech shall have no liability, and shall not be liable for any damages incurred due to the actions taken in accordance with this Section. Users waive any and all claims based on any such action taken by HanTech
<br><br>
4          TERM OF USE
 
4.1        The license for use of this Site and the Services is effective until terminated. This license will terminate as set forth under these Terms of Service or if you fail to comply with any term or condition of these Terms of Service. In any such event, HanTech may effect such termination with or without notice to you.
 <br><br>
4.2        You agree not to:
 
 <br><br>
(a)        violate any laws, including without limitation any laws and regulation in relation to export and import restrictions, third party rights or our Prohibited and Restricted Items policy;
  <br><br>
(b)          manipulate the price of any item or interfere with other User's listings;
 <br><br>
(c)       take any action that may undermine the feedback or ratings systems;
 <br><br>
(d)        harvest or collect any information about or regarding other Account holders, including, without limitation, any personal data or information;
 
 <br><br>
(e)         upload, email, post, transmit or otherwise make available any material that contains software viruses, worms, Trojan-horses or any other computer code, routines, files or programs designed to directly or indirectly interfere with, manipulate, interrupt, destroy or limit the functionality or integrity of any computer software or hardware or data or telecommunications equipment; 
 <br><br>
(f)         take any action or engage in any conduct that could directly or indirectly damage, disable, overburden, or impair the Services or the servers or networks connected to the Services;
 <br><br>
(g)         use the Services to violate the privacy of others or to "stalk" or otherwise harass another;
  <br><br>
(h)     use the Services to collect or store personal data about other Users in connection with the prohibited conduct and activities set forth above; and/or
 <br><br>
4.3        You understand that all Content, whether publicly posted or privately transmitted, is the sole responsibility of the person from whom such Content originated. This means that you, and not HanTech, are entirely responsible for all Content that you upload, post, email, transmit or otherwise make available through the Site. You understand that by using the Site, you may be exposed to Content that you may consider to be offensive, indecent or objectionable. To the maximum extent permitted by applicable law, under no circumstances will HanTech be liable in any way for any Content, including, but not limited to, any errors or omissions in any Content, or any loss or damage of any kind incurred as a result of the use of, or reliance on, any Content posted, emailed, transmitted or otherwise made available on the Site.
 <br><br>
4.4        You acknowledge that HanTech and its designees shall have the right (but not the obligation) in their sole discretion to pre-screen, refuse, delete, stop, suspend, remove or move any Content, including without limitation any Content or information posted by you, that is available on the Site without any liability to you. Without limiting the foregoing, HanTech and its designees shall have the right to remove any Content (i) that violates these Terms of Service or our Prohibited and Restricted Items Policy; (ii) if we receive a complaint from another User; (iii) if we receive a notice or allegation of intellectual property infringement or other legal instruction or request for removal; or (iv) if such Content is otherwise objectionable. We may also block delivery of a communication (including, without limitation, status updates, postings, messages and/or chats) to or from the Services as part of our effort to protect the Services or our Users, or otherwise enforce the provisions of these Terms and Conditions. You agree that you must evaluate, and bear all risks associated with, the use of any Content, including, without limitation, any reliance on the accuracy, completeness, or usefulness of such Content. In this regard, you acknowledge that you have not and, to the maximum extent permitted by applicable law, may not rely on any Content created by HanTech or submitted to HanTech, including, without limitation, information in HanTech Forums and in all other parts of the Site.
 <br><br>
5          VIOLATION OF OUR TERMS OF SERVICE
 <br><br>
5.1        Violations of this policy may result in a range of actions, including, without limitation, any or all of the following:
 <br><br>
-            Listing deletion
 <br><br>
-            Account suspension and subsequent termination
 <br><br>
5.2        If you believe a User on our Site is violating these Terms of Service, please contact ask@support.hantechdesign.com.
 <br><br>
6          PURCHASE AND PAYMENT
 <br><br>
6.1        HanTech supports one or more of the following payment methods in each country it operates in:
 <br><br>
(i)          Credit Card
Card payments are processed through third-party payment channels and the type of credit cards accepted by these payment channels may vary depending on the jurisdiction you are in.
 <br><br>

(ii)         Cash on Pick-up (COD)
Buyers may pay cash directly to the cashier upon picking their receipt of the reserve item.
 
 <br><br>
6.2        Buyer may only change their preferred mode of payment for their purchase prior to making payment.
 <br><br>
6.3       HanTech takes no responsibility and assume no liability for any loss or damages to Buyer arising from 
<br>payment information entered by Buyer or wrong remittance by Buyer in connection with the payment for the items purchased. We reserve the right to check whether Buyer is duly authorized to use certain payment method, and may suspend the transaction until such authorization is confirmed or cancel the relevant transaction where such confirmation is not available.
 
</p>



 



  </div>
  <!--end of content-->
 <h6 style="font-family: courier new;float:right;margin-top: 20px;margin-right: 30px;">All rights Reserved &middot; 2021</h6>
  </body>
</html>