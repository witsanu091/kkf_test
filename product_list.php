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
            padding: 8px;
        }

        #content tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #content tr:hover {
            background-color: #ddd;
        }

        /*
        #content th {
          padding-top: 5px;
          padding-bottom: 5px;
          text-align: left;
        }
*/
    </style>
</head>

<body class="font bg_color-W1">

    <table border="1" width="1200" style="margin-left: auto;margin-right: auto;">
        <thead>
            <th colspan="4" class="bg_color-main1">การบันทึก/แก้ไข ข้อมูลสินค้า</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <table id="content" width="100%" style="margin-left: auto;margin-right: auto;">
                        <thead class="bg_color-W3">
                            <th>
                                รหัสสินค้า
                            </th>
                            <th>
                                รายละเอียด
                            </th>
                            <th>
                                ราคา/หน่วย
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            <?php foreach (get_GOODS_NAME() as $gn_item) { ?>
                                <tr>
                                    <td class="text-size-16"><?= $gn_item['Goods_id'] ?></td>
                                    <td><?= $gn_item['Goods_name'] ?></td>
                                    <td><?= $gn_item['cost_unit'] ?></td>
                                    <td>
                                        <a href="product_edit.php?id=<?= $gn_item['Goods_id'] ?>&name=<?= $gn_item['Goods_name'] ?>&cost=<?= $gn_item['cost_unit'] ?>" style="color: blue">แก้ไข</a> |
                                        <a href="process/delete_product.php?Goods_id=<?= $gn_item['Goods_id'] ?>" style="color: red" onClick="return confirm('Are you sure?')">ลบ</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div style=" text-align: right;margin-top:20px;margin-bottom:10px">
                        <a href="product_add.php" style="flex: 1;align-content: center;justify-content: center" class="btn-main1">+เพิ่มสินค้า</a>
                        <a href="index.php" style="justify-content: flex-end" class="btn-main2">ออก</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script src="asset/js/jquery.min.js"></script>
</body>

</html>