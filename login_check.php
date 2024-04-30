<?php
session_start(); // เริ่ม session

include "config/condb.php";

// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบว่ามีข้อมูล username และ password ถูกส่งมาหรือไม่
    if (isset($_POST["username"]) && isset($_POST["password"])) {
      //echo "yyy";
      //exit ;
        // ในที่นี้คุณสามารถใส่การตรวจสอบ username และ password ของคุณได้ตามที่ต้องการ
        // เช่น การตรวจสอบในฐานข้อมูล หรือการเปรียบเทียบกับค่าที่กำหนดไว้ตามเงื่อนไข
        $username = $_POST["username"];
        $password = sha1($_POST["password"]);

        
        //คิวรี่ข้มูลลสมาชิก
        $stmtlogin = $condb->prepare("SELECT * FROM tbl_member WHERE username=? AND password=?");
        $stmtlogin->execute([$username,$password]);
        $row = $stmtlogin->fetch(PDO::FETCH_ASSOC);


        if ($stmtlogin->rowCount() > 0) {
            // ถ้าข้อมูลถูกต้อง กำหนด session และเปลี่ยนเส้นทางไปยังหน้าหลักหรือหน้าที่คุณต้องการ
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $row['name'];
            // Redirect ไปยังหน้าหลักหรือหน้าที่คุณต้องการ
            header("Location: /Dock-smm/admin/index.php");
            exit(); // จบการทำงานของสคริปต์
            //echo "login succes";
        } else {
            // ถ้าข้อมูลไม่ถูกต้อง กำหนดข้อความผิดพลาดใน session
            $_SESSION["Error"] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
            // Redirect กลับไปยังหน้า login
            header("Location: login.php");
            exit(); // จบการทำงานของสคริปต์
            //echo "login succes";
        }
    }
} 

?>
