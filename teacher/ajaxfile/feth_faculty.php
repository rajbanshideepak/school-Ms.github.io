<?php
// <!-- this page id for fetcing the faculty in the faculty and course page  -->
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
    $obj->update_data("faculty",$condi,"fid",$_POST['condi']);
}else if(isset($_POST['status']) && $_POST['status']=="removedata"){
    $obj->delete_data("faculty","fid",$_POST['fid']);
    $obj->delete_data("course","fid",$_POST['fid']);
}else if(isset($_POST['status']) && $_POST['status']=="insertdata"){
    $condi=array("fname"=>"{$_POST['fname']}","status"=>"1");
    $row=$obj->insert2_data("faculty",$condi);
    if($row){
        echo "done";
    }else{
        echo "false";
    }
}else if(isset($_POST['status']) && $_POST['status']=="editdata"){
    $condi=array("fid"=>"{$_POST['fid']}");
    $row=$obj->get_data("faculty","*",$condi);
    $arr =[];
    if(isset($row[0])){
        $arr['data']=$row;
    }else{
        $arr['error']="false";
    }
}else if(isset($_POST['status']) && $_POST['status']=="updatedata"){
    $condi=array("fname"=>"{$_POST['fname']}");
    $row=$obj->update_data("faculty",$condi,"fid",$_POST['fid']);
    if($row){
        echo "done";
    }else{
        echo "false";
    }
}else{
    $faculty = $obj->get_data("faculty");
    $arr =[];
    if(isset($faculty[0])){
        $arr['faculty']=$faculty;
        $arr['total']=[];
        $i=0;
        foreach($faculty as $list){
            $condi=array("fid"=>"{$list['fid']}");
            $course = $obj->get_data("course","*",$condi);
            if(isset($course[0])){
                $arr['total'][$i]=count($course);
            }else{
                $arr['total'][$i]="0";
            }
            $i++;
        }
    }else{
        $arr['error']="false";
    }
}
echo json_encode($arr);
?>