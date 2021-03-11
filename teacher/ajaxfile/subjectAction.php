<?php
// <!-- this page id for fetcing the faculty in the faculty and subject page  -->
session_start();
include("../../database/db.php");
include("../../functions/function.php");
date_default_timezone_set("Asia/Tokyo");
$date =date("Y-m-d");
$time=date("h:i");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if(isset($_POST['status']) && $_POST['status']=="changestatus"){
    $status=(1-$_POST['param']);
    $condi=array("status"=>"{$status}");
    $obj->update_data("subject",$condi,"subid",$_POST['condi']);

}else if(isset($_POST['status']) && $_POST['status']=="removedata"){
    $obj->delete_data("subject","subid",$_POST['subid']);
    // $obj->delete_data("subject","cid",$_POST['cid']);

}else if(isset($_POST['status']) && $_POST['status']=="insertdata"){
    $condi=array("subname"=>"{$_POST['subname']}","cid"=>"{$_POST['cid']}","status"=>"1");
    $row=$obj->insert2_data("subject",$condi);
    if($row){
        echo "done";
    }else{
        echo "false";
    }
}else if(isset($_POST['status']) && $_POST['status']=="editdata"){
    $condi=array("subid"=>"{$_POST['subid']}");
    $row=$obj->get_data("subject","*",$condi);
    $arr =[];
    if(isset($row[0])){
        $arr['data']=$row;
    }else{
        $arr['error']="false";
    }
}else if(isset($_POST['status']) && $_POST['status']=="updatedata"){
    $condi=array("subname"=>"{$_POST['subname']}");
    $row=$obj->update_data("subject",$condi,"subid",$_POST['subid']);
    if($row){
        echo "done";
    }else{
        echo "false";
    }
}else{
    $courseId =$_POST['course'];
    $condi =array("cid"=>"{$courseId}");
    $subject = $obj->get_data("subject",'*',$condi);
    $arr =[];
    if(isset($subject[0])){
        $arr['subject']=$subject;
    }else{
        $arr['error']="false";
    }
}
echo json_encode($arr);
?>