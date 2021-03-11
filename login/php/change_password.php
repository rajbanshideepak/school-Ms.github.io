<?php
session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1=new sfunction();
$obj=new query();
// query object end--------------
if(isset($_POST['chng_btn'])){
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    if($password===$repassword){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $condi_array = array("pass" => "{$hashPass}");
            $row = $obj->update_data("user", $condi_array, "eMail", $_SESSION['email']);
            redirect("../../index.php?red=registerOk");
    }else{
        $_SESSION['error']="Repassword does not matched try again";
        require_once("../html/change_password.php");
    }
}else{
    redirect("../html/change_password.php");
}



?>