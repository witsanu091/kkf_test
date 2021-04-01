<?php
require_once("connection/Connection.php");
require_once("function/db_function.php");

date_default_timezone_set("Asia/Bangkok");
$Order_no = (!empty($_GET['Order_no'])) ? $_GET['Order_no'] : null;

if (empty($Order_no)) {
    echo "<center><h2>ไม่พบ Order_no</h2></center>";
    exit();
}

$product_list = get_GOODS_NAME();
$h_order = get_h_order($Order_no);
if (sizeof($h_order) == 0) {
    echo "<center><h2>ไม่พบ Order_no</h2></center>";
    exit();
} else {
    $h_order = $h_order[0];
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>kkf-example</title>

    <link href="asset/css/style-main.css" rel="stylesheet">

    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        label {
            margin-right: 15px;
        }
    </style>
</head>

<body class="font bg_color-W1">

    <table border="1" width="1200" style="margin-left: auto;margin-right: auto;">
        <thead>
            <th colspan="4" class="bg_color-main1">การบันทึก/แก้ไข การสั่งซื้อสินค้า </th>
        </thead>
        <tbody>
            <tr>
                <td style="padding-top: 10px;">
                    <table id="content" width="100%" style="margin-left: auto;margin-right: auto; padding-left: 10px;" class="text-size-14">
                        <tbody>
                            <tr>
                                <td rowspan="5" width="80" valign="top">
                                    <p style="margin-top: 0">สถานะ เพิ่มรายการส่วน Detail การรับคำสั่งซื้อสินค้า</p>
                                    <div>
                                        <label for="Cus_id">รหัสลูกค้า :
                                            <input type="text" id="Cus_id" name="Cus_id" style="width: 120px;" value="<?= $h_order['Cus_id'] ?>" disabled required>
                                        </label>
                                        <label for="Cus_name"> ชื่อลูกค้า :
                                            <input type="text" id="Cus_name" name="Cus_name" value="<?= $h_order['Cus_name'] ?>" disabled required>
                                        </label>
                                        <label for="Order_Date">วันที่สั่งสินค้า :
                                            <input type="date" id="Order_Date" name="Order_Date" value="<?= date('Y-m-d', strtotime($h_order["Order_Date"])) ?>" required disabled>
                                        </label>
                                        <label for="Order_no"> Order No :
                                            <input type="text" id="Order_no" name="Order_no" value="<?= $Order_no ?>" disabled required style="width: 100px;">
                                        </label>
                                    </div>

                                    <form action="process/insert_d_order.php" method="post">
                                        <input type="hidden" name="Order_no" value="<?= $Order_no ?>">

                                        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px dashed;">

                                            <label for="Goods_id">รหัสสินค้า : &emsp;
                                                <input type="text" id="Goods_id" name="Goods_id" style="width: 130px;" required>
                                            </label>
                                            <label for="Goods_name">
                                                <select id="Goods_name" style="min-width: 400px; height: 25px;" onChange="set_GOODId(this.value)">
                                                    <option value="" disabled selected>--เลือกสินค้า--</option>
                                                    <?php foreach ($product_list as $G_item) { ?>
                                                        <option value="<?= $G_item['Goods_id'] ?>"><?= $G_item['Goods_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </label><br><br>
                                            <label for="Ord_date">วันกำหนดส่ง :
                                                <input type="date" id="Ord_date" name="Ord_date" required value="">
                                            </label>
                                            <label for="Fin_date">วันที่ส่งสินค้าจริง :
                                                <input type="date" id="Fin_date" name="Fin_date" value="">
                                            </label>
                                            <label for="Amount"> จน.สั่ง :
                                                <input type="number" id="Amount" name="Amount" min="0" step="1" value="1" onKeyUp="cal_price()" onChange="cal_price()" required>
                                            </label><br><br>
                                            <label for="COST_UNIT">ราคา/หน่วย :
                                                <input type="number" id="COST_UNIT" name="COST_UNIT" required value="">
                                            </label>
                                            <label for="TOT_PRC">ราคารวม :
                                                <input type="number" id="TOT_PRC" name="TOT_PRC" required value="">
                                            </label>
                                        </div>
                                        <div style=" text-align: left; margin-top:20px; margin-bottom:30px; padding-left: 80px">
                                            <button type="submit" class="btn_conf btn-main1" style="height: 30px;">+ บันทึกและเพิ่มรายการสินค้าต่อ</button>
                                        </div>
                                    </form>

                                    <table id="content" border="1" cellspacing="0" width="950" style="margin-left: auto;margin-right: auto;">
                                        <thead>
                                            <tr style="font-weight: bold;background-color: #C14020">
                                                <td>รหัสสินค้า</td>
                                                <td>รายละเอียด</td>
                                                <td>วันกำหนดส่ง</td>
                                                <td>วันที่ส่งสินค้าจริง</td>
                                                <td>จน.ที่สั่ง</td>
                                                <td>ราคา/หน่วย</td>
                                                <td>ราคารวม</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (get_d_order($Order_no) as $order_item) { ?>
                                                <tr>
                                                    <td><?= $order_item['Goods_id'] ?></td>
                                                    <td width="25%"><?= $order_item['Goods_name'] ?></td>
                                                    <td><?= date("d/m/Y", strtotime($order_item['Ord_date'])) ?></td>
                                                    <td><?= (!empty($order_item['Fin_date'])) ? date("d/m/Y", strtotime($order_item['Fin_date'])) : "" ?></td>
                                                    <td><?= number_format($order_item['Amount'], 2) ?></td>
                                                    <td><?= number_format($order_item['COST_UNIT'], 2) ?></td>
                                                    <td><?= number_format($order_item['TOT_PRC'], 2) ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <div style="text-align: right;margin-top:20px;margin-bottom:10px">
                                        <a href="order_list.php" style="justify-content: flex-end" class="btn_conf btn-main2">กลับไปยังหน้าจอแสดงรายการสั่งสินค้า</a>
                                        <a href="index.php" style="justify-content: flex-end" class="btn-main2">กลับหน้าหลัก</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <script src="asset/js/jquery.min.js"></script>
    <script type="text/javascript">
        function set_GOODId(goods_id) {
            console.log(goods_id)
            let product_filter = product_item.filter(function(item, index) {
                return item.Goods_id == goods_id;
            });
            console.log(product_filter);
            if (product_filter[0].Goods_id) {
                $('#Goods_id').val(product_filter[0].Goods_id)
                $('#COST_UNIT').val(product_filter[0].cost_unit)
            }
            cal_price()
        }

        function cal_price() {
            let price = $('#COST_UNIT').val()
            let amount = $('#Amount').val()
            console.log(amount)
            $('#TOT_PRC').val(price * amount)
        }
        const product_item = [
            <?php foreach ($product_list as $G_item) { ?> {
                    "Goods_id": "<?= $G_item['Goods_id'] ?>",
                    "Goods_name": "<?= $G_item['Goods_name'] ?>",
                    "cost_unit": "<?= $G_item['cost_unit'] ?>",
                },
            <?php } ?>
        ]
    </script>
</body>

</html>