<?php
session_start();
include('dbconnection.php');

if(!$_SESSION['username']){
header('Location:user_login.php');

}



?>