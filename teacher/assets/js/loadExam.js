$("document").ready(function () {
    subject_question()
    // fetch subjects and questions function
    function subject_question() {
        $.ajax({
            datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "POST",
            data: { status: "fetchSubjects" },
            success: function (data) {
                var ext = JSON.parse(data)
                var sub = ext.subject
                var totques = ext.total
                // console.log(ext)
                subject_question_table(sub, totques,)
            }
        })
    }
    // create subject table
    function subject_question_table(sub, totques) {
        var tbl = ""
        for (var i = 0; i < sub.length; i++) {
            tbl += "<tr>"
            tbl += "<td>" + (i + 1) + "</td>"
            tbl += "<td>" + sub[i].subname + "</td>"
            tbl += "<td>" + totques[i] + "</td>"
            tbl += "<td>1</td>"
            tbl += "<td>";
            if (sub[i].status == '1') {
                tbl += "<a href='#' class='smBtn-d actv' id='0' value='" + sub[i].subid + "'>DeActive</a>";
            } else {
                tbl += "<a href='#' class='smBtn actv' id='1' value='" + sub[i].subid + "'>Active</a>";
            }
            tbl += "</td>";
            tbl += "<td>";
            if (sub[i].status == '1') {
                tbl += "<a href='' style='opacity: .5; pointer-events: none; cursor: default;' class='tbl-edit smBtn ' id='" + sub[i].subid + "'>View</a>";
                tbl += "<a href='#' style='opacity: .5; pointer-events: none; cursor: default;' class='tbl-delete smBtn-d' id='" + sub[i].subid + "'>Delete All</a>";
            } else {
                tbl += "<a href='#' class='tbl-edit smBtn ' id='" + sub[i].subid + "'>View</a>";
                tbl += "<a href='#' class='tbl-delete smBtn-d' id='" + sub[i].subid + "'>Delete All</a>";
            }
            tbl += "</td>";
            tbl += "</tr>";
        }
        $("#mytbl>tbody").html(tbl);
    }
    ///////////////////////////////////////////
    // Active Deactive Btn click Action
    $("#mytbl>tbody").on("click", ".actv", (e) => {
        e.preventDefault();
        console.log("clicked")
        var statid = e.target.getAttribute("id");
        var subid = e.target.getAttribute("value");
        actv_dactv(statid, subid)
    })
    // Ajax function for delete data
    function actv_dactv(statid, subid) {
        $.ajax({
            datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "post",
            data: { subid: subid, statid: statid, status: "actv_dactv" },
            success: function (response) {
                if (response.success == "true") {

                } else if (response.error == "false") {
                    alert("データベースエラー")
                }
                subject_question()
            }
        })
    }
    /////////////////////////////////////////////

    // Delete All Button click Action
    $("#mytbl>tbody").on("click", ".tbl-delete", (e) => {
        e.preventDefault();
        subid = e.target.getAttribute("id");
        delet(subid)
    })
    // Ajax function for delete data
    function delet(subid) {
        $.ajax({
            datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "post",
            data: { subid: subid, status: "deleteAll" },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.success == "true") {
                    alert("データが削除されました。")
                } else if (data.error == "false") {
                    alert("データ削除エラー")
                }
                subject_question()
            }
        })
    }
    // for the view and delete button
    $(document).on("click", ".tbl-edit", (e) => {
        e.preventDefault();
        var subid = e.target.getAttribute("id");
        // viewbtn(subid);
        window.location.assign("../php/quesDispPHP.php?subid=" + subid)
        // console.log(subid)
    })
})