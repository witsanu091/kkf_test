<?php
require_once("connection/Connection.php");
include_once("function/db_function.php");
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
        label {
            margin-right: 10px;
        }
    </style>
</head>

<body class="font bg_color-W1">

    <table border="1" width="1200" style="margin-left: auto;margin-right: auto;">
        <thead>
            <th colspan="4" class="bg_color-main1">เพิ่ม ลูกค้า</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div>
                        <form action="process/insert_cus.php" id="form_add_product" method="post" style="padding-left: 50px; padding-top: 30px;">
                            <div>
                                <label for="Cus_id"> ระหัสลูกค้า
                                    <input type="text" id="Cus_id" name="Cus_id" required>
                                </label>
                                <label for="Cus_name"> ชื่อลูกค้า
                                    <input type="text" id="Cus_name" name="Cus_name" required>
                                </label>
                            </div>
                            <button type="button" onClick="random_gen(5)">สร้าง ID</button>
                            <div style=" text-align: right;margin-top:10px">
                                <button style="flex: 1;align-content: center;justify-content: center" class="btn-main1">บันทึก</button>
                                <button type="button" onClick="history.back()" style="justify-content: flex-end" class="btn-main1">
                                    << กลับ</button> <!-- <a href="index.php" style="justify-content: flex-end" class="btn-main2">ออก</a>-->
                            </div>
                        </form>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>

    <script src="asset/js/jquery.min.js"></script>
    <script type="text/javascript">
        function random_gen(length = 10) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            console.log(result)
            $('#Cus_id').val(result);
        }
    </script>
</body>

</html>