$(document).ready(()=>{
    // alert("this page is ready to load");
    var callId=setInterval(load_users,5000)
    load_users();
    function load_users(){
        $.ajax({
            url:'../ajaxfile/getUsers.php',
            type:'post',
            data:{status:'get_users'},
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                create_tbody_data(data.user)
            }
        })
    }
    function create_tbody_data(data){
        var tbody="";
        var style="";
        for(var i=0;i<data.length;i++){
            if(data[i].flag=="1"){
                 style ='1px solid red';
            }else{
                style ='';
            }
            tbody+='<tr style="border:'+style+'">';
            tbody+='<td>'+(i+1)+'</td>';
            tbody+='<td>'+data[i].regno+'</td>';
            tbody+='<td>'+data[i].eMail+'</td>';
            tbody+='<td>'+data[i].status+'</td>';
            tbody+='<td>'+data[i].otp+'</td>';
            tbody+='<td>'+data[i].regDate+'</td>';
            tbody+='<td>';
            if(data[i].flag==1){
            tbody+= "<a href='#' class='tbl-active smBtn' data='"+data[i].flag+"' id='"+data[i].userId+"'>active</a>";
            }else{
            tbody+= "<a href='#' class='tbl-active smBtn-d' data='"+data[i].flag+"' id='"+data[i].userId+"'>Deactive</a>";
            }
            tbody+= "<a href='#' class='tbl-delete smBtn-d' id='"+data[i].userId+"'>Delete</a>";
            tbody+='</td>';
            tbody+='</tr>';
        }
        $("#user_body").html(tbody);
    }
    $(document).on('click','.tbl-delete',(e)=>{
        e.preventDefault();
        var id=e.target.getAttribute('id');
        if(confirm("Are you sure to Delete this Account")){
            $.ajax({
                url:'../ajaxfile/getUsers.php',
                type:'post',
                data:{id:id,status:'delete_user'},
                success:function(data){
                    load_users();
                }
            })
        }
    })
    $(document).on('click','.tbl-active',(e)=>{
        e.preventDefault();
        var id=e.target.getAttribute('id');
        var flag =e.target.getAttribute('data');
        if(confirm("Are you sure change this Account Status ")){
            $.ajax({
                url:'../ajaxfile/getUsers.php',
                type:'post',
                data:{id:id,flag:flag,status:'user_flag'},
                success:function(data){
                    load_users();
                }
            })
        }
    })
    // -------------------------------------
// -----for the filter ----------------
    // -----------------------------
    var inp=document.getElementById('users_src');
    var sel=document.getElementById('col');
    sel.addEventListener('change',()=>{
        sel_filter();
    },false);
    sel_filter();
    function sel_filter(){
        inp.addEventListener('input',()=>{
            var val =sel.value;
            dynamic_filter('users','users_src',val)
            // clearInterval(callId);
        },false)
    }
});