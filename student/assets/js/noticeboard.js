$(document).ready(function(){
    get_data();
    $("#date_form").on('submit',(e)=>{
        e.preventDefault();
        var date =$("#search_bar").val();
        // alert(date);
        get_data(date);
        $("#noti_bdy").show();
        $("#his_bdy").hide();
    });
    $("#history").on('click',(e)=>{
        e.preventDefault();
        $("#noti_bdy").hide();
        $("#his_bdy").show();
        // alert('this is the history?? page');
        get_history();
    });
    function get_data(date=""){
        $.ajax({
            url : '../ajaxfile/noticeboard.php',
            data : {status:"fetch",date:date},
            type : 'POST',
            success : function(data){
            var data=JSON.parse(data);
            // console.log(data);
                if(data.err == "false"){
                    $("#noti_bdy").html("<p> There is no NOtice to show!!! or NOtice has not posted</p>");
                    $(".date").html("");
                    $(".writter").html("");
                    $(".time").html("");
                }else{
                    outhtml(data.data);
                    $("#his_bdy").hide();
                }
            }
        });
    }
    function outhtml(data){
        for(var i=0;i<data.length;i++){
            $("#noti_bdy").html(data[i].notice);
            $(".date").html("Date : "+ data[i].date);
            $(".writter").html("Writter : "+data[i].writter);
            $(".time").html("Time : "+data[i].time);
        }
    }
    function get_history(){
        $.ajax({
            url : '../ajaxfile/noticeboard.php',
            data : {status:"history"},
            type : 'POST',
            success : function(data){
            var data=JSON.parse(data);
            console.log(data);
                if(data.err == "false"){
                    $("#noti_bdy").html("<p> There is no NOtice to show!!! or NOtice has not posted</p>");
                }else{
                   historyHtml(data.data);
                }
            }
        });
    }
    function historyHtml(data){
        var body="";
        for(var i=0;i<data.length;i++){
            body+='<div class="his">'+data[i].notice;
            body+='<div class="datetime">';
            body+='<h3> Date : '+data[i].date+'</h3>';
            body+='<h3> Writter : '+data[i].writter+'</h3>';
            body+='<h3> Time : '+data[i].time+'</h3>';
            body+='</div></div>';
        }
        $("#his_bdy").html(body);
        $(".date").html("");
        $(".writter").html("");
        $(".time").html("");
        $("#search_bar").val("");
    }
});