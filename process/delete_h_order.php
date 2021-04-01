<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$Order_no = $_GET['Order_no'];
$result_d = delete_d_order($Order_no);
$result_h = delete_h_order($Order_no);
if($result_d && $result_h){
    header("Location: ../order_list.php");
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">เกิดช้อผิดพลาด</h2>
        <a href="../order_list.php">ลองใหม่</a>
    </div>
    <script>setTimeout(function (){window.location.replace("../order_list.php")}, 500)</script>
<?php }?>