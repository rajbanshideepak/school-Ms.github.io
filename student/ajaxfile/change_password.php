<?php
################# MAIN DATA ###########################
        date_default_timezone_set("Asia/Tokyo");    ###
        include("../../database/db.php");           ###
        include("../../functions/function.php");    ###
        // query object for sql --------- ----------###
        $obj1 = new sfunction();                    ###
        $obj = new query();                         ###
        // query object end--------------           ###
#######################################################
$cpass= $_POST['cpass'];
$cpass =$obj1->get_safe_value($cpass);
$newpass= $_POST['newpass'];
$newpass =$obj1->get_safe_value($newpass);
$regno= $_POST['regno'];
$regno =$obj1->get_safe_value($regno);
$condi_arr=array("regno"=>"{$regno}");
$row=$obj->get_data('user',"",$condi_arr);
if($row[0]){
    if(password_verify($cpass,$row[0]['pass'])){
        $newpass=password_hash($newpass, PASSWORD_DEFAULT);
        $condi_arr1=array("pass"=>"{$newpass}");
        $row1=$obj->update_data("user",$condi_arr1,"regno",$regno);
        if($row1){
            echo "updated";
        }
    }else{
        echo "password do not match";
    }
}
?>