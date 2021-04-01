<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$data = $_POST;
//print_r($data);

if (inset_Customer($data)) {
    //    header('Location: ../product_list.php');
?>
    <div style="text-align: center">
        <h1 style="color: #18D31F">เพิ่มลูกค้าสำเส็จ</h1>
        <a href="../cus_list.php">รายการลูกค้า</a>
    </div>
    <script>
        setTimeout(function() {
            window.location.replace("../cus_list.php")
        }, 500)
    </script>
<?php
    exit();
} else {
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">ไม่สำเส็จ</h2>
        <h3 style="">ระหัสซ่ำกัน หรือกรอกข้อมูลไม่ถูกต้อง</h3>
        <a href="../cus_edit.php">ลองใหม่</a> | <a href="../product_list.php">รายการสินค้า</a> |
    </div>
<?php } ?>