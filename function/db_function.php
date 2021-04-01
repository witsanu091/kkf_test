<?php
//--GOODS_NAME--
function get_GOODS_NAME($Goods_id = null)
{
    global $sql;

    $sql_str = "SELECT * FROM `goods_name` ";
    if (!empty($Goods_id)) {
        $sql_str = $sql_str . "WHERE Goods_id = '{$Goods_id}'";
    }

    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}

function inset_GOODS_NAME($data)
{
    global $sql;

    $sql_str = "INSERT INTO goods_name (Goods_id, Goods_name, cost_unit) VALUES (:Goods_id, :Goods_name, :cost_unit)";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
function update_GOODS_NAME($data)
{
    global $sql;
    $sql_str = "UPDATE goods_name SET Goods_id=:Goods_id, Goods_name=:Goods_name, cost_unit=:cost_unit WHERE Goods_id=:Goods_id";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
function delete_GOODS_NAME($id)
{
    global $sql;
    $sql_str = "DELETE FROM goods_name WHERE Goods_id = '{$id}'";
    $flag = $sql->prepare($sql_str)->execute();

    if (!$flag) {
        return false;
    }
    return true;
}
//---- Cus ------
function get_Customer($Cus_id = null)
{
    global $sql;
    $sql_str = "SELECT * FROM cus_name ";
    if (!empty($Cus_id)) {
        $sql_str = $sql_str . "WHERE Cus_id = '{$Cus_id}'";
    }

    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}
function update_Customer($data)
{
    global $sql;
    $sql_str = "UPDATE cus_name SET Cus_id=:Cus_id, Cus_name=:Cus_name WHERE Cus_id=:Cus_id";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
function inset_Customer($data)
{
    global $sql;

    $sql_str = "INSERT INTO cus_name (Cus_id, Cus_name) VALUES (:Cus_id, :Cus_name)";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
function delete_Customer($id)
{
    global $sql;
    $sql_str = "DELETE FROM cus_name WHERE Cus_id = '{$id}'";
    $flag = $sql->prepare($sql_str)->execute();

    if (!$flag) {
        return false;
    }
    return true;
}

//---- order -----
function get_orderlist()
{
    global $sql;
    //    $sql_str = "SELECT H.CUS_ID, C.CUS_NAME, H.ORDER_NO, COUNT(*) AS CNT, SUM(D.AMOUNT) AS AMOUNT 
    //FROM H_ORDER H, D_ORDER D , CUS_NAME C
    //WHERE H.ORDER_NO = D.ORDER_NO AND H.CUS_ID = C.CUS_ID";

    $sql_str = "SELECT H.CUS_ID,C.CUS_NAME,H.ORDER_NO,COUNT(*) AS CNT, SUM(D.AMOUNT) AS AMOUNT 
FROM H_ORDER H, D_ORDER D , CUS_NAME C										
WHERE H.ORDER_NO = D.ORDER_NO AND H.CUS_ID = C.CUS_ID
GROUP BY H.CUS_ID,C.CUS_NAME,H.ORDER_NO";
    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_d_order($Order_no = null, $Goods_id = null)
{

    global $sql;
    $sql_str = "SELECT d_order.*, Goods_name.Goods_name FROM `d_order`,goods_name WHERE d_order.Goods_id = goods_name.Goods_id ";
    if (!empty($Order_no)) {
        $sql_str = $sql_str . "AND Order_no = " . $Order_no;
    }
    if (!empty($Goods_id)) {
        $sql_str = $sql_str . " AND d_order.Goods_id = '{$Goods_id}'";
    }

    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_d_order_by_FinDate($gdoc_date1, $gdoc_date2)
{
    global $sql;
    $sql_str = "SELECT d_order.*, Goods_name.Goods_name FROM `d_order`,goods_name WHERE d_order.Goods_id = goods_name.Goods_id AND d_order.Fin_date >= STR_TO_DATE('{$gdoc_date1}','%Y-%m-%d') AND d_order.Fin_date <= STR_TO_DATE('{$gdoc_date2}','%Y-%m-%d')";

    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}

function get_h_order($Order_no = null)
{
    global $sql;
    $sql_str = "SELECT * FROM h_order, cus_name WHERE h_order.Cus_id = cus_name.Cus_id ";
    if (!empty($Order_no)) {
        $sql_str = $sql_str . "AND Order_no = " . $Order_no;
    }

    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}

function insert_h_order($data)
{
    global $sql;
    $sql_str = "INSERT INTO h_order (Cus_id, Order_Date) VALUES (:Cus_id, :Order_Date)";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return $sql->lastInsertId();
}
function insert_d_order($data)
{
    global $sql;

    $sql_str = "INSERT INTO d_order (Order_no, Goods_id, Ord_date, Fin_date, Amount, COST_UNIT, TOT_PRC) VALUES (:Order_no, :Goods_id, :Ord_date, :Fin_date, :Amount, :COST_UNIT, :TOT_PRC)";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
function update_d_order($data)
{
    global $sql;
    $sql_str = "UPDATE d_order SET Order_no=:Order_no, Goods_id=:Goods_id, Ord_date=:Ord_date, Fin_date=:Fin_date, Amount=:Amount, COST_UNIT=:COST_UNIT, TOT_PRC=:TOT_PRC WHERE Order_no=:Order_no AND Goods_id=:Goods_id";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
function delete_h_order($Order_no)
{
    global $sql;
    $sql_str = "DELETE FROM h_order WHERE Order_no = '{$Order_no}'";

    $flag = $sql->prepare($sql_str)->execute();

    if (!$flag) {
        return false;
    }
    return true;
}
function delete_d_order($Order_no, $Goods_id = null)
{
    global $sql;
    $sql_str = "DELETE FROM d_order WHERE Order_no = '{$Order_no}'";
    if (!empty($Goods_id)) {
        $sql_str = $sql_str . " AND Goods_id = '{$Goods_id}'";
    }

    $flag = $sql->prepare($sql_str)->execute();

    if (!$flag) {
        return false;
    }
    return true;
}

//---- report ---
function get_report_order($gdoc_date1 = null, $gdoc_date2 = null)
{
    global $sql;
    $sql_str = "select * from h_order,d_order where h_order.Order_no = d_order.Order_no";

    if (!empty($gdoc_date1)) {
        $sql_str = $sql_str . " and d_order.Ord_date >= STR_TO_DATE('{$gdoc_date1}','%Y-%m-%d')";
    }
    if (!empty($gdoc_date2)) {
        $sql_str = $sql_str . " and d_order.Ord_date <= STR_TO_DATE('{$gdoc_date2}','%Y-%m-%d')";
    }
    $sql_str = $sql_str . " and d_order.Fin_date IS NULL";

    $stmt = $sql->prepare($sql_str);
    $stmt->execute();

    return $stmt->fetchAll();
}

//--- M_Order ---
function insert_m_order($data)
{
    global $sql;

    $sql_str = "INSERT INTO m_order (Cus_id, Goods_id, Doc_date, Ord_date, Fin_date, Sys_date, Amount, cost_tot) VALUES (:Cus_id, :Goods_id, :Doc_date, :Ord_date, :Fin_date, :Sys_date, :Amount, :cost_tot)";
    $flag = $sql->prepare($sql_str)->execute($data);

    if (!$flag) {
        return false;
    }
    return true;
}
