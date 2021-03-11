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
    $year = $_POST['year'];
    $month = $_POST['month'];
    $condi_arr=array("regno"=>"{$regno}","year"=>"{$year}","month"=>"{$month}");
    $row=$obj->get_data("studentresult","*",$condi_arr);
    
    if($row[0]){
        // print_r($row);
        // $data[]=$row;
        echo json_encode($row);
    }else{
        echo "nodata";
    }
}
?>