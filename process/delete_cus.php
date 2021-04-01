<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$id = $_GET['Cus_id'];
//print_r($data);

if(delete_Customer($id)){
//    header('Location: ../product_list.php');
?>
    <div style="text-align: center">
        <h1 style="color: #18D31F">ลบสำเส็จ</h1>
        <a href="../cus_list.php">รายการสินค้า</a> 
    </div>
    <script>setTimeout(function (){window.location.replace("../cus_list.php")}, 500)</script>
<?php
    exit();
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">ไม่สำเส็จ</h2>
        <a href="#" onClick="history.back()">ลองใหม่</a> | <a href="../cus_list.php">รายการสินค้า</a> | 
    </div>
<?php }?>