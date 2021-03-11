$(function(){
    // get url data
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    // console.log(urlParams.has('course'));
    $("#back").on('click',()=>{
        var url ="course.php?faculty="+urlParams.get('faculty');
        window.location.href=url;
    })
if(urlParams.has('course')){
        // console.log(urlParams.get('faculty'))
        var course=urlParams.get('course');
    // get url data end
    fetch_all_data();
    function fetch_all_data(){
        $.ajax({
            url:"../ajaxfile/subjectAction.php",
            type:"post",
            data:{course:course},
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                if(data.error=="false"){
                    $("#tbody_subject").html("NO subject Found");
                    $("#tbody_subject").css("color","red");
                }else if(data.subject){
                    subjectHTML(data.subject);
                }  
            }
        })
    }
    // // create dynamic table body
    function subjectHTML(data){
        // console.log(data[0].fname);
        var html="";
        for(var i =0;i<data.length;i++){
            html+="<tr>";
            html+="<td>"+(i+1)+"</td>";
            html+="<td><b class='fac_link'id='"+data[i].subid+"'>"+data[i].subname+"</b></td>";
            html+="<td>";
           if(data[i].status=='1'){
            html+= "<a href='#' class='smBtn-d actv' id='" + data[i].status + "' value='"+data[i].subid+"'>DeActive</a>";
           }else{
            html+= "<a href='#' class='smBtn actv' id='" + data[i].status + "' value='"+data[i].subid+"'>Active</a>";
           }
            html+="</td>";
            html+="<td>";
            html+= "<a href='#' class='tbl-edit smBtn ' id='" + data[i].subid + "'>Edit</a>";
            html+= "<a href='#' class='tbl-delete smBtn-d' id='" + data[i].subid + "'>Delete</a>";
            html+="</td>";
            html+="</tr>";
        }
        $("#tbody_subject").html(html);
    }
    // // // clickeing the faculty name and do some action
    // // redirecting to course pages
    // $(document).on("click",".fac_link",(e)=>{
    //     // console.log(e.target.innerText)
    //     var url ="subject.php?course="+e.target.innerText;
    //     window.location.href=url;
    // })
    // // active and deactive method is done from here
    $(document).on("click",".actv",(e)=>{
        var status =e.target.getAttribute("id");
        var sid =e.target.getAttribute("value");
        changestatus(status,sid);
    })
    function changestatus(param,condi){
        $.ajax({
            url:"../ajaxfile/subjectAction.php",
            type:"post",
            data:{param:param,condi:condi,status:"changestatus"},
            success:function(data){
                fetch_all_data();
            }
        })
    }
    // // // for the edit and delete button
    $(document).on("click",".tbl-edit",(e)=>{
        e.preventDefault();
        var subid =e.target.getAttribute("id");
        editdata(subid);
        console.log(subid)
    })
    // // // get all data in edit model
    function editdata(param){
        $.ajax({
            url:"../ajaxfile/subjectAction.php",
            type:"post",
            data:{subid:param,status:"editdata"},
            success:function(data){
                // console.log(data);
                var data=JSON.parse(data);
                insertHTML(data.data)
                $("#myModalEdit").show(1000)
                fetch_all_data();
            }
        })
    }
    // // // html for update page model
    function insertHTML(data){
        $("#usubject").val(data[0].subname)
        $("#regno").val(data[0].subid)
    }
    $(document).on("click",".tbl-delete",(e)=>{
        e.preventDefault();
        var subid =e.target.getAttribute("id");
        removedata(subid);
    })
    // // // delete ajax 
    function removedata(param){
        $.ajax({
            url:"../ajaxfile/subjectAction.php",
            type:"post",
            data:{subid:param,status:"removedata"},
            success:function(data){
                fetch_all_data();
            }
        })
    }

    // // // code for adding faculty to database
    $("#addForm_subject").on('submit',function(e){
        e.preventDefault();
        console.log("clicked");
        var status = true;
        if($("#subject").val().trim()==""){
            $("#fac_err").html("please filled the subject Name")
            status = false;
            setInterval(()=>{$("#fac_err").html("")},5000)
        }
        if(status == true){
            console.log($("#subject").val())
            var subname =$("#subject").val();
            $.ajax({
                url:"../ajaxfile/subjectAction.php",
                type:"post",
                data:{subname:subname,cid:course,status:"insertdata"},
                success:function(data){
                    fetch_all_data();
                    $("#myModal").hide(1000);
                    $("#subject").val('');
                }
            })
        }
    });
    // // // for update the faculty name
    $("#updateFormsubject").on('submit',function(e){
        e.preventDefault();
        var status = true;
        if($("#usubject").val().trim()==""){
            $("#ufac_err").html("please filled the Subject Name")
            status = false;
            setInterval(()=>{$("#ufac_err").html("")},5000)
        }
        if(status == true){
            console.log($("#usubject").val())
            var subname =$("#usubject").val();
            var subid = $("#regno").val();
            $.ajax({
                url:"../ajaxfile/subjectAction.php",
                type:"post",
                data:{subname:subname,subid:subid,status:"updatedata"},
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
    console.log("url params not found");
}
});

