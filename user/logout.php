<?php 
if(isset($_POST['user_logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']); 
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['image']);
    header('Location:user_login.php');
    mysql_close($conn);
}

?>