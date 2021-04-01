<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$data = $_POST;
$data['Fin_date'] = ($data['Fin_date'] != "") ? $data['Fin_date'] : NULL;
$result = update_d_order($data);
if($result){
    header("Location: ../order_d_detail.php?Order_no={$data['Order_no']}");
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">เกิดช้อผิดพลาด</h2>
        <a href="../order_d_edit.php?Order_no=<?=$data['Order_no']?>&Goods_id=<?=$data['Goods_id']?>">ลองใหม่</a>
    </div>
<!--    <script>setTimeout(function (){window.location.replace("../order_d_detail.php?Order_no=<?=$data['Order_no']?>")}, 500)</script>-->
<?php }?>