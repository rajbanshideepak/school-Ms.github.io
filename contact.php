<?php
session_start();
include_once("database/db.php");
date_default_timezone_set("Asia/Tokyo");
$obj=new query();
// echo "hello";
if(isset($_POST['send'])){ 
    // print_r($_POST);
    $email=$_POST['email'];
    $massege=$_POST['massage'];
    $date =date('Y-m-d');
    $time =date('h:i:s');
    $condi_arr=array("email"=>"{$email}","message"=>"{$massege}","date"=>"{$date}","time"=>"{$time}");
    $result =$obj->insert2_data("contact",$condi_arr);
    // die($result);
    if($result){
        $_SESSION['msg']="message sent successfully.\n\n response will send to your eMail";
        echo "<script>alert('message sent successfully.\n\n response will send to your eMail')</script>";
        header("location:contact.php");
    }else{
        echo "<script>alert('message sent failed')</script>";
        header("location:contact.php");
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="asset/image/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <title>School Management system</title>
</head>
<body>
    <div class="cont">
        <div class="main">
            <h3>Enter YOur Details</h3>
            <div class="row">
                <form action="contact.php" method="post" autocomplete="off">
                    <div class="email_input">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" placeholder="Enter your Email address" required>
                    </div>
                    <div class="msg_input">
                        <label for="msg">Massege</label>
                        <textarea name="massage" id="msg" cols="30" rows="5" placeholder="Type here to massege..."></textarea>
                    </div>
                    <div class="btn_input">
                        <input type="submit" value="Send" name="send" id="submit">
                    </div>
                    <div class="btn_input">
                        <input type="button" value="cancel" name="cancel" id="cancel" onclick="window.location.href='index.php'">
                    </div>
                </form>
            </div>
            <?php  if(isset($_SESSION['msg'])){ 
                echo $_SESSION['msg']; 
             } ?>
        </div>
    </div>
    <script>
        var textarea_field=document.getElementById("msg");
        var btn = document.getElementById("submit");
        btn.style.display="none";
        textarea_field.addEventListener("input",()=>{ 
            if(textarea_field.value.trim()=="" || textarea_field.value.trim().length <= 5){
            btn.style.display="none";
            }else if(textarea_field.value.trim().length >= 5){
                btn.style.display='block';
            }
        },false);
    </script>
</body>
</html>