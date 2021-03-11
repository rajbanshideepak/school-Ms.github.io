$(document).ready(function(){
    function seterror(div,err_msg){
        var ele =document.getElementById(div);
        var span =ele.getElementsByTagName('span')[0];
        span.innerHTML=err_msg;
        // ele.getElementsByTagName('select')[0].style.border="1px solid red";
        setTimeout(() => {
            span.innerHTML="";
            // ele.getElementsByTagName('select')[0].style.border="1px solid gray";  
        }, 5000);
    }
    function empty(id){
        var mty = true;
        if(document.getElementById(id).value.trim()==""){
            mty=false;
        }
        return mty;
    }
    // seterror('result_faculty_box',"**this field must be field");
    get_this('faculty')
    get_this('course')
    function get_this(param){
        $.ajax({
            url:"../ajaxfile/resultAction.php",
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
            $('#result_faculty').append($(document.createElement('option')).prop({
                value: data[i].fid,
                text: data[i].fname
              }))
        }
    }
    function put_course_data(data){
        for(var i =0; i < data.length;i++){
            $('#result_course').append($(document.createElement('option')).prop({
                value: data[i].cid,
                text: data[i].cname
              }))
        }
    }
    // action for add_result_Button
    $("#add_result_btn").on('click',()=>{
        fetch_all();
        result_action();
    });
    function fetch_all(){
        var process = true;
        if(!empty('result_faculty')){
            seterror('result_faculty_box',"**this field must be field");
            process = false;
        }else if(!empty('result_course')){
            seterror('result_course_box',"**this field must be field");
            process = false;
        } 
        if(process ==true){
            // get value and name of selected faculty and course
            var faculty_value=$('#result_faculty').val()
            var course_value=$('#result_course').val()
            var faculty_name=$('#result_faculty option:selected').text()
            var course_name=$('#result_course option:selected').text();
            // console.log(faculty_value,course_value);
            $.ajax({
                url:"../ajaxfile/resultAction.php",
                type:"post",
                data:{f_val:faculty_value,c_val:course_value,f_name:faculty_name,c_name:course_name,status:'subjects'},
                success:function(data){
                    // console.log(data);
                    var data =JSON.parse(data);
                    $("#marks_tbl").show(1000);
                    $("#res_tbl").show(1000);
                    if(data.subject){
                        fetch_marks_html(data.subject);
                    }else if(data.error){
                        $("#marks_edit").html("No Subject In Database");
                        $("#marks_edit").css("color","red");
                        $("#result_subjects").html("No Subject In Database");
                        $("#result_subjects").css("color","red");
                    }
                }
            });
        }
    }
    function fetch_marks_html(data){
        var result="";
        for(var i =0; i < data.length;i++){
            result +='<tr>';
            result +='<td>'+(i+1)+'</td>';
            result +='<td>'+data[i].subname+'</td>';
            result +='<td><input type="number" value="'+data[i].full_mark+'" class="result_input" disabled></td>';
            result +='<td><input type="number" value="'+data[i].pass_mark+'" class="result_input" disabled></td>';
            result +="<td>";
            result += "<a href='#' class='marks-edit smBtn ' id='" + data[i].subid + "'>Edit</a>";
            result += "<a href='#' class='marks-add smBtn-s' id='" + data[i].subid + "'>Add</a>";
            result +="</td>";
            result +='</tr>';
        }
        $("#marks_edit").html(result);
    }
    
    // for the full marks and pass marks edit and update
    $(document).on('click','.marks-edit',function(e){
        e.preventDefault();
        var dis=document.getElementsByClassName('result_input')
        // console.log(dis);
        for(j=0;j<dis.length;j++){
            dis[j].disabled=true
            dis[j].style.background='';
        }
        var tr =e.target.parentNode.parentNode;
        var inp =tr.getElementsByClassName('result_input');
        for(var i=0;i<inp.length;i++){
            
            inp[i].disabled =false;
            inp[i].style.backgroundColor='#1f0b0b';
            inp[i].focus();
        }
        $("#marks_tbl").on('click',()=>{
            for(j=0;j<dis.length;j++){
                dis[j].disabled=true
                dis[j].style.background='';
            }
        })
        
    });
    $(document).on('click','.marks-add',function(e){
        e.preventDefault();
        var tr =e.target.parentNode.parentNode;
        var inp =tr.getElementsByClassName('result_input');
        var id =$(this).attr("id");
        var full =inp[0].value;
        var pass =inp[1].value;
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{full:full,pass:pass,id:id,status:'insert_mark'},
            success:function(data){
                // console.log(data);
                fetch_all();
            } 
        })
    });
    // function for the student result fetch edit delete insert data
    function result_action(){
        // get value and name of selected faculty and course
        var faculty_value=$('#result_faculty').val()
        var course_value=$('#result_course').val()
        var faculty_name=$('#result_faculty option:selected').text()
        var course_name=$('#result_course option:selected').text();
        // console.log(faculty_value);
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{f_val:faculty_value,c_val:course_value,f_name:faculty_name,c_name:course_name,status:'std_result'},
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                if(data.student){
                    add_student_html(data.student);
                }else{
                    $("#result_marks_edit").html("no sutdent Found in this course");
                    $("#result_marks_edit").css("color","red");
                }
            }
        });
    }
    function add_student_html(data){
        var result="";
        for(var i =0; i < data.length;i++){
            result +='<tr>';
            result +='<td>'+(i+1)+'</td>';
            result +='<td class=\"st_name\">'+data[i].lname+" "+data[i].fname+'</td>';
            result +='<td style=\"text-align:center\"><input type="number" value="" class="result_input"></td>';
            result +='<td style=\"text-align:center\"><input type="number" value="" class="result_input"></td>';
            result +="<td style=\"text-align:center\">";
            result += "<a href='#' class='std-view smBtn-s ' id='" + data[i].regno + "'>view</a>";
            result += "<a href='#' class='std-delete smBtn-d' id='" + data[i].regno + "'>delete</a>";
            result += "<a href='#' class='std-add smBtn-s' id='" + data[i].regno + "'>Add</a>"; 
            result +="</td>";
            result +='</tr>';
        }
        $("#result_marks_edit").html(result);
    }
    // modal close button event
    $(".close").on('click',()=>{
        $("#result_modal").hide(1000);
        $("#result_add_modal").hide(1000);
        result_action();

    });
    // for all four button event 
    $(document).on('click','.std-view',function(event){
        event.preventDefault();
        get_score(event);
    });
    function get_score(e){
        var faculty_value=$('#result_faculty').val()
        var course_value=$('#result_course').val()
        var tr =e.target.parentNode.parentNode;
        var inp =tr.getElementsByClassName('result_input');
        var st_name =tr.getElementsByClassName('st_name')[0].innerText;
        var id =e.target.getAttribute("id");
        // console.log(id)
        var year =inp[0].value;
        var month =inp[1].value;
        // console.log(full,pass,st_name)
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{year:year,month:month,id:id,faculty:faculty_value,course:course_value,status:'feteh_result'},
            success:function(data){
                // console.log(data);
                var data =JSON.parse(data);
                if(data.result){
                    modal_data(id,st_name,year,month);
                    fresult_table_body(data.result)
                    $("#result_modal").show(1000);
                }
                if(data.error){
                    alert("Create the Result First");
                    result_action();
                }
            } 
        })
    }
    // delete
    $(document).on('click','.score-delete',function(e){
        e.preventDefault();
        var id =$(this).attr("id");
        // alert(id)
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{id:id,status:'delete_score'},
            success:function(data){
                $("#ms").html("deleted succesfully");
                setInterval(()=>{$("#ms").html("");},5000)
                $("#result_modal").hide(1000);
            } 
        })
    });

    // edit
    $(document).on('click','.std-edit',function(e){
        e.preventDefault();
        console.log("edit button has been clicked");
        $("#res_year").attr('disabled',false)
        $("#res_month").attr('disabled',false)
    });
    // update
    $(document).on('click','#std-update',function(e){
        e.preventDefault();
        var update = true;
        if(!empty('res_year')){
            seterror('yr',"**this field must be field");
            update = false;
        }else if(!empty('res_month')){
            seterror('mnt',"**this field must be field");
            update = false;
        } 
        if(update==true){
        var year =$("#res_year").val();
        var month =$("#res_month").val();
        var id =$("#std_regno").val();
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{year:year,month:month,id:id,status:'update_ym'},
            success:function(data){
                $("#result_modal").hide(1000);
            } 
        })
        }
    });
    function modal_data(regno,name,year,month,disabled=true){
        $("#std_name").val(name)
        $("#std_name").css('text-transform','uppercase')
        $("#std_name").attr('disabled',disabled)
        $("#res_year").val(year)
        $("#res_year").attr('disabled',disabled)
        $("#res_month").val(month)
        $("#res_month").attr('disabled',disabled)
        $("#regno").val(regno)
    }
    function fresult_table_body(data){
        var result="";
        for(var i =0; i < data.length;i++){
            result +='<tr>';
            result +='<td>'+(i+1)+'</td>';
            result +='<td>'+data[i].subject+'</td>';
            result +='<td><input type="number" value="'+data[i].fullMark+'" class="result_input" disabled></td>';
            result +='<td><input type="number" value="'+data[i].passMark+'" class="result_input" disabled></td>';
            result +='<td><input type="number" value="'+data[i].score+'" class="result_input" disabled></td>';
            result +='<td><input type="number" value="'+data[i].percent+'" class="result_input" disabled></td>';
            result +="<td>";
            result += "<a href='#' class='marks-edit smBtn ' id='" + data[i].rsid + "'>Edit</a>";
            result += "<a href='#' class='score-add smBtn-s' id='" + data[i].rsid + "'>update</a>";
            result += "<a href='#' class='score-delete smBtn-d' id='" + data[i].rsid + "'>delete</a>";
            result +="</td>";
            result +='</tr>';
        }
        $("#result_page").html(result);
    }
    $(document).on('click','.score-add',function(e){
        e.preventDefault();
        var tr =e.target.parentNode.parentNode;
        var inp =tr.getElementsByClassName('result_input');
        var id =$(this).attr("id");
        var full =inp[0].value;
        var pass =inp[1].value;
        var score =inp[2].value;
        var per =inp[3].value;
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{full:full,pass:pass,id:id,score:score,per:per,status:'update_score'},
            success:function(data){
                console.log("updated");
                $("#ms").html("updated succesfully");
                setInterval(()=>{$("#ms").html("");},5000)
                // fetch_all();
            } 
        })
    });
    // add new result to the paticular student
    $(document).on('click','.std-add',function(e){
        e.preventDefault();
        var faculty_value=$('#result_faculty').val()
        var course_value=$('#result_course').val()
        var tr =e.target.parentNode.parentNode;
        var inp =tr.getElementsByClassName('result_input');
        var st_name =tr.getElementsByClassName('st_name')[0].innerText;
        var id =$(this).attr("id");
        var year =inp[0].value;
        var month =inp[1].value;
        fetch_modal_item();
        function fetch_modal_item(){
            $.ajax({
                url:"../ajaxfile/resultAction.php",
                type:"post",
                data:{c_val:course_value,year:year,month:month,id:id,status:'fetch_sub_for_result'},
                success:function(data){
                    // console.log(data);
                    var data =JSON.parse(data);
                    if(data.already){
                        alert("this month result has been already Created");
                    }else if(data.subject){
                        $("#result_add_modal").show(1000);
                        modal_add_data(id,st_name,year,month);
                        add_result_fetch_sub(data.subject);
                        // for adding the result in data base
                        $(document).on('click','.add_st_result',(e)=>{
                            e.preventDefault();
                            var modal_tr =e.target.parentNode.parentNode;
                            var subject =modal_tr.getElementsByTagName('td')[1].innerText;
                            var inp =modal_tr.getElementsByClassName('result_input');
                            var fullmark =inp[0].value;
                            var passmark =inp[1].value;
                            var score =inp[2].value;
                            var percent =inp[3].value;
                            add_result_to_database(id,faculty_value,course_value,subject,fullmark,passmark,score,percent,year,month);
                            // add_result_fetch_sub(data.subject);
                            // fetch_modal_item();
                        });
                    } 
                } 
            })
        }
    });
    function modal_add_data(regno,name,year,month){
        $("#std_name_add").val(name)
        $("#std_name_add").css('text-transform','uppercase')
        $("#res_year_add").val(year)
        $("#res_month_add").val(month)
        $("#std_regno_add").val(regno)
    }
    function add_result_fetch_sub(data){
        var result="";
        for(var i =0; i < data.length;i++){
            result +='<tr>';
            result +='<td>'+(i+1)+'</td>';
            result +='<td>'+data[i].subname+'</td>';
            result +='<td><input type="number" value="'+data[i].full_mark+'" class="result_input"></td>';
            result +='<td><input type="number" value="'+data[i].pass_mark+'" class="result_input"></td>';
            result +='<td><input type="number" value="" class="result_input"></td>';
            result +='<td><input type="number" value="" class="result_input"></td>';
            result +="<td>";
            result += "<a href='#' class='add_st_result smBtn-s' id=''>Add</a>";
            result +="</td>";
            result +='</tr>';
        }
        $("#result_add_page").html(result);
    }
    function add_result_to_database(regno,faculty,course,subject,fullMark,passMark,score,precent,year,month){
        // console.log(regno,faculty,course,subject,fullMark,passMark,score,precent,year,month);
        $.ajax({
            url:"../ajaxfile/resultAction.php",
            type:"post",
            data:{regno:regno,faculty:faculty,course:course,subject:subject,fullMark:fullMark,passMark:passMark,score:score,precent:precent,year:year,month:month,status:'add_std_result'},
            success:function(data){
                var data=JSON.parse(data);
                if(data.already){
                    alert("already inserted");
                }else if(data.insert){
                    $("#ms_add").html("insert successfull!!");
                    setInterval(()=>{
                        $("#ms_add").html("");
                    },3000)
                }else if(data.notinsert){
                    $("#ms_add").html("something wrong");
                    setInterval(()=>{
                        $("#ms_add").html("");
                    },3000)
                }
            } 
        })
    }
    $(document).on('click','.std-delete',function(e){
        e.preventDefault();
        var tr =e.target.parentNode.parentNode;
        var inp =tr.getElementsByClassName('result_input');
        var id =$(this).attr("id");
        var year =inp[0].value;
        var month =inp[1].value;
        // alert(id);
            $.ajax({
                url:"../ajaxfile/resultAction.php",
                type:"post",
                data:{year:year,month:month,id:id,status:'delete_result'},
                success:function(data){
                alert("all data deleted successfully");
                  result_action();
                } 
            })
    });
});