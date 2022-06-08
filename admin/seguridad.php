<?php 
 session_start();
//  $_SESSION['IdAdmin'] = $IdAdmin; //session		                     
if (isset($_SESSION['IdAdmin'])) {
  $IdAdmin = $_SESSION['IdAdmin'];
} else {
  $IdAdmin = "";
  header('Location: login.php');
}

 
?>