<?php 
// session_start();
include("../../database/db.php");
include("../../functions/function.php");
date_default_timezone_set("Asia/Tokyo");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if (isset($_SESSION['Islogin']) && isset($_SESSION['Islogin']) != 'yes') {
    redirect("../../index.php");
}else if(isset($_POST['status']) && $_POST['status']=='student'){
    $num_rec_per_page = 10;
    $page  ='';
    if (isset($_POST["page_no"])) { 
         $page  = $_POST["page_no"]; 
    }else{
          $page=1; 
    };
    $start_from1 = ($page-1) * $num_rec_per_page;
    $start_from = "$start_from1";
    $condi_array = array("status" => "{$_POST['status']}");
    $table="";
    $table1="";
    if($_POST['status']=='student'){
        $table.="studentattendance";
        $table1.="studentpf";
    }else if($_POST['status']=='teacher'){
        $table.="teacherattendance";
        $table1.="teacherpf";
    }
    $row1=$obj->get_data($table);
    // $fac=mb_convert_encoding($_POST['faculty'],"SJIS","UTF-8");
    
    $faculty1=$_POST['faculty'];
    $coni=array("fid"=>"{$faculty1}");
    $fac_tb=$obj->get_data("faculty",'fname',$coni);
    if($fac_tb[0]){
        $faculty=$fac_tb[0]['fname'];
        $fac=$fac_tb[0]['fname'];
    }
    $today=date("Y-m-d");
    // $today="2020-11-29";
    $key=$table1.".faculty";
    $date=$table.".date";
    // $condi_array1=array("{$key}"=>"{$faculty}","{$date}"=>"{$today}");
    $condi_array1=array("{$key}"=>"{$faculty}");
    $row=$obj->get_join_data($table,$table1,'*','regno',$condi_array1,'time','desc',$start_from,$num_rec_per_page);
    //   die($row);
        if(isset($row[0])){   
                $data['data'] = $row;
                $result = count($row1);
                $data['total'] = $result; 
                $data['faculty']=$fac;          
                echo json_encode($data);
        }else{
            // $data['faculty']=$fac;
            $data['error']="0".$today;
            $data['faculty']=$fac;
            echo json_encode($data);
        }
}else if(isset($_POST['status']) && $_POST['status']=='insert'){
    extract($_POST);
    // regno,time,select,date,faculty
        $arr=[];
        $condi_array=array("regno"=>"{$regno}");
        $row =$obj->get_data("studentpf",'*',$condi_array);
        if(isset($row[0])){
            $sel_condi=array("regno"=>"{$_POST['regno']}","faculty"=>"{$row[0]['faculty']}","course"=>"{$row[0]['course']}","date"=>"{$_POST['date']}");
            $sel=$obj->get_data("studentattendance","*",$sel_condi);
            if(isset($sel[0])){
                $arr['already']="true";
            }else{
                $condi_arr =array("regno"=>"{$_POST['regno']}","faculty"=>"{$row[0]['faculty']}","course"=>"{$row[0]['course']}","date"=>"{$_POST['date']}","time"=>"{$_POST['time']}","status"=>"{$_POST['select']}");
                $row =$obj->insert2_data("studentattendance",$condi_arr);
                if($row){
                    $arr['done']="true";
                }else{
                    $arr['error']="true"; 
                }
            }
        }else{
            $arr['error']="true";  
        }
    echo json_encode($arr);
}
// delte the student attendance data from the table
else if(isset($_POST['status']) && $_POST['status']=='delete'){
    $obj->delete_data("studentattendance",'aid',$_POST['id']);
}
// edit button clicked
else if(isset($_POST['status']) && $_POST['status']=='edit'){
    $arr=[];
    $condition=array("aid"=>"{$_POST['id']}");
    $row=$obj->get_data("studentattendance",'*',$condition);
    if(isset($row[0])){
        $arr['data']=$row;
    }
    echo json_encode($arr);
}
else if(isset($_POST['status']) && $_POST['status']=='update'){
    $arry=[];
    // print_r($_POST);
    extract($_POST);
    // regno,time,select,date,faculty
    $condi_array=array("regno"=>"{$edit_regno}");
    $row =$obj->get_data("studentpf",'*',$condi_array);
    if(isset($row[0])){
        $condi_arr =array("date"=>"{$_POST['edit_date']}","time"=>"{$_POST['edit_time']}","status"=>"{$_POST['edit_select']}");
        $row =$obj->update_data("studentattendance",$condi_arr,"aid",$_POST['edit_id']);
        if($row){
            $arry['done']="true";
        }else{
            $arry['error']="true"; 
        }   
    }else{
        $arry['error']="true";  
    }    
    echo json_encode($arry);
}
?>