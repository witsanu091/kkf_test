<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$data = $_POST;
//print_r($data);

if(inset_GOODS_NAME($data)){
//    header('Location: ../product_list.php');
?>
    <div style="text-align: center">
        <h1 style="color: #18D31F">เพิ่มสินค้าสำเส็จ</h1>
        <a href="../product_list.php">รายการสินค้า</a> 
    </div>
    <script>setTimeout(function (){window.location.replace("../product_list.php")}, 800)</script>
<?php
    exit();
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">ไม่สำเส็จ</h2>
        <h3 style="">ระหัสสินค้าซ่ำกันหรือกรอกข้อมูลไม่ถูกต้อง</h3>
        <a href="../product_add.php">ลองใหม่</a> | <a href="../product_list.php">รายการสินค้า</a> | 
    </div>
<?php }?>