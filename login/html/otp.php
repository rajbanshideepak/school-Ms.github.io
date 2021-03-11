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
        <!-- -------------------------------------------------------------- -->
        <!-- otp form starts here -->
        <div id="otp_form1">
            <form action="../php/process.php" id="forgetOtp" method="post">
                <div class="email_form">
                    <?php if (isset($msg)) { ?>
                    <div class="success" style="color:green">
                        <?php echo $msg; ?>
                    </div>
                    <?php } ?>

                    <label for="otp">確認コード ：</label><br>
                    <input type="text" class="form_input" name="otp" id="otp" placeholder="確認コードを入力してください。">
                </div>
                <?php if (isset($error)) { ?>
                <div class="error">
                    <?php echo $error; ?>
                </div>
                <?php } ?>
                <div class="email_btn">
                    <input type="submit" class="form_btn" value="次" id="next_btn" name="sub">
                </div>
            </form>
        </div>
        <!-- otp forms ends here -->
    </div>
</body>

</html>
</body>

</html>