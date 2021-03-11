$(document).ready(function(){
    // function to set the error in the span 
    function seterror(div,msg,status){
        var ele=document.getElementById(div);
        var span=ele.getElementsByTagName('span')[0];
        if(status =="error"){
            span.style.color="#850a0a";
        }else if(status =="success"){
            span.style.color="green";
        }
        span.innerHTML=msg;
    }
    // action when the submit button is clicked

    // --------- all the DOM target HTML-------------
    var ques_no=1;
    var score =0;
    var mistake =0;
    var not_attem=0;
    var link =document.getElementById('lnk');
    var submit_btn = document.getElementById('catpo_btn');
    var select_field = document.getElementById('catpo');
    // for DOM of question and Answer field====
    var questionHTML =document.getElementById('question');
    // var answerHTML = document.getElementsByClassName('opt');
    var total = document.getElementById('total');
    // var timerHTML =document.getElementById('timer');
    // --------- all the DOM target HTML end-------------
    submit_btn.addEventListener('click',get_val,false);
    // functin for getting value from the input field
    function get_val(){
        if(select_field.value !=""){
            // console.log(select_field.value);
            var val =select_field.value;
            $.ajax({
                url:"../ajaxfile/exam.php",
                type:"post",
                data:{subject:val,sn:ques_no,status:"first"},
                success:function(data){
                    // console.log(data);
                    submit_btn.style.background="rgb(106 106 116)";
                    submit_btn.disabled=true;
                    link.innerHTML=val;
                    var data = JSON.parse(data);
                    managehtml(data);
                    clickhandle(data);
                    setTimer(data.question.time,data)
                }
            });
        }else{
            seterror("err","please select exam catagory!!","error");
            setTimeout(() => {
                seterror("err","","");
            }, 5000);
        }
        select_field.addEventListener('change',()=>{seterror("err","","");},false);
    }
    function getnext(ques_no){
        //  console.log(ques_no);
        var val =select_field.value;
        $.ajax({
            url:"../ajaxfile/exam.php",
            type:"post",
            data:{subject:val,sn:ques_no,status:"first"},
            success:function(data){
                var data= JSON.parse(data);
                console.log(data);
                managehtml(data);
                clickhandle(data);
                nextTimer(data.question.time,data);
            }
        });
    }
    var ans =document.getElementsByClassName('answers')[0];
    function managehtml(data){
        // console.log(data.question.time);
        if(data.error != "false"){
            total.innerHTML=data.question.sn+"/"+"<b id='tq'>"+data.total_question+"</b>";
            questionHTML.innerHTML=data.question.sn +"). "+data.question.question;
            // console.log(answerHTML.length)
            var btns="";
            for(var i=0;i<data.answer.length;i++){
                btns+='<button id="" class="btn-primary opt" value="">'+data.answer[i].answer+'</button>';
            }
            ans.innerHTML=btns;
        }else{
            questionHTML.innerHTML="sorry Exam is not Created Or NO more Questions";
            var sry =["すみません。","試験は","まだ作成","してないです。"];
            var btns="";
            for(var i=0;i<4;i++){
                btns+='<button id="" class="btn-primary opt" value="">'+sry[i]+'</button>';
            }
            ans.innerHTML=btns;
                submit_btn.style.background="";
                submit_btn.disabled=false;
        }
        
    }
    var cbtn =document.getElementsByClassName('opt');
    function clickhandle(data){
        // action after the answer button is clicked 
        for(var i=0;i<cbtn.length;i++){
            cbtn[i].addEventListener("click",exam,false);
        }
        function exam(e){
           e.preventDefault();
           if(e.target.innerText == data.question.correct_ans){
                alert("正解");
                // swal({
                //     title: "Correct",
                //     text: "正解",
                //     icon: "success",
                //     button: "次",
                // })
                score++;
           }else{
                alert("不正解");
                // swal({
                //     title: "Wrong",
                //     text: "不正解",
                //     icon: "success",
                //     button: "次",
                // })
                mistake++;
           }
           ques_no++;
            var total_q = document.getElementById('tq').innerText;
            if(ques_no > total_q){
                // console.log("exam finished");
                // console.log("socore :"+score);
                // console.log("socore :"+mistake);
                // console.log("socore :"+not_attem);
                // console.log("socore :"+total_q)
                // console.log("subject :"+select_field.value);
                result="score="+score+"&& mistake="+mistake+"&& not_attem="+not_attem+"&& total_q="+total_q+"&& subject="+select_field.value;
                // alert("finised ");
                submit_btn.style.background="";
                submit_btn.disabled=false;
                ques_no=1;
                clearInterval(timer);
                window.location.href="quizResult?"+result;
            }else{
                getnext(ques_no);
            }   
        }
        
    }
    var timer="";
    function setTimer(min,data){
        var min =min-1;
        var sec =60;
			timer=setInterval(()=>{
				document.getElementById('timer').innerHTML=min+":"+sec;
				sec--
				if(sec == -1){
                    sec=60;
                    if(min== 0){ 
                    clearInterval(timer);
                        ques_no++;
                        if(ques_no <= data.total_question){
                            getnext(ques_no);
                            console.log(data);
                        }else{
                            // alert("finised socore :"+score);
                            console.log("socore :"+score);
                            submit_btn.style.background="";
                            submit_btn.disabled=false;
                            ques_no=1;
                            clearInterval(timer);
                            result="score="+score+"&& mistake="+mistake+"&& not_attem="+not_attem+"&& total_q="+data.total_question+"&& subject="+select_field.value;
                            window.location.href="quizResult?"+result;
                        }
                    }
				}
			},1000)	
    }
    function nextTimer(tm,data){
        clearInterval(timer);
        setTimer(tm,data);
    }
});