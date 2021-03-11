$(document).ready(function(){
    var regno =$("#regno").val();
    var tbody =$("#aten_data");
    var date =new Date();
   
    get_data("","");
    function get_data(year="",month=""){
        var tyear=date.getFullYear();
        var tmonth =date.getMonth();
        if(year !="" && month !=""){
            $.ajax({
                url : '../ajaxfile/result.php',
                data : {regno:regno,year:year,month:month,status:"fetch"},
                type : 'POST',
                success : function(data){
                console.log(data);
                if(data != "nodata"){
                    var data=JSON.parse(data);
                    var i,len;
                    len=data.length;
                        var rows='';
                        var per=0;
                        for(i=0;i<len;i++){
                            rows = rows + '<tr>';
                            rows = rows + '<td>' + (i+1) + '</td>';
                            rows = rows + '<td>' + data[i].subject + '</td>';
                            rows = rows + '<td>' + data[i].fullMark + '</td>';
                            rows = rows + '<td>' + data[i].passMark + '</td>';
                            rows = rows + '<td>' + data[i].score + '</td>';
                            rows = rows + '<td>' + data[i].percent + '</td>';
                            rows = rows + '</tr>';
                            per=per+parseFloat(data[i].percent);     
                        }
                        rows = rows + '<tr><td colspan="6" style="text-align:center;color:lightgreen;"></td></tr>'
                            rows =rows + '<tr><td colspan="5" style="text-align:center;color:yellow;">Total percent</td>'
                            rows =rows + '<td style="color:#22f1fa;font-size: 23px;">'+per+"%"+'</td>';
                            rows =rows + '</tr>';
                            var res="";
                            if(per < 60){
                                res="Failed";
                                styl='style="text-align:center;color:#aa0505;font-size: 23px;"';
                            }else if(per >= 80){
                                res="Distinction";
                                styl='style="text-align:center;color:lightgreen;font-size: 23px;"';
                            }else if(per >=60 && per < 80){
                                res="Passed";
                                styl='style="text-align:center;color:#0ac70a;font-size: 23px;"';
                            }
                            rows =rows + '<tr><td colspan="6"'+styl+'>'+res+'</td></tr>'
                        $("#result_data").html(rows);
                    }else{
                        $("#result_data").html('<tr><td colspan="6" style="text-align:center;color:#aa0505;">No Result Found</td></tr>');  
                    }
                }
            });
        }
        else{
            this.year=tyear;
            this.month=tmonth+1;
            var yrt=this.year+"/"+this.month;
            $("#yrmnt").text(yrt);
            // console.log(this.month);
            $.ajax({
                url : '../ajaxfile/result.php',
                data : {regno:regno,year:this.year,month:this.month,status:"fetch"},
                type : 'POST',
                success : function(data){
                    console.log(data);
                    if(data !='nodata'){
                var data=JSON.parse(data);
                // console.log(data);
                var i,len;
                len=data.length;
                    var rows='';
                    var per=0;
                    for(i=0;i<len;i++){
                        rows = rows + '<tr>';
                        rows = rows + '<td>' + (i+1) + '</td>';
                        rows = rows + '<td>' + data[i].subject + '</td>';
                        rows = rows + '<td>' + data[i].fullMark + '</td>';
                        rows = rows + '<td>' + data[i].passMark + '</td>';
                        rows = rows + '<td>' + data[i].score + '</td>';
                        rows = rows + '<td>' + data[i].percent + '</td>';
                        rows = rows + '</tr>';
                        per=per+parseFloat(data[i].percent);
                        
                    }
                    rows = rows + '<tr><td colspan="6" style="text-align:center;color:lightgreen;"></td></tr>'
                        rows =rows + '<tr><td colspan="5" style="text-align:center;color:yellow;">Total percent</td>'
                        rows =rows + '<td style="color:#22f1fa;font-size: 23px;">'+per+"%"+'</td>';
                        rows =rows + '</tr>'
                        var res="";
                        var styl="";
                        if(per < 60){
                            res="Failed";
                            styl='style="text-align:center;color:#aa0505;font-size: 23px;"';
                        }else if(per >= 80){
                            res="Distinction";
                            styl='style="text-align:center;color:lightgreen;font-size: 23px;"';
                        }else if(per >=60 && per < 80){
                            res="Passed";
                            styl='style="text-align:center;color:#0ac70a;font-size: 23px;"';
                        }
                        rows =rows + '<tr id="res"><td colspan="6"'+styl+' >'+res+'</td></tr>'
                    $("#result_data").html(rows);
                }
                else{
                    $("#result_data").html('<tr><td colspan="6" style="text-align:center;color:#aa0505;">No Result Found</td></tr>');  
                }
                }
            });
        }
        
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
       var span =ele.getElementsByTagName("span")[0];
       span.innerHTML=errMsg;
       if(status !="" && status== "success"){
           span.style.color="green";
       }else if(status !="" && status== "error"){
        span.style.color="#aa0505";
       }
    }
    $("#result_form").on('submit',(e)=>{
        e.preventDefault();
        // alert("page is loaded");
        var status=true;
        var years =$("#yars").val();
        var month =$("#mnth").val();
        // console.log(month);
        if(!check_empty("yars")){
            status=false;
            seterror("year","please select the year","error");
            setTimeout(()=>{
                seterror("year","");
            },10000);
            // status=false;
        }
        $("#yars").on('change',()=>{
            seterror("year","");
        });
        if(!check_empty("mnth")){
            status=false;
            seterror("month","please select the Month","error");
            setTimeout(()=>{
                seterror("month","");
            },10000);
        }
        $("#mnth").on('change',()=>{
            seterror("month","");
        });
        if(status ==true){
            get_data(years,month);
            var yrmt=years+"/"+month;
            $("#yrmnt").text(yrmt);
                 }
    });
});