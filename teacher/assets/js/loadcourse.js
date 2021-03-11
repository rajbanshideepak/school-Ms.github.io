$(function(){
    // get url data
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    // console.log(urlParams.has('faculty'));
    $("#back").on('click',()=>{
        console.log("clicked");
        window.location.href="courseNfaculty.php";
    })
if(urlParams.has('faculty')){
        // console.log(urlParams.get('faculty'))
        var faculty=urlParams.get('faculty');
    // get url data end
    fetch_all_data();
    function fetch_all_data(){
        $.ajax({
            url:"../ajaxfile/courseAction.php",
            type:"post",
            data:{faculty:faculty},
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                if(data.error=="false"){
                    $("#tbody_course").html("NO Course Found");
                    $("#tbody_course").css("color","red");
                }else if(data.course){
                    facultyHTML(data.course,data.total);
                }  
            }
        })
    }
    // // create dynamic table body
    function facultyHTML(data,data1){
        // console.log(data[0].fname);
        var html="";
        for(var i =0;i<data.length;i++){
            html+="<tr>";
            html+="<td>"+(i+1)+"</td>";
            html+="<td><b class='fac_link'id='"+data[i].cid+"'>"+data[i].cname+"</b></td>";
            html+="<td>"+data1[i]+"</td>";
            html+="<td>";
           if(data[i].status=='1'){
            html+= "<a href='#' class='smBtn-d actv' id='" + data[i].status + "' value='"+data[i].cid+"'>DeActive</a>";
           }else{
            html+= "<a href='#' class='smBtn actv' id='" + data[i].status + "' value='"+data[i].cid+"'>Active</a>";
           }
            html+="</td>";
            html+="<td>";
            html+= "<a href='#' class='tbl-edit smBtn ' id='" + data[i].cid + "'>Edit</a>";
            html+= "<a href='#' class='tbl-delete smBtn-d' id='" + data[i].cid + "'>Delete</a>";
            html+="</td>";
            html+="</tr>";
        }
        $("#tbody_course").html(html);
    }
    // // clickeing the faculty name and do some action
    // redirecting to course pages
    $(document).on("click",".fac_link",(e)=>{
        // console.log(e.target.innerText)
        var url ="subject.php?course="+e.target.getAttribute("id")+"&&faculty="+faculty;
        window.location.href=url;
    })
    // active and deactive method is done from here
    $(document).on("click",".actv",(e)=>{
        var status =e.target.getAttribute("id");
        var fid =e.target.getAttribute("value");
        changestatus(status,fid);
    })
    function changestatus(param,condi){
        $.ajax({
            url:"../ajaxfile/courseAction.php",
            type:"post",
            data:{param:param,condi:condi,status:"changestatus"},
            success:function(data){
                fetch_all_data();
            }
        })
    }
    // // for the edit and delete button
    $(document).on("click",".tbl-edit",(e)=>{
        e.preventDefault();
        var cid =e.target.getAttribute("id");
        editdata(cid);
        console.log(cid)
    })
    // // get all data in edit model
    function editdata(param){
        $.ajax({
            url:"../ajaxfile/courseAction.php",
            type:"post",
            data:{cid:param,status:"editdata"},
            success:function(data){
                // console.log(data);
                var data=JSON.parse(data);
                insertHTML(data.data)
                $("#myModalEdit").show(1000)
                fetch_all_data();
            }
        })
    }
    // // html for update page model
    function insertHTML(data){
        $("#ucourse").val(data[0].cname)
        $("#regno").val(data[0].cid)
    }
    $(document).on("click",".tbl-delete",(e)=>{
        e.preventDefault();
        var cid =e.target.getAttribute("id");
        removedata(cid);
    })
    // // delete ajax 
    function removedata(param){
        $.ajax({
            url:"../ajaxfile/courseAction.php",
            type:"post",
            data:{cid:param,status:"removedata"},
            success:function(data){
                fetch_all_data();
            }
        })
    }

    // // code for adding faculty to database
    $("#addForm_course").on('submit',function(e){
        e.preventDefault();
        console.log("clicked");
        var status = true;
        if($("#course").val().trim()==""){
            $("#fac_err").html("please filled the course Name")
            status = false;
            setInterval(()=>{$("#fac_err").html("")},5000)
        }
        if(status == true){
            console.log($("#course").val())
            var cname =$("#course").val();
            $.ajax({
                url:"../ajaxfile/courseAction.php",
                type:"post",
                data:{cname:cname,fid:faculty,status:"insertdata"},
                success:function(data){
                    fetch_all_data();
                    $("#myModal").hide(1000);
                    $("#course").val('');
                }
            })
        }
    });
    // // for update the faculty name
    $("#updateFormcourse").on('submit',function(e){
        e.preventDefault();
        var status = true;
        if($("#ucourse").val().trim()==""){
            $("#ufac_err").html("please filled the Course Name")
            status = false;
            setInterval(()=>{$("#ufac_err").html("")},5000)
        }
        if(status == true){
            console.log($("#ucourse").val())
            var cname =$("#ucourse").val();
            var cid = $("#regno").val();
            $.ajax({
                url:"../ajaxfile/courseAction.php",
                type:"post",
                data:{cname:cname,cid:cid,status:"updatedata"},
                success:function(data){
                    fetch_all_data();
                    $("#myModalEdit").hide(1000);
                }
            })
        }
    });
    $("#cancel").on('click',function(){
        $("#myModal").hide(1000);
        fetch_all_data();
    })
    $("#ucancel").on('click',function(){
        $("#myModalEdit").hide(1000);
        fetch_all_data();
    })
}else{
    console.log("url Not params not found");
}
});

