$(document).ready(function(){
    function check_empty(id){
        bool=true;
        var input =document.getElementById(id);
        if(input.value.trim()==""){
            bool= false;
        }
        return bool;
    }
    function seterror(id,errMsg){
       var ele =document.getElementById(id);
       var span =ele.getElementsByClassName('status')[0];
       span.innerHTML=errMsg;
    }
    // function hideerr()
    $('#cpass_btn').click(function(){
        if($(this).is(":checked")){
            $("#cp_form").on('submit',function(e){
                e.preventDefault();
                var ccpass = true;
                var cnewpass = true;
                var crenewpass = true;
                var cpass = $("#cpass").val();
                var newpass = $("#newpass").val();
                var renewpass = $("#renewpass").val();
                if(!check_empty("cpass")){
                    seterror("currentPass","current password field must be filled");
                    ccpass = false;
                }else{
                    seterror("currentPass",""); 
                }
                $("#cpass").on('keydown',function(){
                    seterror("currentPass","");
                });
                if(!check_empty("newpass")){
                    seterror("newpassword"," newpassword field must be filled");
                    cnewpass = false;
                }else if(newpass != "" && newpass.length <=8){
                    seterror("newpassword"," newpassword  must be at least 8 digits");
                    cnewpass = false;
                }else{
                    seterror("newpassword","");
                }
                $("#newpass").on('keydown',function(){
                    seterror("newpassword","");
                });
               if(!check_empty("renewpass")){
                    seterror("renewpassword"," renewpassword field must be filled");
                    crenewpass = false;
                }else{
                    seterror("renewpassword","");
                }
                $("#renewpass").on('keydown',function(){
                    seterror("renewpassword","");
                });
                if(ccpass ==true && cnewpass==true && crenewpass==true){
                   
                    if(newpass == renewpass){
                        // alert("mathed"); 
                        $.ajax({
                                    url : '../ajaxfile/change_password.php',
                                    data : {cpass:$("#cpass").val(),newpass:$("#renewpass").val(),regno:$("#regno").text()},
                                    type : 'POST',
                                    success : function(data){
                                    console.log(data); 
                                    if(data=="updated"){
                                        alert("password updated succesfully");
                                        window.location.href="logout.php";
                                    }else{
                                        seterror("currentPass","current password doesnot matched!"); 
                                    }
                                    }
                                });
                    }else{
                        seterror("renewpassword","renewpassword doesnot matched"); 
                    }
                }
            });
        }
    });
});