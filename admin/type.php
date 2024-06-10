<?php
session_start();
if( $_SESSION["title_name"] != "Admin"){ 
    header("location: /Dock-smm/login.php");
}

    include 'header.php';
    include 'navbar.php';
    include 'sidebar_menu.php';

    //สร้างเงื่อนในการเรียกใช้ไฟลล์
    $act = (isset($_GET['act']) ? $_GET['act'] : '' );

    if($act =='add'){
        include 'type_add.php';

    }else if($act =='delete') {
        include 'type_delete.php';

    }else if($act =='edit') {
        include 'type_edit.php';

    }else{
        include 'type_list.php';
    }
  
    include 'footer.php';

?>


