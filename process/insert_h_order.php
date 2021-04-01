<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$data = $_POST;
$result = insert_h_order($data);
if($result > 0){
    header("Location: ../order_d_add.php?Order_no={$result}");
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">เกิดช้อผิดพลาด</h2>
        <a href="../order_h_add.php">ลองใหม่</a> | <a href="../order_list.php">กลับไปรายการสั่งซื้อ</a>
    </div>
<?php }?>