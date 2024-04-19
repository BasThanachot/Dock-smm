<?php
    include 'header.php';
    include 'navbar.php';
    include 'sidebar_menu.php';

    //สร้างเงื่อนไในการเรียกใช้ไฟลล์
    $act = (isset($_GET['act']) ? $_GET['act'] : '' );

    if($act =='add'){
        include 'member_form_add.php';

    }else if($act =='delete') {
        include 'member_delete.php';

    }else{
        include 'member_list.php';
    }
  
    include 'footer.php';

?>


