<?php

session_start();
if( $_SESSION["title_name"] != "Admin"){ 
       header("location: /Dock-smm/login.php");
}

    include 'header.php';
    include 'navbar.php';
    include 'sidebar_menu.php';
    include 'main_content.php';
    include 'footer.php';

?>



