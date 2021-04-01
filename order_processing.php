<?php
require_once("connection/Connection.php");
require_once("function/db_function.php");

date_default_timezone_set("Asia/Bangkok");

$gdoc_date1 = (!empty($_GET['gdoc_date1'])) ? $_GET['gdoc_date1'] : null;
$gdoc_date2 = (!empty($_GET['gdoc_date2'])) ? $_GET['gdoc_date2'] : null;

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
            <th colspan="4" class="bg_color-main1">การประมวลผลข้อมูลสั่งซื้อสินค้า </th>
        </thead>
        <tbody>
            <tr>
                <td style="padding-top: 10px;">
                    <table id="content" width="100%" style="margin-left: auto;margin-right: auto; padding-left: 10px;" class="text-size-14">
                        <tbody>
                            <tr>
                                <td rowspan="5" width="80" valign="top">
                                    <form action="process/order_processing.php" method="post" style="margin-bottom: 30px">
                                        <center>
                                            <table cellpadding="8" style="border: 1px solid #555; padding: 10px;">
                                                <tbody>
                                                    <tr>
                                                        <td>ระหว่างวันที่ส่งสินค้า : </td>
                                                        <td><input type="date" name="gdoc_date1" value="<?= (!empty($gdoc_date1)) ? date('Y-m-d', strtotime($gdoc_date1)) : null ?>" required> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ถึงวันที่ : </td>
                                                        <td><input type="date" name="gdoc_date2" value="<?= (!empty($gdoc_date2)) ? date('Y-m-d', strtotime($gdoc_date2)) : null ?>" required></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div style="text-align:center; margin-top:10px;margin-bottom:10px">
                                                <button type="submit" class="btn_conf btn-main1 text-size-15">&nbsp;&nbsp;&nbsp;ตกลง&nbsp;&nbsp;&nbsp;</button>
                                                <a href="index.php" style="justify-content: flex-end" class="btn-main2"> ออก </a>
                                            </div>
                                        </center>
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

    </script>
</body>

</html>