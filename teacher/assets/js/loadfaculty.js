$(function(){
    fetch_all_data();
    function fetch_all_data(){
        $.ajax({
            url:"../ajaxfile/feth_faculty.php",
            type:"post",
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                facultyHTML(data.faculty,data.total);
            }
        })
    }
    // create dynamic table body
    function facultyHTML(data,data1){
        // console.log(data[0].fname);
        var html="";
        for(var i =0;i<data.length;i++){
            html+="<tr>";
            html+="<td>"+(i+1)+"</td>";
            html+="<td><b class='fac_link' id='"+data[i].fid+"'>"+data[i].fname+"</b></td>";
            html+="<td>"+data1[i]+"</td>";
            html+="<td>";
           if(data[i].status=='1'){
            html+= "<a href='#' class='smBtn-d actv' id='" + data[i].status + "' value='"+data[i].fid+"'>DeActive</a>";
           }else{
            html+= "<a href='#' class='smBtn actv' id='" + data[i].status + "' value='"+data[i].fid+"'>Active</a>";
           }
            html+="</td>";
            html+="<td>";
            html+= "<a href='#' class='tbl-edit smBtn ' id='" + data[i].fid + "'>Edit</a>";
            html+= "<a href='#' class='tbl-delete smBtn-d' id='" + data[i].fid + "'>Delete</a>";
            html+="</td>";
            html+="</tr>";
        }
        $("#tbody_faculty").html(html);
    }
    // clickeing the faculty name and do some action
    // redirecting to course pages
    $(document).on("click",".fac_link",(e)=>{
        // console.log(e.target.innerText)
        var url ="course.php?faculty="+e.target.getAttribute("id");
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
            url:"../ajaxfile/feth_faculty.php",
            type:"post",
            data:{param:param,condi:condi,status:"changestatus"},
            success:function(data){
                fetch_all_data();
            }
        })
    }
    // for the edit and delete button
    $(document).on("click",".tbl-edit",(e)=>{
        e.preventDefault();
        var fid =e.target.getAttribute("id");
        editdata(fid);
        console.log(fid)
    })
    // get all data in edit model
    function editdata(param){
        $.ajax({
            url:"../ajaxfile/feth_faculty.php",
            type:"post",
            data:{fid:param,status:"editdata"},
            success:function(data){
                // console.log(data);
                var data=JSON.parse(data);
                insertHTML(data.data)
                $("#myModalEdit").show(1000)
                // fetch_all_data();
            }
        })
    }
    // html for update page model
    function insertHTML(data){
        $("#ufaculty").val(data[0].fname)
        $("#regno").val(data[0].fid)
    }
    $(document).on("click",".tbl-delete",(e)=>{
        e.preventDefault();
        var fid =e.target.getAttribute("id");
        removedata(fid);
    })
    // delete ajax 
    function removedata(param){
        $.ajax({
            url:"../ajaxfile/feth_faculty.php",
            type:"post",
            data:{fid:param,status:"removedata"},
            success:function(data){
                fetch_all_data();
            }
        })
    }

    // code for adding faculty to database
    $("#addForm").on('submit',function(e){
        e.preventDefault();
        var status = true;
        if($("#faculty").val().trim()==""){
            $("#fac_err").html("please filled the faculty Name")
            status = false;
            setInterval(()=>{$("#fac_err").html("")},5000)
        }
        if(status == true){
            console.log($("#faculty").val())
            var fname =$("#faculty").val();
            $.ajax({
                url:"../ajaxfile/feth_faculty.php",
                type:"post",
                data:{fname:fname,status:"insertdata"},
                success:function(data){
                    fetch_all_data();
                    $("#myModal").hide(1000);
                }
            })
        }
    });
    // for update the faculty name
    $("#updateForm").on('submit',function(e){
        e.preventDefault();
        var status = true;
        if($("#ufaculty").val().trim()==""){
            $("#ufac_err").html("please filled the faculty Name")
            status = false;
            setInterval(()=>{$("#ufac_err").html("")},5000)
        }
        if(status == true){
            console.log($("#ufaculty").val())
            var fname =$("#ufaculty").val();
            var fid = $("#regno").val();
            $.ajax({
                url:"../ajaxfile/feth_faculty.php",
                type:"post",
                data:{fname:fname,fid:fid,status:"updatedata"},
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
});

