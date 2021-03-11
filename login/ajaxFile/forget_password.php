<?php
session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1=new sfunction();
$obj=new query();
// query object end--------------
if(isset($_POST['femail'])){
     $femail=$obj1->get_safe_value($_POST['femail']);
     $condi_array = array("eMail"=>"{$femail}");

     $row=$obj->get_data("user","",$condi_array);
    //  select * form user where eMail="$femail";
    
    if(isset($row[0])){
            $date = get_date();
            $otp = get_otp(5);
            // send mail to the email
            mb_language("uni");
            mb_internal_encoding("UTF-8");
            $subject = "OTP確認";
            $message = "OTPは" . $otp . "です。";
            $mailFrom = "From: ADMIN<admin@sms.com>\r\n";
            if (mb_send_mail($femail, $subject, $message, $mailFrom)) {
                $condi_array1 = array("otp"=>"{$otp}","otpDate"=>"{$date}");
                $obj->update_data("user",$condi_array1,"eMail",$femail);
                $_SESSION['email']=$femail;
            echo $status="send";
            }else{
                echo $status="notsend"; 
            }
        // send mail end here 
        
        // echo $status=$otp;
     }else{
         echo $status = "メールアドレスを間違ってます。";
     }

}else{
    $otp =$_POST['otp'];
    $femail=$obj1->get_safe_value($_POST['otp']);
    $condi_array = array("otp"=>"{$otp}");

    $row=$obj->get_data("user","",$condi_array);
   //  select * form user where eMail="$femail";
   
   if(isset($row[0])){ 
        $date = get_date();
        $timeOut = (strtotime($date) - strtotime($row[0]["otpDate"]));
        if ($timeOut < 60) {
            $condi_array = array("otp" => "", "otpDate" => "");
            // update user set opt="$otp" date="" where otp=$opt;
            $row = $obj->update_data("user", $condi_array, "otp", $otp);
            echo $status="true";
            
        } else {
            $condi_array = array("otp" => "", "otpDate" => "");
            $row = $obj->update_data("user", $condi_array, "otp", $otp);
            echo $status="timeOut";
        }  
    }else{
        echo $status = "確認を間違っています。";
    }
}

?>