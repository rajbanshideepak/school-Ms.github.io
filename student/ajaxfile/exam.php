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
// print_r($_POST);
if(isset($_POST['status']) && $_POST['status']=="first"){
    $condi_arr=array("subname"=>"{$_POST['subject']}");
    $row=$obj->get_data("subject","*",$condi_arr); 
    if(isset($row[0])){
        $cid = $row[0]['subid'];
        $sn = $_POST['sn'];
        $data = [];
        // Get the question  from the question table
        $condi_arr1=array("subid"=>"{$cid}","sn"=>"$sn");
        $question=$obj->get_data("question","*",$condi_arr1);
        
        if(isset($question[0])){
            $data['question']=$question[0];
        // get all the answer of target question 
            $condi_arr2=array("subid"=>"{$cid}","qid"=>"$sn");
            $answer=$obj->get_data("answer","*",$condi_arr2);
            if(isset($answer[0])){
                $data['answer']=$answer;
            }else{
                $data['error']="false";  
            }
            // get total question number
            $condi_arr0=array("subid"=>"{$cid}");
            $total=$obj->get_data("question","*",$condi_arr0); 
            $data['total_question']=count($total);

        }else{
            $data['error']="false";
        }
    }
    echo json_encode($data);
}
