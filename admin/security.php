<?php
session_start();
include('dbconnection.php');

if(!$_SESSION['username']){
header('Location:admin_login.php');

}



?>