<?php
    include 'header.php';
    include 'navbar.php';
    include 'sidebar_menu.php';
    
    //สร้างเงื่อนในการเรียกใช้ไฟลล์
    $act = (isset($_GET['act']) ? $_GET['act'] : '' );

    if($act == 'add'){
        include 'table_add.php';

    }else if($act =='delete') {
        include 'table_delete.php';    
    
    }else if($act =='edit') {
        include 'table_edit.php';

    }else if($act =='view') {
        include 'table_view.php';

    }else{
        include 'table_list.php';
    }


    // list หรือ view วะ ตอนนี้
         
    include 'footer.php';

?>


