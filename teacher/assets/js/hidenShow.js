load();
function load(){
    $.ajax({
        url: "../ajaxfile/faculty.php",
        success:function(data){
            $("#wrap").html(data);
            $("#wrap").css({"transition": "all 0.8s linear"});
        }
    });
}

function selectcourse(e){
    // alert(e);
    var data="fid="+e;
    $.ajax({
        url: "../ajaxfile/course.php?",
        type:"post",
        data:data,
        success:function(data){
            $("#faculty").css({"visiblity":"none","transition": "all 0.8s linear"});
            $("#wrap").html(data);
        }
        // $("#wrap1").html(data);
    });
}
function back(){
    $("#courses").css({"display":"none","transition": "all 0.8s linear"});
   load();
}
