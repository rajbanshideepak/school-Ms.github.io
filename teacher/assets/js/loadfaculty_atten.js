$(()=>{
    var page = 1;
    var current_page = 1;
    manageData();
    function manageData(){
        $.ajax({
            datatype:'json',
            url:"../ajaxfile/atten_by_faculty.php",
            type:"post",
            data: { status : 'student'},
            success:function(data){
                // console.log(data)
                var data=JSON.parse(data);
                // console.log(data)
                manageRow(data.data,data.total,data.totalp,data.totala)
            }
        });
    }
    function manageRow(data,meta,ceta,reta){
        // console.log(data);
        // console.log(ceta);
        var d = new Date();
        var date=(d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate());
        var sn=1;
        var	rows = '';
          for(var i=0;i<data.length;i++){
                rows = rows + '<tr>';
                rows = rows + '<td>'+sn+'</td>';
                rows = rows + '<td><a href="attendance.php?faculty='+data[i].fid+'">'+data[i].fname+'</a></td>';
                rows = rows + '<td>'+meta[i]+'</td>';
                rows = rows + '<td>'+ceta[i]+'</td>';
                rows = rows + '<td>'+reta[i]+'</td>';
                rows = rows + '<td>'+date+'</td>';
                rows = rows + '</tr>';
                sn++;
            }
        $("tbody").html(rows);
        $("tbody td").css("text-transform","capitalize");
}
});