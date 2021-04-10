<?php

session_start();

	unset($_SESSION["admin_id"]);
	unset($_SESSION["name"]);
      unset($_SESSION["branchid"]);
      unset($_SESSION["emails"]);
                  
        header("location:index.php");
    

?>