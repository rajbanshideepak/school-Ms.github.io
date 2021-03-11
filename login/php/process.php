<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if (!$_POST) {
    require_once("../html/login.php");
} else if (isset($_POST['log'])) {
    $urlstatus = $obj1->get_safe_value($_POST['status']);
    $email = $obj1->get_safe_value($_POST['eMail']);
    $pass = $obj1->get_safe_value($_POST['pass']);

    $condi_array = array("eMail" => "{$email}");
    $row = $obj->get_data("user", "", $condi_array);

    if (isset($row[0])) {
        //  check hash password 
        if ($pass = password_verify($pass, $row[0]['pass']) && $row[0]['otp'] == "" && $row[0]['flag'] == "0") {
            session_start();
            if($row[0]['status'] == $urlstatus){

                $_SESSION["status"] = $row[0]['status'];
                $_SESSION['email'] = $row[0]['eMail'];
                $_SESSION['pass'] = $_POST['pass'];
                $_SESSION['regno'] = $row[0]['regno'];
                $_SESSION['Islogin'] = "yes";
                if (($row[0]['status'] == "teacher" && $row[0]['status'] == $urlstatus)) {
                        // rem
                        if (isset($_POST['remem'])) {
                            setcookie("temail", $row[0]['eMail'], time() + 60 * 60 * 24 * 365, "/");
                        } else {
                            setcookie("temail", $row[0]['eMail'], time() - 60 * 60 * 24 * 366, "/");
                        }
                        // end rem
                    
                    redirect("../../teacher/php/dashboard.php");
                }else if(($row[0]['status'] == "admin"  && $row[0]['status'] == $urlstatus)){
                    // rem
                    if (isset($_POST['remem'])) {
                        setcookie("aemail", $row[0]['eMail'], time() + 60 * 60 * 24 * 365, "/");
                    } else {
                        setcookie("aemail", $row[0]['eMail'], time() - 60 * 60 * 24 * 366, "/");
                    }
                    // end rem
                    redirect("../../teacher/php/dashboard.php");
                } else if ($row[0]['status'] == "student" && $row[0]['status'] == $urlstatus) {
                    // rem
                    if (isset($_POST['remem'])) {
                        setcookie("semail", $row[0]['eMail'], time() + 60 * 60 * 24 * 365, "/");
                    } else {
                        setcookie("semail", $row[0]['eMail'], time() - 60 * 60 * 24 * 366, "/");
                    }
                    // end rem
                    redirect("../../student/php/home");
                } 

            }else {
                redirect("../../index.php?red=illegal");
            }
        } else {

            // $error = "メールアドレスまたはパスワードを間違っています。";
            redirect("../html/login.php?status={$urlstatus}&&error=error");
        }
    }else{
        redirect("../html/login.php?status={$urlstatus}&&error=error");
    }

} else if (isset($_POST['username_check'])) {
    $stat = $obj1->get_safe_value($_POST["stat"]);
    $username = $obj1->get_safe_value($_POST["username"]);
    $condi_array = array("regno" => "{$username}");
    $table = "";
    if ($stat == "student") {
        $table = "studentpf";
    } elseif ($stat == "teacher") {
        $table = "teacherpf";
    }
    $row = $obj->get_data($table, "", $condi_array);
    if (isset($row[0])) {
        echo "exist";
    } else {
        echo "available";
    }
} else if (isset($_POST["email_check"])) {
    $email = $obj1->get_safe_value($_POST["email"]);
    $condi_array = array("eMail" => "{$email}");
    $row = $obj->get_data("user", "", $condi_array);
    if (isset($row[0])) {
        echo "exist";
    } else {
        echo "available";
    }
} else if (isset($_POST['reg'])) {
    $status = $obj1->get_safe_value($_POST['status']);
    $userName = $obj1->get_safe_value($_POST['username']);
    $regeMail = $obj1->get_safe_value($_POST['email']);
    $regpass = $obj1->get_safe_value($_POST['pass']);
    $hashPass = password_hash($regpass, PASSWORD_DEFAULT);
    $date = get_date();
    $otp = get_otp(5);
    mb_language("uni");
    mb_internal_encoding("UTF-8");
    $subject = "OTP確認";
    $message = "OTPは" . $otp . "です。";
    $mailFrom = "From: ADMIN<admin@sms.com>\r\n";
    if (mb_send_mail($regeMail, $subject, $message, $mailFrom)) {
        $obj->insert_data(
            "user",
            "regno,eMail,pass,status,otp,regDate,otpDate",
            "$userName,$regeMail,$hashPass,$status,$otp,$date,$date"
        );
        echo "saved";
    }
} else if (isset($_POST["sub"])) {
    $otp = $obj1->get_safe_value($_POST["otp"]);
    $condi_array = array("otp" => "{$otp}");
    $row = $obj->get_data("user", "", $condi_array);
    if (isset($row[0])) {
        $date = get_date();
        $timeOut = (strtotime($date) - strtotime($row[0]["otpDate"]));
        if ($timeOut < 60) {
            $condi_array = array("otp" => "", "otpDate" => "");
            // update user set opt="$otp" date="" where otp=$opt;
            $row = $obj->update_data("user", $condi_array, "otp", $otp);
            redirect("../../index.php?red=registerOk");
        } else {
            $row = $obj->delete_data("user", "otp", $otp);
            redirect("../../index.php?red=otpTimeOut");
        }
    } else {
        $error = ("OTPが間違っています。もう一度入力してください。");
        require_once("../html/otp.php");
    }
}
