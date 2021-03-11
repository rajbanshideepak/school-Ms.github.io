<?php
session_start();
include("../../database/db.php");
include("../../functions/function.php");
date_default_timezone_set("Asia/Tokyo");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
 $date =date("Y-m-d");
 $time=date("h:i");
 $writter="";
 $table="";
 $condi_arr=array("regno"=>"{$_SESSION['regno']}");
 $get_writter =$obj->get_data("user","status",$condi_arr);
 if($get_writter[0]['status'] =="teacher"){
     $table="teacherpf";
 }elseif($get_writter[0]['status']=="admin"){
     $writter="Admin";
 }
//  $condi_arr=array("regno"=>"{$_SESSION['regno']}");
 $row =$obj->get_data($table,"*",$condi_arr);
 $writter =$row[0]['lname']." ".$row[0]['fname'];

$notice =$_POST['editor'];
if($notice!=""){
    // insert notice into database
    $insert_condi=array("notice"=>"{$notice}","date"=>"{$date}","time"=>"{$time}","writter"=>"{$writter}","status"=>"1");
    $insert_notice =$obj->insert2_data("noticeboard",$insert_condi);
    if($insert_condi){
        $_SESSION['success']= "notice published succesfully";
    }else{
        $_SESSION['error']= "There Is problem in Publishing Notice";
    }
    
}else{
    $_SESSION['error']="Notice Field  Must be filed";
}
redirect("../php/noticeboard.php");



?>