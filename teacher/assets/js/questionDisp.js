$("document").ready(() => {
    //Get subid from Url with Get Method
    var subid = $("#subid").val()
    questionDisp(subid)

    //////////////////////////////////////////
    // fetch questions and show in table 
    function questionDisp(subid) {
        $.ajax({
            datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "post",
            data: { subid: subid, status: "viewques" },
            success: function (response) {
                // console.log(response)
                var data = JSON.parse(response);
                if (data.error == "false") {
                    return false
                } else {
                    question_table(data.question, data.answer)
                }

            }
        })
    }
    function question_table(ques, ans) {
        var tbl = ""
        for (var i = 0; i < ques.length; i++) {
            var anss = ""
            var aid = ""
            for (var j = 0; j < ans[i].length; j++) {
                anss += ans[i][j]['answer']
                aid += ans[i][j]['aid']
                if (j < ans[i].length - 1) {
                    anss += ", "
                    aid += ","
                }
            }
            tbl += "<tr>"
            tbl += "<td>" + (i + 1) + "</td>"
            tbl += "<td class='ques'>" + ques[i].question + "</td>"
            tbl += "<td class='sn'>" + ques[i].sn + "</td>"
            tbl += "<td class='modAns'>" + anss + "</td>"
            tbl += "<td class='crtAns'>" + ques[i].correct_ans + "</td>"
            tbl += "<td class='time'>" + ques[i].time + "</td>";
            tbl += "<td class='aid' id='" + aid + "'>";
            tbl += "<a href='#' class='tbl-edit smBtn' id='" + ques[i].qid + "'>Edit</a>";
            tbl += "<a href='#' class='tbl-delete smBtn-d' id='" + aid + "'>Delete</a>";
            tbl += "</td>";
            tbl += "</tr>";
        }
        $("#mytbl>tbody").html(tbl);
    }

    //////////////////////////////////////////
    // Edit button click function
    var qid, ques, modAns, crtAns, time, aid
    $("#mytbl tbody").on("click", ".tbl-edit", (e) => {
        e.preventDefault();
        qid = e.target.getAttribute("id");
        sn = $(e.target).parent().siblings(".sn").text();
        ques = $(e.target).parent().siblings(".ques").text();
        modAns = $(e.target).parent().siblings(".modAns").text();
        crtAns = $(e.target).parent().siblings(".crtAns").text();
        time = $(e.target).parent().siblings(".time").text();
        aid = $(e.target).parent().attr("id");
        modAns = modAns.split(',')
        insertHTML(qid, sn, ques, aid, modAns, crtAns, time)
        $("#myModalEdit").show(1000)
    })
    // html for update page model
    function insertHTML(qid, sn, ques, aid, modAns, crtAns, time) {
        $("#aid").val(aid)
        $("#eqno").val(sn)
        $("#qid").val(qid)
        $("#ques").val(ques)
        $("#ans1").val(modAns[0])
        $("#ans2").val(modAns[1])
        $("#ans3").val(modAns[2])
        $("#ans4").val(modAns[3])
        $("#crtAns").val(crtAns)
        $("#time").val(time)
    }
    //////////////////////////////////
    // Delete Button click Action
    $("#mytbl tbody").on("click", ".tbl-delete", (e) => {
        e.preventDefault();
        qid = $(e.target).prev().attr("id");
        aid = e.target.getAttribute("id");
        delet(qid, aid)
    })
    // Ajax function for delete data
    function delet(qid, aid) {
        $.ajax({
            // datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "post",
            data: { qid: qid, aid: aid, status: "deleteUni" },
            success: function (response) {
                // console.log(response)
                var data = JSON.parse(response);
                if (data.success == "true") {
                    alert("データが削除されました。")
                } else if (data.error == "false") {
                    alert("データ削除エラー")
                }
                location.reload()
                questionDisp(subid)
            }
        })
    }


    //////////////////////////////////
    // Form Submit Action
    var fdques, fdmodAns1, fdmodAns2, fdmodAns3, fdmodAns4, fdcrtAns, fdtime
    $("#editForm").on("submit", (e) => {
        e.preventDefault()
        var fd = new FormData($("#editForm")[0])
        fd.append('subid', subid)
        fd.append('status', 'update')
        fdeqno = fd.get('eqno')
        fdques = fd.get('ques')
        fdmodAns1 = fd.get('ans1')
        fdmodAns2 = fd.get('ans2')
        fdmodAns3 = fd.get('ans3')
        fdmodAns4 = fd.get('ans4')
        fdcrtAns = fd.get('crtAns')
        fdtime = fd.get('time')
        // console.log(Array.from(fd))
        if (sn == fdeqno && ques == fdques && modAns[0] == fdmodAns1 && modAns[1] == fdmodAns2 && modAns[2] == fdmodAns3 && modAns[3] == fdmodAns4 && crtAns == fdcrtAns && time == fdtime) {
            alert("Question was not changed")
            $("#editForm").trigger("reset")
            $("#myModalEdit").slideUp(1000);
        } else {
            // console.log("submit because not same")
            if (window.confirm("Following Data will be Submited " + "\n" +
                "-------------------------" + "\n" +
                "Q.No. :" + fdeqno + "\n" +
                "Question :" + fdques + "\n" +
                "Answer 1 :" + fdmodAns1 + "\n" +
                "Answer 2:" + fdmodAns2 + "\n" +
                "Answer 3:" + fdmodAns3 + "\n" +
                "Answer 4:" + fdmodAns4 + "\n" +
                "Correct Ans :" + fdcrtAns + "\n" +
                "Time :" + fdtime + "\n"
            )) { updateData(fd) }
            // updateData(fd)
        }
    })

    function updateData(data) {
        $.ajax({
            datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "post",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var data = JSON.parse(response);
                if (data.success == "true") {
                    alert("質問の更新が完了しました.")
                } else if (data.error == "false") {
                    alert("質問の更新が完了していません.")
                }
                $("#myModalEdit").hide(1000)
                questionDisp(subid)
            }
        })
    }
    ///////////////////////////////////////
    // Question add Button process
    $("#myBtn").on("click", (e) => {
        e.preventDefault()
        $("#myModalAdd").show(1000)
    })
    // Submit process
    $("#addForm").on("submit", (e) => {
        e.preventDefault()
        var fd = new FormData($("#addForm")[0])
        fd.append("subid", $("#subid").val())
        fd.append("status", "addQues")
        // console.log(Array.from(fd))
        quesAdd(fd)
    })
    // forData send function
    function quesAdd(data) {
        $.ajax({
            datatype: "json",
            url: "../ajaxfile/examAjax.php",
            type: "post",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                var response = JSON.parse(response);
                if (response.success == "true") {
                    alert("質問の更新が完了しました.")
                    $("#myModalAdd").hide(1000)
                    $("#addForm").trigger("reset")
                } else if (response.error == "false") {
                    alert("質問の更新が完了していません.")
                    $("#myModalAdd").hide(1000)
                    $("#addForm").trigger("reset")
                } else if (response.error == "false1") {
                    alert("質問番号はすでに登録しています。.")
                }
                questionDisp(subid)
            }
        })
    }
    cancle($('#Acancel'), $('#myModalAdd'), $('#addForm'))
    cancle($('#ucancel'), $('#myModalEdit'), $('#editForm'))
    // Cancle Button function
    function cancle(btnName, modalName, formName) {
        $(btnName).on('click', function () {
            $(modalName).slideUp(1000, "swing")
            $(formName).trigger("reset")
            // fetch_all_data();
        })
    }
})
