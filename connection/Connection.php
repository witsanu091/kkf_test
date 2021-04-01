<?php

$db_name = "kkf_db";
$db_user = "root";
$db_pss = "";

try {
    $sql = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8", $db_user, $db_pss);
} catch (PDOException $e) {
    echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้ : " . $e->getMessage() . "<br>";

    exit();
}
