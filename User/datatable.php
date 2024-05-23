<?php

session_start();

if( $_SESSION["title_name"] != "Users"){ 
    header("location: /Dock-smm/login.php");
}
// if (!isset($_SESSION['username'])) {
//     header("location: /Dock-smm/login.php");
// }

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

    }else if($act =='s1') {
        include 'table_s1.php';

    }else if($act =='s2') {
        include 'table_s2.php';

    }else if($act =='s3') {
        include 'table_s3.php';
        
    }else if($act =='s4') {
        include 'table_s4.php';
        
    }else if($act =='s5') {
        include 'table_s5.php';
        

    }else{
        include 'table_list.php';
    }


    // list หรือ view วะ ตอนนี้
         
    include 'footer.php';

?>


