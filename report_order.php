<?php
require_once("connection/Connection.php");
require_once("function/db_function.php");

date_default_timezone_set("Asia/Bangkok");

$gdoc_date1 = (!empty($_GET['gdoc_date1'])) ? $_GET['gdoc_date1'] : null;
$gdoc_date2 = (!empty($_GET['gdoc_date2'])) ? $_GET['gdoc_date2'] : null;

$report_order = get_report_order($gdoc_date1, $gdoc_date2);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>kkf-exam</title>

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

            <th colspan="4" class="bg_color-main1">รายงานแสดงข้อมูลที่ครบกำหนดส่งสินค้าแล้วยังไม่ได้ส่งสินค้า </th>
        </thead>
        <tbody>
            <tr>
                <td style="padding-top: 10px;">
                    <table id="content" width="100%" style="margin-left: auto;margin-right: auto; padding-left: 10px;" class="text-size-14">
                        <tbody>
                            <tr>
                                <td rowspan="5" width="80" valign="top">
                                    <form action="#" method="get" style="margin-bottom: 30px">
                                        <table cellpadding="8">
                                            <tbody>
                                                <tr>
                                                    <td>วันที่กำหนดส่งตามแผน : </td>
                                                    <td><input type="date" name="gdoc_date1" value="<?= (!empty($gdoc_date1)) ? date('Y-m-d', strtotime($gdoc_date1)) : null ?>"> </td>
                                                    <td rowspan="2" style="padding-left: 20px;">
                                                        <button type="submit" class="btn_conf btn-main1 text-size-18">แสดง</button>
                                                    </td>
                                                    <td rowspan="2" style="padding-left: 20px;">
                                                        <a href="report_order.php" class="btn_link_cursor">รีเซ็ต</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ถึงวันที่ : </td>
                                                    <td><input type="date" name="gdoc_date2" value="<?= (!empty($gdoc_date2)) ? date('Y-m-d', strtotime($gdoc_date2)) : null ?>"></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </form>

                                    <p class="text_color-R1">* รายการที่ยังไม่ได้ส่งสินค้าเท่านั่น</p>
                                    <?php if (sizeof($report_order) > 0) { ?>
                                        <table id="content" border="1" cellspacing="0" width="980" style="margin-left: auto;margin-right: auto; ">
                                            <thead>
                                                <tr style="font-weight: bold;background-color: #AAA">
                                                    <td>ลำดับ</td>
                                                    <td>รายละเอียดลูกค้า</td>
                                                    <td>รายละเอียดสินค้า</td>
                                                    <td>วันที่สั่ง</td>
                                                    <td>เลขที่สั่ง</td>
                                                    <td>วันกำหนดส่ง</td>
                                                    <td>จำนวน</td>
                                                    <td>ราคา/หน่วย</td>
                                                    <td>ราคารวม</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $total_price = 0;
                                                $total_amount = 0;
                                                foreach ($report_order as $report_item) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $report_item['Cus_id'] . " : " . get_Customer($report_item['Cus_id'])[0]['Cus_name'] ?></td>
                                                        <td><?= $report_item['Goods_id'] . " : " . get_GOODS_NAME($report_item['Goods_id'])[0]['Goods_name'] ?></td>
                                                        <td><?= date("d/m/Y", strtotime($report_item['Order_Date'])) ?></td>
                                                        <td><?= $report_item['Order_no'] ?></td>
                                                        <td><?= date("d/m/Y", strtotime($report_item['Ord_date'])) ?></td>
                                                        <td><?= number_format($report_item['Amount']) ?></td>
                                                        <td><?= number_format($report_item['COST_UNIT'], 2) ?></td>
                                                        <td><?= number_format($report_item['TOT_PRC'], 2) ?></td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                    $total_price += $report_item['TOT_PRC'];
                                                    $total_amount += $report_item['Amount'];
                                                }
                                                ?>
                                                <tr class="bg_color-W2">
                                                    <td>รวม</td>
                                                    <td colspan="5"></td>
                                                    <td><?= number_format($total_amount) ?></td>
                                                    <td></td>
                                                    <td><?= number_format($total_price, 2) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <div class="bg_color-W3" style="padding-bottom: 10px;padding-top: 10px;">
                                            <center>
                                                <h2>ไม่พบรายการ</h2>
                                            </center>
                                        </div>
                                    <?php } ?>

                                    <div style="text-align: right;margin-top:20px;margin-bottom:10px">
                                        <button class="btn_conf btn-main1 text-size-16" onClick="window.print()">&nbsp;&nbsp;&nbsp;พิมพ์&nbsp;&nbsp;&nbsp;</button>
                                        <a href="index.php" style="justify-content: flex-end" class="btn-main2">ออก</a>
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

    </script>
</body>

</html>