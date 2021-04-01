<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$Order_no = $_GET['Order_no'];
$Goods_id = (!empty($_GET['Goods_id'])) ? $_GET['Goods_id'] : null;
$result = delete_d_order($Order_no,$Goods_id);
if($result){
    header("Location: ../order_d_detail.php?Order_no={$Order_no}");
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">เกิดช้อผิดพลาด</h2>
        <a href="../order_d_detail.php?Order_no=<?=$Order_no?>">ลองใหม่</a>
    </div>
    <script>setTimeout(function (){window.location.replace("../order_d_detail.php?Order_no=<?=$Order_no?>")}, 500)</script>
<?php }?>