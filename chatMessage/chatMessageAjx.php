<?php
// echo "called";
include("../database/db.php");
include("../functions/function.php");
date_default_timezone_set("Asia/Tokyo");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
$obj2 = new chat();
// query object end--------------
if (isset($_POST["status"]) && $_POST["status"] == "fetch") {
    $row = $obj->get_data("studentpf", "regno, lname, fname, image, course");
    $row1 = $obj->get_data("teacherpf", "regno, lname, fname, image");
    $row2 = $obj->get_data("teacherpf", "regno, lname, fname, image");
    $arry['studentpf'] = $row;
    $arry['teacherpf'] = $row1;
    if (isset($row[0]) && isset($row1[0])) {
        echo json_encode($arry);
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "fetchMsg") {
    $frmId = $_POST["sender"];
    $toId = $_POST["receiver"];
    $row = $obj2->get_data("SELECT * from message where from_id='$frmId' AND to_id='$toId' OR from_id='$toId' AND to_id='$frmId' ORDER BY timeStamp");
    if (isset($row[0])) {
        echo json_encode($row);
    } else {
        echo json_encode("noData");
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "sendMsg") {
    $sender = $_POST["sender"];
    $receiver = $_POST["receiver"];
    $msg = $obj1->get_safe_value($_POST["msg"]);
    // $msg = $_POST["m"];
    $timestamp = get_date();
    $arry = ["from_id" => $sender, "to_id" => $receiver, "chat_msg" => $msg, "timeStamp" => $timestamp];
    $row = $obj->insert2_data("message", $arry);
    $row = $obj2->get_data("SELECT * from message where from_id='$sender' AND to_id='$receiver' OR from_id='$receiver' AND to_id='$sender' ORDER BY timeStamp");
    if (isset($row[0])) {
        echo json_encode($row);
    }
}
