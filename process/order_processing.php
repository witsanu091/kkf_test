<?php
require_once("../connection/Connection.php");
require_once("../function/db_function.php");

$gdoc_date1 = (!empty($_POST['gdoc_date1'])) ? $_POST['gdoc_date1'] : null;
$gdoc_date2 = (!empty($_POST['gdoc_date2'])) ? $_POST['gdoc_date2'] : null;

$d_order_list = get_d_order_by_FinDate($gdoc_date1,$gdoc_date2);
//print_r($d_order_list);
//exit();
$flag=true;
$count_sucess=0;
foreach($d_order_list as $order_item){
    $h_order = get_h_order($order_item['Order_no']);
    if(!empty($h_order)){
        $data=array(
            "Cus_id" => $h_order[0]['Cus_id'],
            "Goods_id" => $order_item['Goods_id'],
            "Doc_date" => $h_order[0]['Order_Date'],
            "Ord_date" => $order_item['Ord_date'],
            "Fin_date" => $order_item['Fin_date'],
            "Sys_date" => date('Y-m-d'),
            "Amount" => $order_item['Amount'],
            "cost_tot" => $order_item['COST_UNIT'],
        );
        
        if(insert_m_order($data)){
            //success for item
            delete_d_order($order_item['Order_no'], $order_item['Goods_id']); //delete d_order
            $count_sucess++;
        }else{
            $flag = false;
        }
    }else{
        $flag = false;
    }
}

//delete h_order
$h_order_all = get_h_order();
foreach($h_order_all as $h_item){
    if(sizeof(get_d_order($h_item['Order_no'])) == 0){ //if d_order for this h_order is 0 item
        delete_h_order($h_item['Order_no']);
    }
}

if($flag){
//    header('Location: ../product_list.php');
?>
    <div style="text-align: center">
        <h1 style="color: #18D31F">สำเส็จ <br>ทำรายการไปทั้งหมด <?=$count_sucess?> รายการ</h1>
        <a href="../order_processing.php">กลับไป การประมวลผลข้อมูลการสั่งสินค้า</a> 
    </div>
    <script>setTimeout(function (){window.location.replace("../order_processing.php")}, 1000)</script>
<?php
    exit();
}else{
?>
    <div style="text-align: center">
        <h2 style="color: #CD2124">ไม่สำเส็จ</h2>
        <a href="#" onClick="history.back()">ลองใหม่</a>
    </div>
<?php }?>