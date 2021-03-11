$(document).ready(function(){
    function seterror(div,err_msg){
        var ele =document.getElementById(div);
        var span =ele.getElementsByTagName('span')[0];
        span.innerHTML=err_msg;
        setTimeout(() => {
            span.innerHTML=""; 
        }, 5000);
    }
    function empty(id){
        var mty = true;
        if(document.getElementById(id).value.trim()==""){
            mty=false;
        }
        return mty;
    }
    // get facuty and course from database and put into the select option filed
    get_this('faculty')
    get_this('course')
    function get_this(param){
        $.ajax({
            url:"../ajaxfile/feemanageAction.php",
            type:"post",
            data:{status:param},
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                // console.log(data);
                if(data.faculty){
                    put_faculty_data(data.faculty)
                }else if(data.course){
                    put_course_data(data.course)
                }
                
            }
        })
    }
    function put_faculty_data(data){
        for(var i =0; i < data.length;i++){
            $('.fee_faculty').append($(document.createElement('option')).prop({
                value: data[i].fid,
                text: data[i].fname
              }))
        }
    }
    function put_course_data(data){
        for(var i =0; i < data.length;i++){
            $('.fee_course').append($(document.createElement('option')).prop({
                value: data[i].cid,
                text: data[i].cname
              }))
        }
    }
    // fetch faculty and course end here
    // adding the fee start from here
    $("#first_add_fee").on('click',(e)=>{
        e.preventDefault();
        var process = true;
        if(!empty("fee_faculty")){
            seterror("fee_faculty_box","**Please select this field");
            process=false;
        }
        else if(!empty("fee_course")){
            seterror("fee_course_box","**Please select this field");
            process=false;
        }
        else if(!empty("fee_amount")){
            seterror("fee_amount_box","**Please Enter yearly Fee Amount");
            process=false;
        }
        if(process==true){
            var faculty_name=$('#fee_faculty option:selected').text()
            var course_name=$('#fee_course option:selected').text();
            var amount =$("#fee_amount").val()
           insert_ajax(faculty_name,course_name,amount,"firstyearfee");
           $("#fee_amount").val("");
           $("#fee_faculty").val("");
           $("#fee_course").val("");
        }
    });
    // $("#second_add_fee").on('click',second_first_year,false);
    $("#second_add_fee").on('click',(e)=>{
        e.preventDefault();
        var process = true;
        if(!empty("fee_sec_faculty")){
            seterror("fee_sec_faculty_box","**Please select this field");
            process=false;
        }
        else if(!empty("fee_sec_course")){
            seterror("fee_sec_course_box","**Please select this field");
            process=false;
        }
        else if(!empty("fee_sec_amount")){
            seterror("fee_sec_amount_box","**Please Enter yearly Fee Amount");
            process=false;
        }
        if(process==true){
            var faculty_name=$('#fee_sec_faculty option:selected').text()
            var course_name=$('#fee_sec_course option:selected').text();
            var amount =$("#fee_sec_amount").val()
           insert_ajax(faculty_name,course_name,amount,"secondyearfee");
           $("#fee_sec_amount").val("");
           $("#fee_sec_faculty").val("");
           $("#fee_sec_course").val("");
        }
    });
    function insert_ajax(faculty,course,amount,status){
    //    console.log(faculty,course,amount,status);
        $.ajax({
            url:"../ajaxfile/feemanageAction.php",
            type:"post",
            data:{f_name:faculty,c_name:course,amount:amount,status:status},
            success:function(data){
                // console.log(data);
                var data=JSON.parse(data);
                if(data.done){
                    seterror("stat",status+',has been added Succesfully');
                    $("#stat").css("color","green");
                    $("#msg").show(1000);
                    setTimeout(() => {
                        $("#msg").hide(1000); 
                    }, 5000);
                    fetch_data("firstyearfee");
                    fetch_data("secyearfee");
                }else if(data.wrong){
                    seterror("stat",'something went wrong please try angin');
                    $("#stat").css("color","red");
                    $("#msg").show(1000);
                    setTimeout(() => {
                        $("#msg").hide(6000); 
                    }, 5000);
                }else if(data.already){
                    seterror("stat",'This faculty and course Fee is already added');
                    $("#stat").css("color","rgb(166 175 12)");
                    $("#msg").show(1000);
                    setTimeout(() => {
                        $("#msg").hide(1000); 
                    }, 5000);
                }  
            }
        });
    }
    // =----------------------------------------------=
    //-----fetch for the add fee feon database--------=
    // =----------------------------------------------=
    fetch_data("firstyearfee");
    fetch_data("secyearfee");
    function fetch_data(table){
        $.ajax({
            url:"../ajaxfile/feemanageAction.php",
            type:"post",
            data:{table:table,status:"fetch"},
            success:function(data){
                var data=JSON.parse(data); 
                if(table=="firstyearfee"){
                    set_table_data(data.data,'firstyear_fee');
                }else if(table =="secyearfee"){
                    set_table_data(data.data,'secondyear_fee');
                }
            }
        });
    }
    // this function will set the data in the tble 
    function set_table_data(data,tbl_id){
        var result="";
        for(var i =0; i < data.length;i++){
            result +='<tr>';
            result +='<td>'+(i+1)+'</td>';
            result +='<td>'+data[i].faculty+'</td>';
            result +='<td>'+data[i].course+'</td>';
            result +='<td>'+data[i].totalFee+'</td>';
            result +="<td>";
            if(data[i].fyid){
                result += "<a href='#' class='f_fee-edit smBtn ' id='" + data[i].fyid + "'>Edit</a>";
                result += "<a href='#' class='f_fee-delete smBtn-d' id='" + data[i].fyid + "'>delete</a>";
            }else{
                result += "<a href='#' class='s_fee-edit smBtn ' id='" + data[i].syid + "'>Edit</a>";
                result += "<a href='#' class='s_fee-delete smBtn-d' id='" + data[i].syid + "'>delete</a>";               
            }
            result +="</td>";
            result +='</tr>';
        }
        document.getElementById(tbl_id).innerHTML=result;
    }
    // ーーーーーーーーーーーーーーーーーーーー
    // --------------------------------------------
    // for deleting the fee
    $(document).on('click','.f_fee-delete',(e)=>{
        e.preventDefault();
        id=e.target.getAttribute('id');
        $.ajax({
            url:"../ajaxfile/feemanageAction.php",
            type:"post",
            data:{id:id,status:"f_delete"},
            success:function(data){
                fetch_data("firstyearfee");
                fetch_data("secyearfee");
            }
        });
    });
    $(document).on('click','.s_fee-delete',(e)=>{
        e.preventDefault();
        id=e.target.getAttribute('id');
        $.ajax({
            url:"../ajaxfile/feemanageAction.php",
            type:"post",
            data:{id:id,status:"s_delete"},
            success:function(data){
                fetch_data("firstyearfee");
                fetch_data("secyearfee");
            }
        });
    });
    // for edit filed
    $(document).on('click','.f_fee-edit',(e)=>{
        e.preventDefault();
        var id=e.target.getAttribute('id');
        alert(id);
        fee_action(id,'f_edit')
    });
    function fee_action(id,status){
        $.ajax({
            url:"../ajaxfile/feemanageAction.php",
            type:"post",
            data:{id:id,status:status},
            success:function(data){
                // console.log(data); 
                var data =JSON.parse(data);
                console.log(data.data);
                // fetch_data("firstyearfee");
            }
        });
    }
});