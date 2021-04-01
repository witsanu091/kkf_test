<?php
require_once("connection/Connection.php");
require_once("function/db_function.php");
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

        #content {
            border-collapse: collapse;
        }

        #content td,
        #customers th {
            border: 1px solid #888;
        }

        #content tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body class="font bg_color-W1">

    <table border="1" width="1200" style="margin-left: auto;margin-right: auto;">
        <thead>
            <th colspan="4" class="bg_color-main1">แสดงข้อมูล การสั่งซื้อสินค้า </th>
        </thead>
        <tbody>
            <tr>
                <td style="padding-top: 30px;">
                    <?php if (!empty(get_orderlist())) { ?>
                        <table id="content" border="2" width="950" style="margin-left: auto;margin-right: auto;">
                            <thead>
                                <tr style="font-weight: bold;background-color: #C14020">
                                    <td rowspan="2">รหัสลูกค้า</td>
                                    <td rowspan="2">ชื่อลูกค้า</td>
                                    <td rowspan="2">ลำดับ</td>
                                    <td rowspan="2">จน.รายการที่สั่ง</td>
                                    <td rowspan="2">จน.ที่สั่ง</td>
                                    <td colspan="2">Action</td>
                                </tr>
                                <tr style="font-weight: bold;background-color: #C14020">
                                    <td>แก้ไข</td>
                                    <td>ลบ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (get_orderlist() as $order_item) { ?>
                                    <tr>
                                        <td><?= $order_item['CUS_ID'] ?></td>
                                        <td width="40%"><?= $order_item['CUS_NAME'] ?></td>
                                        <td><?= $order_item['ORDER_NO'] ?></td>
                                        <td><?= $order_item['CNT'] ?></td>
                                        <td><?= $order_item['AMOUNT'] ?></td>
                                        <td><a href="order_d_detail.php?Order_no=<?= $order_item['ORDER_NO'] ?>" style="color: blue">แก้ไข</a></td>
                                        <td><a href="process/delete_h_order.php?Order_no=<?= $order_item['ORDER_NO'] ?>" onClick="return confirm('Are you sure?')" style="color: red">ลบ</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="bg_color-W3" style="margin-left: 20px; margin-right: 20px; padding-bottom: 10px;padding-top: 10px;">
                            <center>
                                <h3>ไม่มีรายการสั่งซื้อ</h3>
                            </center>
                        </div>
                    <?php } ?>

                    <div style=" text-align: right;margin-top:20px;margin-bottom:10px">
                        <a href="order_h_add.php" style="flex: 1;align-content: center;justify-content: center" class="btn_conf btn-main1">+เพิ่มข้อมูลการสั่งซื้อสินค้า</a>
                        <a href="index.php" style="justify-content: flex-end" class="btn-main2">ออก</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script src="asset/js/jquery.min.js"></script>
</body>

</html>