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
if(isset($_POST['status']) && $_POST['status']=="fetch"){
    // print_r($_POST);
    $regno = $_POST['regno'];
    $condi_arr=array("regno"=>"{$regno}");
    $row=$obj->get_data("studentattendance","*",$condi_arr);
    if($row[0]){
        // $data[]=$row;
        echo json_encode($row);
    }else{
        echo "data not found";
    }
}else if(isset($_POST['status']) && $_POST['status']=="insert"){
    // print_r($_POST);
        $inpregno= $_POST['inpregno'];
        $inpregno =$obj1->get_safe_value($inpregno);
        // $regno= $_POST['regno'];
        // $regno =$obj1->get_safe_value($regno);
        $date =date('Y/m/d');
        $time =date('h:i:s');
        $condi_arr=array("regno"=>"{$inpregno}");
        $row=$obj->get_data('studentpf',"",$condi_arr);
        if(isset($row[0]) &&  ($_POST['regno']  == $row[0]['regno']) ){
                // print_r($row);
                $condi_arr1=array("regno"=>"{$inpregno}","faculty"=>"{$_POST['inpfac']}","date"=>"{$date}","time"=>"$time","status"=>"1");
                $row1=$obj->insert2_data("studentattendance",$condi_arr1);
                if($row1){
                    echo "inserted";
                }else{
                    echo "not";
                }
        }else{
            echo "not found";
        }
}

?>