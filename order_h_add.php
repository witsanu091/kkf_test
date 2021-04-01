<?php
require_once("connection/Connection.php");
require_once("function/db_function.php");

date_default_timezone_set("Asia/Bangkok");
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
    </style>
</head>

<body class="font bg_color-W1">

    <table border="1" width="1200" style="margin-left: auto;margin-right: auto;">
        <thead>
            <th colspan="4" class="bg_color-main1">การบันทึก/แก้ไข การสั่งซื้อสินค้า</th>
        </thead>
        <tbody>
            <tr>
                <td style="padding-top: 10px;">
                    <table id="content" width="100%" style="margin-left: auto;margin-right: auto;" class="text-size-14">
                        <tbody>
                            <tr>
                                <td rowspan="5" width="80" valign="top">สถานะ </td>
                                <td>เพิ่มรายการส่วน Hedader การรับคำสั่งซื้อสินค้า</td>
                            </tr>
                            <tr>
                                <td>เพิ่มข้อมูล Header</td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="process/insert_h_order.php" method="post">
                                        <div>
                                            <label for="Cus_id">รหัสลูกค้า :
                                                <input type="text" id="Cus_id" disabled required>
                                            </label>
                                            <label for="Cus_id_select"> ชื่อลูกค้า :
                                                <select name="Cus_id" id="Cus_id_select" required style="min-width: 250px; height: 25px;" onChange="set_CusId(this.value)">
                                                    <option disabled selected value="">เลือกลูกค้า</option>
                                                    <?php foreach (get_Customer() as $cus_item) { ?>
                                                        <option value="<?= $cus_item['Cus_id'] ?>"><?= $cus_item['Cus_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </label>
                                        </div>
                                        <div style="margin-top: 10px">
                                            <label for="Order_Date">วันที่สั่งสินค้า :
                                                <input type="date" id="Order_Date" name="Order_Date" required value="<?= date('Y-m-d'); ?>">
                                            </label>
                                        </div>

                                        <div style=" text-align: center;margin-top:20px;margin-bottom:10px">
                                            <button type="submit" class="btn_conf btn-main1">บันทึกและเพิ่มรายการสินค้าต่อ</button>
                                            <a href="order_list.php" style="justify-content: flex-end" class="btn-main2">ยกเลิก</a>
                                        </div>
                                    </form>
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
        function set_CusId(cusid) {
            console.log(cusid)
            $('#Cus_id').val(cusid);
        }
    </script>
</body>

</html>