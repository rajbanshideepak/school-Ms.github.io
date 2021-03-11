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

<body">
    <div class="wrapper">
        <!-- email form -->
        <div id="mail_form">
            <form  id="forgetEmail">
                <div class="email_form">
                    <label for="email">メールアドレス ：</label><br>
                    <input type="email" class="form_input" name="femail" id="femail" placeholder="メールアドレスを入力してください。">
                    <br/>
                </div>
                <div class="error">
                     <span id="femailError"></span>
                </div>
                <div class="email_btn">
                <input type="submit" class="form_btn" value="検索" id="search_btn">
                </div>
            </form>
        </div>
        <!-- email form ends here -->
        <!-- -------------------------------------------------------------- -->
        <!-- otp form starts here -->
        <div id="otp_form">
            <form id="forgetOtp" >
                <div class="email_form" >
                    <label for="otp">確認コード ：</label><br>
                    <input type="text" class="form_input" name="otp" id="otp" placeholder="確認コードを入力してください。">
                </div>
                <div class="error">
                     <span id="femailError1"></span>
                </div>
                <div class="email_btn">
                <input type="submit" class="form_btn" value="次" id="next_btn">
                </div>
            </form>
        </div>
        <!-- otp forms ends here -->
    </div>
    <script src="../js/forget_password.js"></script>
</body>

</html>
</body>
</html>