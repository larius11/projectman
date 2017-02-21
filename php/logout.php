<?php
	session_start();
	if(!isset($_SESSION['username'])){
       header("Location:../php/login.php");
    }else{
    	session_destroy();
    }
?>