<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
$arr = [];
if (isset($_POST["status"]) && $_POST["status"]=='get_users') {
    $row = $obj->get_data("user");
    if(isset($row[0])){
        $arr['user']=$row;
    }
}
else if (isset($_POST["status"]) && $_POST["status"]=='delete_user') {
    $row = $obj->delete_data("user","userId",$_POST['id']);
}
else if (isset($_POST["status"]) && $_POST["status"]=='user_flag') {
    print_r($_POST);
     $flag =(1-$_POST['flag']);
     $condi =array("flag"=>"{$flag}");
     $row =$obj->update_data("user",$condi,"userId",$_POST['id']);
    // $arr['flag']=$flag;
}
echo json_encode($arr);

