<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
// $arry = [];
if (isset($_POST["data_fetch"])) {
    // $condi_array = array("eMail" => "{$email}");
    $row = $obj->get_data("faculty", "fid, fname");
    $row1 = $obj->get_data("country", "conname");
    $arry['faculty'] = $row;
    $arry['nation'] = $row1;

    if (isset($row[0]) && isset($row1[0])) {
        // header("Content-Disposition:attachment;filename='jsonfile'");
        // array_push($arry, $row, $row1);
        echo json_encode($arry);
    }
}
if (isset($_POST["select_val"])) {
    $val = $_POST["select_val"];
    $condi_array = array("fname" => $val);
    $row1 = $obj->get_data("faculty", "fid", $condi_array);
    $condi_array2 = array("fid" => $row1[0]["fid"]);
    $row2 = $obj->get_data("course", "cid, cname", $condi_array2);
    $arry1['course'] = $row2;
    if (isset($row2[0])) {
        echo json_encode($arry1);
    }
}
if (isset($_POST["regno_fetch"])) {
    $regno = $_POST["regno"];
    $condi_array = array("regno" => $regno);
    $row3 = $obj->get_data("studentpf", "regno", $condi_array);
    if (isset($row3[0])) {
        echo "alreadySaved";
    }
}
