<?php
include "condb.php";

    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];

    // เข้ารหัส
    $password = hash('sha1',$password);

$sql="SELECT * FROM tbl_table where username='$username' AND password ='$password'";

$result=mysqli_query($condb,$sql);
$row=mysqli_fetch_array($result);
$status=$row['status'];

if($row > 0){
    $_SESSION["username"]=$row["username"];
    $_SESSION["password"]=$row["password"];
    $_SESSION["title_name"]=$row["title_name"];
    $_SESSION["agency"]=$row["agency"];
    $_SESSION["name"]=$row["name"];
    $_SESSION["surname"]=$row["surname"];
        $show=header("location:index.php");
}else{
    $_SESSION["Error"]=  '<script>
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
?>