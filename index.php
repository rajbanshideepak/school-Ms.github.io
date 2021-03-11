<?php
session_start();
if(isset($_SESSION['Islogin']) && $_SESSION['Islogin']= "yes" && $_SESSION["status"]){
    echo $_SESSION["status"];
    if($_SESSION["status"]=='teacher' || $_SESSION["status"]=='admin' ){
       header("location:teacher/php/dashboard.php");
    }else{
       header("location:student/php/home.php");
    }  
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>School Management system</title>
    <link rel="shortcut icon" href="asset/image/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="asset/image/logo_school.png" alt="" srcset="" width="40px" height="40px">
            </div>
            <div class="logo_content">School Management system</div>
            <div class="contact_btn"><i class="fas fa-user-circle"></i> <a href="contact.php"> contact</a></div>
        </nav>
        <section>
            <h3>
                <marquee behavior="" direction="">click the click me button to log in to your panel</marquee>
            </h3>
            <div class="card_box">

                <div class="card">
                    <h4 class="card_header">Panel</h4>
                    <h1 class="card_body">Admin</h1>
                    <p class="card_footer"><a href="login/php/process.php?status=admin&&">Click me</a></p>
                </div>
                <div class="card">
                    <h4 class="card_header">Panel</h4>
                    <h1 class="card_body">teacher</h1>
                    <p class="card_footer"><a href="login/php/process.php?status=teacher&&">Click me</a></p>
                </div>
                <div class="card">
                    <h4 class="card_header">Panel</h4>
                    <h1 class="card_body">student</h1>
                    <p class="card_footer"><a href="login/php/process.php?status=student&&">Click me</a></p>
                </div>

            </div>
        </section>
    </header>
</body>

</html>
<?php
if (isset($_GET['red'])) {
?>
<script>
var err = "<?php echo $_GET['red'] ?>";
var link = "index.php";
console.log(err);
if (err == "registerOk") {
    swal({
        title: "登録終了",
        text: "登録できました。",
        icon: "success",
        button: "ログインお願い。",
    }).then((value) => {
        if (value == true || value == null) {
            window.location = link;
        }
    });
} else if (err == "otpTimeOut") {
    swal({
        title: "OTP失敗",
        text: "OTP入力時間きれました。",
        icon: "error",
        button: "またお願い。",
    }).then((value) => {
        if (value == true || value == null) {
            window.location = link;
        }
    });
} else if (err == "registered") {
    swal({
        title: "登録違",
        text: "メールアドレスは既に存在します。 別の方法を試してください。",
        icon: "error",
        button: "またお願い。",
    }).then((value) => {
        if (value == true || value == null) {
            window.location = link;
        }
    });
}
else if (err == "illegal") {
    swal({
        title: "危険物",
        text: "危険物　危険物　危険物　危険物。",
        icon: "error",
        button: "またお願い。",
    }).then((value) => {
        if (value == true || value == null) {
            window.location = link;
        }
    });
}
</script>
<?php
}
?>