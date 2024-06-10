<?php

if(isset($_GET['t_id']) && $_GET['act']=='delete'){
    $t_id = $_GET['t_id'];
    //echo $id;

$stmtDelType = $condb->prepare('DELETE FROM tbl_devices_type WHERE t_id=:t_id');
$stmtDelType->bindParam(':t_id', $t_id , PDO::PARAM_INT);
$stmtDelType->execute();
$condb = null; //close connect db
//echo 'จำนวน row ที่ลบได้ '.$stmtDelMember->rowCount() ==1 ;
if($stmtDelType->rowCount() ==1){
    echo '<script>
         setTimeout(function() {
          swal({
              title: "ลบข้อมูลสำเร็จ",
              type: "success"
          }, function() {
              window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
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
              window.location = "type.php"; //หน้าที่ต้องการให้กระโดดไป
          });
        }, 1000);
    </script>';
}
} //isset


?>