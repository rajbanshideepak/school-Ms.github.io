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
    $obj->update_data("course",$condi,"cid",$_POST['condi']);

}else if(isset($_POST['status']) && $_POST['status']=="removedata"){
    $obj->delete_data("course","cid",$_POST['cid']);
    $obj->delete_data("subject","cid",$_POST['cid']);

}else if(isset($_POST['status']) && $_POST['status']=="insertdata"){
    $condi=array("cname"=>"{$_POST['cname']}","fid"=>"{$_POST['fid']}","status"=>"1");
    $row=$obj->insert2_data("course",$condi);
    if($row){
        echo "done";
    }else{
        echo "false";
    }
}else if(isset($_POST['status']) && $_POST['status']=="editdata"){
    $condi=array("cid"=>"{$_POST['cid']}");
    $row=$obj->get_data("course","*",$condi);
    $arr =[];
    if(isset($row[0])){
        $arr['data']=$row;
    }else{
        $arr['error']="false";
    }
}else if(isset($_POST['status']) && $_POST['status']=="updatedata"){
    $condi=array("cname"=>"{$_POST['cname']}");
    $row=$obj->update_data("course",$condi,"cid",$_POST['cid']);
    if($row){
        echo "done";
    }else{
        echo "false";
    }
}else{
    $facultyid =$_POST['faculty'];
    $condi =array("fid"=>"{$facultyid}");
    $course = $obj->get_data("course",'*',$condi);
    $arr =[];
    if(isset($course[0])){
        $arr['course']=$course;
        $arr['total']=[];
        $i=0;
        foreach($course as $list){
            $condi=array("cid"=>"{$list['cid']}");
            $subject = $obj->get_data("subject","*",$condi);
            if(isset($subject[0])){
                $arr['total'][$i]=count($subject);
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