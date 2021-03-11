
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
    <div class="wrapper">
        <!-- email form -->
        <div id="change_password">
            <form action="../php/change_password.php" method="post">
                <div class="email_form">
                    <label for="password">新パスワード ：</label><br>
                    <input type="password" class="form_input" name="password" id="password" placeholder="新パスワードを入力してください。">
                </div>
                <div class="email_form">
                    <label for="password">もう一度パスワード ：</label><br>
                    <input type="password" class="form_input" name="repassword" id="password" placeholder="もう一度パスワード を入力してください。">
                </div>
                <?php if(isset($_SESSION['error'])){?>
                <div class="error">
                        <p><?php echo  $_SESSION['error']; ?> <p>
                </div>
                <?php } ?>
                <div class="email_btn">
                <input type="submit" class="form_btn" name="chng_btn" value="送信" id="send_btn">
                </div>
            </form>
        </div>
        <!-- email form ends here -->
    </div>
</body>

</html>