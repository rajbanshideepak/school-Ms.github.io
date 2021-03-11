window.addEventListener("load",()=>{
    let emailForm=document.getElementById("forgetEmail");
    emailForm.addEventListener("submit",forgetEmail,false);

    function change(){
        // alert("clicked");
        var mail_Form=document.getElementById('mail_form');
        var otp_Form=document.getElementById('otp_form');
        mail_Form.style.display="none";
        otp_Form.style.display="block";
    }

    function forgetEmail(e){
        e.preventDefault();
        // alert("clecked");
        let emailField=document.getElementById("femail");
        let email=emailField.value;
        let emailError=document.getElementById("femailError");
        let emailError1=document.getElementById("femailError1");
        emailError.innerHTML="please wait...";
        if(email==""){
            emailError.innerHTML="<b style='green'>Filed should not be empty!!</b>";
        }else{
        var data="femail="+email;
            $.ajax({
                url: "../ajaxfile/forget_password.php?",
                type:"post",
                data:data,
                success:function(data){
                   
                   if(data=="send"){
                    // console.log("mail send");
                    emailError1.innerHTML="<b style='green'>メール確認のためOTPをメールで送信しました。</b>";
                    change();
                   }
                   else if(data=="notsend"){
                    // console.log("mail not send");
                    emailError.innerHTML="<b style='red'>OTPをメールで送信出来なかった。</b>";
                    emailField.value="";
                   }
                   else{
                    // console.log("no email matchedd");
                    emailError.innerHTML="<b style='red'>メールアドレスを間違ってます。</b>";
                    emailField.value="";
                   }
                }
            });
        }
    }
    // opt functions start form here
    let otpform=document.getElementById("forgetOtp");
    otpform.addEventListener("submit",otpfun,false);  
    function otpfun(e){
                e.preventDefault();
                let emailError1=document.getElementById("femailError1");
                // alert("otp is clicked");
                let otpfield=document.getElementById("otp");
                let otp=otpfield.value;
                if(otp==""){
                    emailError1.innerHTML="<b style='green'>Filed should not be empty!!</b>";
                }else{
                var data="otp="+otp;
                    $.ajax({
                        url: "../ajaxfile/forget_password.php?",
                        type:"post",
                        data:data,
                        success:function(data){
                            if(data=="true"){
                                window.location.href="../html/change_password.php";
                            }else if(data == "timeOut"){
                                window.location.href="../../index.php?red=otpTimeOut";
                            } else{
                                // console.log("no email matchedd");
                                emailError1.innerHTML=data;
                                emailField.value="";
                            }
                        }
                    });
                }
         }  
    
    
},false);
window.onbeforeunload=function(){
    return "are sure to change the tabs";
}

