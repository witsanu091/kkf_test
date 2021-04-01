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
                    <table id="content" width="900px" style="margin-left: auto;margin-right: auto;margin-top: 20px;">
                        <thead class="bg_color-W3">
                            <th>
                                รหัสลูกค้า
                            </th>
                            <th>
                                ชื่อ
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            <?php foreach (get_Customer() as $cus_item) { ?>
                                <tr>
                                    <td class="text-size-16"><?= $cus_item['Cus_id'] ?></td>
                                    <td width="50%"><?= $cus_item['Cus_name'] ?></td>
                                    <td>
                                        <a href="cus_edit.php?id=<?= $cus_item['Cus_id'] ?>&name=<?= $cus_item['Cus_name'] ?>" style="color: blue">แก้ไข</a> |
                                        <a href="process/delete_cus.php?Cus_id=<?= $cus_item['Cus_id'] ?>" style="color: red" onClick="return confirm('Are you sure?')">ลบ</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div style=" text-align: right;margin-top:20px;margin-bottom:10px">
                        <a href="cus_add.php" style="flex: 1;align-content: center;justify-content: center" class="btn-main1">+ลูกค้า</a>
                        <a href="index.php" style="justify-content: flex-end" class="btn-main2">ออก</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script src="asset/js/jquery.min.js"></script>
</body>

</html>