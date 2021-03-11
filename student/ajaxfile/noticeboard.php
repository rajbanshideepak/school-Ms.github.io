<?php
    ################# MAIN DATA ###################
    date_default_timezone_set("Asia/Tokyo");    ###
    include("../../database/db.php");           ###
    include("../../functions/function.php");    ###
    // query object for sql --------- ----------###
    $obj1 = new sfunction();                    ###
    $obj = new query();                         ###
    // query object end--------------           ###
    ###############################################
    if(isset($_POST['status']) && $_POST['status']=='fetch'){
        $data=[];
        $date="";
        if(isset($_POST['date']) && $_POST['date'] != ""){
            $date =$_POST['date'];
        }else{
             $date =date('Y-m-d');
        }
        $condi=array("date"=>"{$date}");
        $row =$obj->get_data('noticeboard',"*",$condi);
        if($row[0]){
            $data['data']=$row;
        }else{
            $data['err']="false";
        }
        echo json_encode($data);
    }else if(isset($_POST['status']) && $_POST['status']=="history"){
        // echo $_POST['status'];
        $data=[];
        $row =$obj->get_data('noticeboard');
        if($row[0]){
            $data['data']=$row;
        }else{
            $data['err']="false";
        }
        echo json_encode($data);
    }else{
        echo "wrong url or address please check the url";
    }
?>