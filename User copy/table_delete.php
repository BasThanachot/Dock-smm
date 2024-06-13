<?php

if(isset($_GET['id']) && $_GET['act']=='delete'){
    $id = $_GET['id'];
    //echo $id;

$stmtDelTable = $condb->prepare('DELETE FROM tbl_table WHERE id=:id');
$stmtDelTable->bindParam(':id', $id , PDO::PARAM_INT);
$stmtDelTable->execute();
$condb = null; //close connect db
//echo 'จำนวน row ที่ลบได้ '.$stmtDelMember->rowCount() ==1 ;
if($stmtDelTable->rowCount() ==1){
    echo '<script>
         setTimeout(function() {
          swal({
              title: "ลบข้อมูลสำเร็จ",
              type: "success"
          }, function() {
              window.location = "datatable.php"; //หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
    exit();
}else{
   echo '<script>
         setTimeout(function() {
          swal({
              title: "เกิดข้อผิดพลาด",
              type: "error"
          }, function() {
              window.location = "datatable.php"; //หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
}
} //isset


?>