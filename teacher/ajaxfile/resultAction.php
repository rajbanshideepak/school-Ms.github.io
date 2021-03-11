<?php 
   include("../../database/db.php");
   include("../../functions/function.php");
   // query object ----------------------
   $obj1 = new sfunction();
   $obj = new query();
   $obj2 = new chat();
   // query object end--------------
   $arr =[];
   if(isset($_POST['status']) && $_POST['status']=="faculty"){
      $faculty = $obj->get_data("faculty");
      if(isset($faculty[0])){
          $arr['faculty']=$faculty;
      }
   }else if(isset($_POST['status']) && $_POST['status']=="course"){
    $course = $obj->get_data("course");
      if(isset($course[0])){
         $arr['course']=$course;
      }
   }
   else if(isset($_POST['status']) && $_POST['status']=="subjects"){
      $condi_array=array("cid"=>"{$_POST['c_val']}");
      $subject_name = $obj->get_data("subject",'*',$condi_array);
        if(isset($subject_name[0])){
           $arr['subject']=$subject_name;
        }else{
           $arr['error']="false";
        }
   }
   else if(isset($_POST['status']) && $_POST['status']=="insert_mark"){
      $condi=array("full_mark"=>"{$_POST['full']}","pass_mark"=>"{$_POST['pass']}");
      $row = $obj->update_data('subject',$condi,"subid",$_POST['id']);
        if($row){
           echo true;
        }else{
           echo false;
        }
   }
   else if(isset($_POST['status']) && $_POST['status']=="std_result"){
      // print_r( $_POST);
      $condi =array("faculty"=>"{$_POST['f_name']}","course"=>"{$_POST['c_name']}");
      $student_name =$obj->get_data("studentpf",'*',$condi);
      if(isset($student_name[0])){
         $arr['student']=$student_name;
      }else{
         $arr['error']="false";
      }
   }
   else if(isset($_POST['status']) && $_POST['status']=="feteh_result"){
      // print_r( $_POST);
      $condi =array("course"=>"{$_POST['course']}","faculty"=>"{$_POST['faculty']}","year"=>"{$_POST['year']}","month"=>"{$_POST['month']}","regno"=>"{$_POST['id']}");
      $student_result =$obj->get_data("studentresult",'*',$condi);
      if(isset($student_result[0])){
         $arr['result']=$student_result;
      }else{
         $arr['error']="false";
      }
   }
   else if(isset($_POST['status']) && $_POST['status']=="update_ym"){
      // print_r( $_POST);
      $condi=array("year"=>"{$_POST['year']}","month"=>"{$_POST['month']}");
      $row = $obj->update_data('studentresult',$condi,"regno",$_POST['id']);
        if($row){
           echo true;
        }else{
           echo false;
        }
   } 
   else if(isset($_POST['status']) && $_POST['status']=="update_score"){
      // print_r( $_POST);
      $condi=array("fullMark"=>"{$_POST['full']}","passMark"=>"{$_POST['pass']}","score"=>"{$_POST['score']}","percent"=>"{$_POST['per']}");
      $row = $obj->update_data('studentresult',$condi,"rsid",$_POST['id']);
        if($row){
           echo true;
        }else{
           echo false;
        }
   }
   else if(isset($_POST['status']) && $_POST['status']=="delete_score"){
      // print_r( $_POST);
      $row = $obj->delete_data('studentresult',"rsid",$_POST['id']);
        if($row){
           echo true;
        }else{
           echo false;
        }
   } 
   else if(isset($_POST['status']) && $_POST['status']=="fetch_sub_for_result"){
      $fetch =array("year"=>"{$_POST['year']}","month"=>"{$_POST['month']}","regno"=>"{$_POST['id']}");
      $row=$obj->get_data("studentresult",'*',$fetch);
      if(isset($row[0])){
         $arr['already']="true";
      }else{
         $condi_array=array("cid"=>"{$_POST['c_val']}");
         $subject_name = $obj->get_data("subject",'*',$condi_array);
         if(isset($subject_name[0])){
            $arr['subject']=$subject_name;
         }else{
            $arr['error']="false";
         }
      } 
   }
   else if(isset($_POST['status']) && $_POST['status']=="add_std_result"){
      $con =array("regno"=>"{$_POST['regno']}","subject"=>"{$_POST['subject']}","year"=>"{$_POST['year']}","month"=>"{$_POST['month']}");
      $sel =$obj->get_data("studentresult",'*',$con);
      if(isset($sel[0])){
         $arr['already']="true";
      }else{
         $arry = array("regno"=>"{$_POST['regno']}",
         "faculty"=>"{$_POST['faculty']}",
         "course"=>"{$_POST['course']}",
         "subject"=>"{$_POST['subject']}",
         "fullMark"=>"{$_POST['fullMark']}",
         "passMark"=>"{$_POST['passMark']}",
         "score"=>"{$_POST['score']}",
         "percent"=>"{$_POST['precent']}",
         "year"=>"{$_POST['year']}",
         "month"=>"{$_POST['month']}");
         //  print_r($arry);
         $row=$obj->insert2_data("studentresult",$arry);
         if($row){
            $arr['insert']="true";
         }
         else{
            $arr['notinsert']="true";
         }
      }   
   }
   else if(isset($_POST['status']) && $_POST['status']=="delete_result"){
      print_r( $_POST);
      $sql ="delete from studentresult where regno='{$_POST['id']}' and year='{$_POST['year']}' and month='{$_POST['month']}'";
      $row = $obj2->delete_data($sql);
   }
   echo json_encode($arr);
?>