$(document).ready(function(){
    var regno =$("#regno").val();
    var tbody =$("#aten_data");
    get_data();
    function get_data(){
        $.ajax({
            url : '../ajaxfile/attendance.php',
            data : {regno:regno,status:"fetch"},
            type : 'POST',
            success : function(data){
                console.log(data);
            var data=JSON.parse(data);
            var i,len;
            len=data.length;
                var rows='';
                for(i=0;i<len;i++){
                    rows = rows + '<tr>';
                    rows = rows + '<td>' + (i+1) + '</td>';
                    rows = rows + '<td>' + data[i].regno + '</td>';
                    rows = rows + '<td>' + data[i].date + '</td>';
                    rows = rows + '<td>' + data[i].time + '</td>';
                    rows = rows + '</tr>';
                }
                $("#aten_data").html(rows);
            }
        });
    }
    function check_empty(id){
        bool=true;
        var input =document.getElementById(id);
        if(input.value.trim()==""){
            bool= false;
        }
        return bool;
    }
    function seterror(id,errMsg,status=""){
       var ele =document.getElementById(id);
       var span =ele.getElementsByClassName('status1')[0];
       span.innerHTML=errMsg;
       if(status !="" && status== "success"){
           span.style.color="green";
       }else if(status !="" && status== "error"){
        span.style.color="rgb(172, 45, 45)";
       }
    }

    $("#aten_form").on('submit',(e)=>{
        e.preventDefault();
        var status=true;
        var inpregno =$("#aten").val();
        var inpfac =$("#faculty").val();
        var regno =$("#regno").val();
        if(!check_empty("aten")){
            seterror("error","Please enter your register number","error");
            setTimeout(()=>{
                seterror("error","");
               },5000);
            status=false;
        }
        $("#aten").on('keydown',function(){
            seterror("error","");
        });
        if(status ==true){
            $.ajax({
                url : '../ajaxfile/attendance.php',
                data : {regno:regno,inpregno:inpregno,inpfac:inpfac,status:"insert"},
                type : 'POST',
                success : function(data){
                    console.log(data); 
                    if(data=="inserted"){
                        seterror("error","Attended successfully!","success");
                        setTimeout(()=>{
                            seterror("error","");
                        },5000);
                        $("#aten").val("");
                    }
                    else if(data=="not found"){
                        seterror("error","Register number does not matched!","error");
                        setTimeout(()=>{
                            seterror("error","");
                        },5000); 
                        $("#aten").val("");
                    }
                    get_data();
                }
            });
        }
    });
});