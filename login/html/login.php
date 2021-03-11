<?php
session_start();
 $cokEmail = "";
 $checked = "";

 if(isset($_SESSION['Islogin']) && $_SESSION['Islogin']= "yes" && $_SESSION["status"]){
     echo $_SESSION["status"];
     if($_SESSION["status"]=='teacher' || $_SESSION["status"]=='admin' ){
        header("location:../../teacher/php/dashboard.php");
     }else{
        header("location:../../student/php/home.php");
     }  
 }
if(isset($_GET['status'])){
    if($_GET['status']=='teacher'){ 
        if (isset($_COOKIE['temail'])) {
            $cokEmail = $_COOKIE['temail'];
            $checked = "checked";
        }
    }else if($_GET['status']=='student'){ 
        if (isset($_COOKIE['semail'])) {
            $cokEmail = $_COOKIE['semail'];
            $checked = "checked";
        }
    }else if($_GET['status']=='admin'){ 
        if (isset($_COOKIE['aemail'])) {
            $cokEmail = $_COOKIE['aemail'];
            $checked = "checked";
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>sms Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>

    <!--form area start-->
    <div class="form">
        <!--login form start-->
        <form class="login-form" action="../php/process.php" method="post">
            <i class="fas fa-user-circle"></i>
            <input class="user-input" type="hidden" name="status" value="<?php echo $_GET['status'] ?>">
            <input class="user-input" type="email" name="eMail" placeholder="Email" value="<?php echo $cokEmail ?>" required>
            <input class="user-input" type="password" name="pass" placeholder="Password" value="" required>
            <div class="options-01">
                <label class="remember-me"><input type="checkbox" name="remem" <?php echo $checked; ?>>Remember
                    me</label>
                <a href="../html/forget_password.php">Forgot your password?</a>
            </div>
            <?php if (isset($_GET['error'])) { ?>
                <div class="error">
                    <p><?php echo $error = "メールアドレスまたはパスワードを間違っています。"; ?></p>
                </div>
            <?php } ?>
            <input class="btn" type="submit" name="log" value="LOGIN">
            <div class="options-02">
                <p><a href="../../index.php"> Back </a> Or Not Registered? <a href="#form2">Create an Account</a></p>
            </div>
        </form>
        <!--login form end-->
        <!--signup form start-->
        <form class="signup-form" id="form2">
            <i class="fas fa-user-plus"></i>
            <input class="user-input" type="hidden" name="status" id="stat" value="<?php echo $_GET['status'] ?>">
            <input class="user-input" type="text" name="userName" id="userName" placeholder="Registration ID" required>
            <span id="userNameMsg"></span>
            <input class="user-input" type="email" name="regeMail" id="regeMail" placeholder="tarou@sms.com" required>
            <span id="emailMsg"></span>
            <input class="user-input" type="password" name="regpass" id="regpass" placeholder="Password" required>
            <span id="passMsg"></span>
            <input class="btn" type="button" name="reg" id="regbtn" value="SIGN UP">
            <div class="options-02">
                <p>Already Registered? <a href="#">Sign In</a></p>
            </div>
        </form>
        <!--signup form end-->
    </div>
    <!--form area end-->

    <script src="../js/registration_validation.js"></script>
    <script type="text/javascript">
        $('.options-02 a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script>

</body>

</html>