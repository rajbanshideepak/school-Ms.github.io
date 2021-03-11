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
   // insert the second year fee into the database 
   else if(isset($_POST['status']) && $_POST['status']=="firstyearfee"){
      // print_r($_POST);
      $con =array("faculty"=>"{$_POST['f_name']}","course"=>"{$_POST['c_name']}");
      $fetch=$obj->get_data("firstyearfee",'*',$con);
      if(isset($fetch[0])){
         $arr['already']="true";
      }else{
         $arry =array("faculty"=>"{$_POST['f_name']}","course"=>"{$_POST['c_name']}","totalFee"=>"{$_POST['amount']}");
         $row =$obj->insert2_data("firstyearfee",$arry);
         if($row){
            $arr['done']="true";
         }else{
            $arr['wrong']="true"; 
         }
      }
   }
   // This is query for the fee for second year 
   else if(isset($_POST['status']) && $_POST['status']=="secondyearfee"){
      // print_r($_POST);
      $con =array("faculty"=>"{$_POST['f_name']}","course"=>"{$_POST['c_name']}");
      $fetch=$obj->get_data("secyearfee",'*',$con);
      if(isset($fetch[0])){
         $arr['already']="true";
      }else{
         $arry =array("faculty"=>"{$_POST['f_name']}","course"=>"{$_POST['c_name']}","totalFee"=>"{$_POST['amount']}");
         $row =$obj->insert2_data("secyearfee",$arry);
         if($row){
            $arr['done']="true";
         }else{
            $arr['wrong']="true"; 
         }
      }
   }
   // ----------------------
   // fetch first year and second year fee data form database 
   else if(isset($_POST['status']) && $_POST['status']=="fetch"){
      // print_r($_POST);
      $table = $_POST['table'];
      $data=$obj->get_data($table,'*');
      if(isset($data[0])){
         $arr['data']=$data;
      }else{
         $arr['wrong']="true"; 
      }
   }
   // delete 
   else if(isset($_POST['status']) && $_POST['status']=="f_delete"){
      $data=$obj->delete_data('firstyearfee',"fyid","{$_POST['id']}");
   }
   else if(isset($_POST['status']) && $_POST['status']=="s_delete"){
      $data=$obj->delete_data('secyearfee',"syid","{$_POST['id']}");
   }
   // edit the fee management
   else if(isset($_POST['status']) && $_POST['status']=="f_edit"){
      // print_r($_POST);
      $condition =array("fyid"=>"{$_POST['id']}");
      $row =$obj->get_data("firstyearfee","*",$condition);
      if(isset($row[0])){
         $arr['data']=$row;
      }
   }
   echo json_encode($arr);
?>