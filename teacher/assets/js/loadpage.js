$(document).ready(() => {
    /*postal code js start */
    $("#zipbtn").click(function () {
        var code = $("#zip").val();
        $("#zipbtn").val("please wait a second")
        if (code.length == 7 && code != "") {
            $.ajax({
                url: "../ajaxfile/postalcode.php?",
                type: "POST",
                data: { code: code },
                success: function (data) {
                    $("#address1").val(data);
                    $("#zipbtn").val("search address")
                }
            });
        }
        else {
            $("#zipbtn").val("search address")
            $("#zipMsg").attr("class", "danger").html("郵便番号番号がまちがっています。");
            $("#zip").on("input", () => {
                $("#zipMsg").html("")
            })
        }
    });
    $("#myModalEdit #zipbtn").click(function () {
        var code = $("#myModalEdit #zip").val();
        $("#myModalEdit #zipbtn").val("please wait a second")
        if (code.length == 7 && code != "") {
            $.ajax({
                url: "../ajaxfile/postalcode.php?",
                type: "POST",
                data: { code: code },
                success: function (data) {
                    $("#myModalEdit #address1").val(data);
                    $("#myModalEdit #zipbtn").val("search address")
                }
            });
        }
        else {
            $("#myModalEdit #zipbtn").val("search address")
            $("#myModalEdit #zipMsg").attr("class", "danger").html("郵便番号番号がまちがっています。");
            $("#myModalEdit #zip").on("input", () => {
                $("#myModalEdit #zipMsg").html("")
            })
        }
    });
    /*postal code js end */
    // ------------------------------table load start--------------------------------------------//
    var page = 1;
    var current_page = 1;
    // var total_page = 0;
    var is_ajax_fire = 0;
    manageData();
    /* manage data list */
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: "../ajaxfile/studentAction.php",
            type: "post",
            data: { status: 'fetch' },
            success: function (data) {
                // console.log(data);
                var per_page = 7;
                if (data.total > per_page) {
                    total_page = Math.ceil(data.total / per_page);
                }
                else {
                    total_page = Math.floor(data.total / per_page);
                }
                var ancr = "";
                for (i = 1; i <= total_page; i++) {
                    // console.log(i);
                    if (current_page == i) {
                        ancr += '<a href="#" class="pgnbtn active ">' + i + '</a>';
                    } else {
                        ancr += '<a href="#" class="pgnbtn" >' + i + '</a>';
                    }
                }
                $('#pagination').html(ancr);

                $(document).on('click', '#pagination a', function () {
                    var id = $(this).text();
                    page = id;
                    current_page = id;
                    var page_no = $("#pagination a")
                    $(page_no).each(function () {
                        var value = $(this).text();
                        if (value == id) {
                            $(this).addClass("active");
                        } else {
                            $(this).removeClass("active");
                        }
                    })
                    getPageData()

                });
                manageRow(data.data);

            }
        });
    }
    // getPageData();
    /* Get Page Data*/
    function getPageData() {
        $.ajax({
            dataType: 'json',
            url: "../ajaxfile/studentAction.php",
            type: "post",
            data: { page_no: page, status: 'fetch' },
            success: function (data) {
                manageRow(data.data);
                // $("tbody").html(data);
            }
        });
    }
    //  manage row of table;
    function manageRow(data) {
        //  console.log(data);
        var sn = 1;
        var rows = '';
        $.each(data[0], function (key, value) {
            rows = rows + '<tr>';
            rows = rows + '<td>' + sn + '</td>';
            rows = rows + '<td><img src="../assets/uploads/' + value.image + '" width="40px" height="30px" alt="DP"></img></td>';
            rows = rows + '<td>' + value.lname + " " + value.fname + '</td>';
            // rows = rows + '<td>'+value.eMail+'</td>';
            rows = rows + '<td>' + value.mobile + '</td>';
            rows = rows + '<td>' + value.address + '</td>';
            rows = rows + '<td>' + value.faculty + '</td>';
            rows = rows + '<td>' + value.course + '</td>';
            rows = rows + '<td>';
            rows = rows + "<a href='#' class='tbl-edit smBtn' id='" + value.pfId + "'>Edit</a>";
            rows = rows + "<a href='#' class='tbl-delete smBtn-d' id='" + value.pfId + "'>Delete</a>";
            rows = rows + '</td>';
            rows = rows + '</tr>';
            sn++;
        });
        $("tbody").html(rows);
        $("tbody td").css("text-transform", "capitalize");
    }

    /* edit the table data form ajax start*/
    $(document).on('click', '.tbl-edit', function (e) {
        e.preventDefault();
        var id = $(this).attr("id");
        $.ajax({
            url: "../ajaxfile/studentAction.php",
            type: "post",
            data: { userId: id, status: 'getData' },
            success: function (data) {
                var val1 = JSON.parse(data);
                var val = val1.data;
                // console.log(val)
                $("#myModalEdit").fadeIn();
                $("#myModalEdit").css("display", "flex");
                $("#myModalEdit #regno").val(val.regno);
                $("#myModalEdit #userid").val(val.pfId);
                $("#myModalEdit #lname").val(val.lname);
                $("#myModalEdit #fname").val(val.fname);
                $("#myModalEdit #nation").val(val.nationality);
                // $("#myModalEdit #dp").val(val.image);
                $("#myModalEdit #zip").val(val.postcode);
                $("#myModalEdit #address1").val(val.address);
                $("#myModalEdit #address2").val(val.address1);
                $("#myModalEdit #dob").val(val.birthdate);
                $("#myModalEdit #tel").val(val.mobile);
                var check = "checked";
                if (val.sex == "male") {
                    $("#myModalEdit #male").attr("checked", check);
                } else if (val.sex == "female") {
                    $("#myModalEdit #female").attr("checked", check);
                } else {
                    $("#myModalEdit #sexother").attr("checked", check);
                }
                // faculty selected
                var facval = val.faculty;
                var fac = $("#myModalEdit #faculty option")
                // console.log(facval)
                fac.each(function () {
                    // console.log($(this).val())
                    if ($(this).val() == facval) {
                        $(this).attr("selected", true)
                    }
                })
                // course selected
                var corsval = val.course;
                if ($("#myModalEdit #faculty option").is(":selected")) {
                    var select_val = $("#myModalEdit #faculty").val()
                    $.ajax({
                        url: "../ajaxfile/fetchFacultyCourse.php",
                        type: "post",
                        data: { select_val: select_val },
                        success: function (response) {
                            // console.log(response)
                            $("#myModalEdit #course option:not(:first)").remove();
                            var result = $.parseJSON(response);
                            var i = 0;
                            // console.log(result)
                            $.each(result.course, function () {
                                // console.log(result.course)
                                if (result.course[i].cname == corsval) {
                                    $("#myModalEdit #course").append($('<option>', {
                                        value: result.course[i].cname,
                                        text: result.course[i].cname,
                                        selected: true
                                    }));

                                } else {
                                    $("#myModalEdit #course").append($('<option>', {
                                        value: result.course[i].cname,
                                        text: result.course[i].cname,
                                    }));
                                }
                                i++;
                            });
                        },
                    });
                }
                // ----------------------------  
                // hobby check setup
                var hobby1 = []
                var hobby = val.hobby.split(",")
                for (var i = 0; i < hobby.length; i++) {
                    var hob = hobby[i].toLowerCase();
                    // console.log(hob);
                    hobby1.push(hob);
                }
                // console.log(hobby1);
                $('#myModalEdit input[name="hobby[]"]').each(function () {
                    var val = $(this).val();
                    if (inArray(val, hobby1)) {
                        $(this).attr("checked", true)
                    } else {
                        $(this).attr("checked", false)
                    }
                })
            }
        });
    });
    // ChecBox subset inArray function
    function inArray(val, arr) {
        for (var i = 0; i < arr.length; i++) {
            if (val == arr[i]) {
                return true;
                break;
            }
        }
    }
    /*edit the table data ends*/

    /*update table data starts */
    $("#update_btn").click(function (e) {
        e.preventDefault();
        // ##############################################################
        function blnkinput(mark) {
            var blk = $(mark).val().trim() == "";
            return blk;
        }
        function clearMsg(mark) {
            var fun = $(mark).on("input", function () {
                $(this).next().text("");
            })
            return fun;
        }
        // AddForm validation Start
        // regex patterns
        var namePattr = /^[A-Za-z]{2,}$/;
        var zipPattr = /^[0-9]{7}$/;
        var mobPattr = /^[0-9]{9,15}$/;
        var errors = [];
        var lname = $("#myModalEdit #lname").val();
        var fname = $("#myModalEdit #fname").val();
        var zip = $("#myModalEdit #zip").val();
        var tel = $("#myModalEdit #tel").val();
        var match = ['jpeg', 'png', 'jpg'];
        var ext = $("#myModalEdit #dp").val().toLowerCase().split(".").pop()
        if (blnkinput("#myModalEdit #regno")) {
            errors[0] = $("#myModalEdit #regnoMsg").attr("class", "danger").text("学籍番号は空白にしないでください。");
            clearMsg("#myModalEdit #regno")
        }
        if (blnkinput("#myModalEdit #lname")) {
            errors[1] = $("#myModalEdit #lnameMsg").attr("class", "danger").text("姓は空白にしないでください。");
            clearMsg("#myModalEdit #lname")
        } else if (!namePattr.test(lname)) {
            errors[1] = $("#myModalEdit #lnameMsg").attr("class", "danger").text("姓は文字のみにする必要があります。");
            clearMsg("#myModalEdit #lname")
        }
        if (blnkinput("#myModalEdit #fname")) {
            errors[2] = $("#myModalEdit #fnameMsg").attr("class", "danger").text("名は空白にしないでください。");
            clearMsg("#myModalEdit #fname")
        } else if (!namePattr.test(fname)) {
            errors[2] = $("#myModalEdit #fnameMsg").attr("class", "danger").text("名は文字のみにする必要があります。");
            clearMsg("#myModalEdit #fname")
        }
        if (blnkinput("#myModalEdit #nation")) {
            errors[3] = $("#myModalEdit #nationMsg").attr("class", "danger").text("国籍は空白にしないでください。");
            clearMsg("#myModalEdit #nation")
        }
        // if (blnkinput("#myModalEdit #dp")) {
        //     errors[6] = $("#myModalEdit #dpMsg").attr("class", "danger").text("写真は空白にしないでください。");
        //     clearMsg("#myModalEdit #dp")
        // } else 
        if (!((ext == match[0]) || (ext == match[1]) || (ext == match[2]) || (ext == ""))) {
            errors[4] = $("#myModalEdit #dpMsg").attr("class", "danger").text("写真はJPG,JEPGやPNGだけでお願いします。");
            clearMsg("#myModalEdit #dp")
        }
        if (blnkinput("#myModalEdit #zip")) {
            errors[5] = $("#myModalEdit #zipMsg").text("郵便番号は空白にしないでください。")
            clearMsg("#myModalEdit #zip")
        } else if (!zipPattr.test(zip)) {
            errors[5] = $("#myModalEdit #zipMsg").text("郵便番号は８桁のみにする必要があります。");
            clearMsg("#myModalEdit #zip")
        }
        if (blnkinput("#myModalEdit #address1")) {
            errors[6] = $("#myModalEdit #addr1Msg").attr("class", "danger").text("住所は空白にしないでください。")
            clearMsg("#myModalEdit #address1")
            if ($("#myModalEdit #address1").val() != "") {
                $("#myModalEdit #addr1Msg").text("");
            }
        }
        if (blnkinput("#myModalEdit #address2")) {
            errors[7] = $("#myModalEdit #addr2Msg").attr("class", "danger").text("住所は空白にしないでください。")
            clearMsg("#myModalEdit #address2")
        }
        if (blnkinput("#myModalEdit #dob")) {
            errors[8] = $("#myModalEdit #dobMsg").attr("class", "danger").text("誕生日は空白にしないでください。")
            clearMsg("#myModalEdit #dob")
        }
        if (blnkinput("#myModalEdit #tel")) {
            errors[9] = $("#myModalEdit #telMsg").attr("class", "danger").text("電話番号は空白にしないでください。")
            clearMsg("#myModalEdit #tel")
        } else if (!mobPattr.test(tel)) {
            errors[9] = $("#myModalEdit #telMsg").attr("class", "danger").text("電話番号は数字のみにする必要があります。");
            clearMsg("#myModalEdit #tel")
        }
        if (!$('#myModalEdit input[name="Gender"]').is(":checked")) {
            errors[10] = $("#myModalEdit #sexMsg").attr("class", "danger").text("性別は空白にしないでください。")
            $('#myModalEdit input[name="Gender"]').on("input", function () {
                $("#myModalEdit #sexMsg").text("");
            })
        }
        if (blnkinput("#myModalEdit #faculty")) {
            errors[11] = $("#myModalEdit #facultyMsg").attr("class", "danger").text("学科は空白にしないでください。")
            clearMsg("#myModalEdit #faculty")
        }
        if (blnkinput("#myModalEdit #course")) {
            errors[12] = $("#myModalEdit #courseMsg").attr("class", "danger").text("コース名は空白にしないでください。")
            clearMsg("#myModalEdit #course")
        }
        if (!$('#myModalEdit input[name="hobby[]"]').is(":checked")) {
            // if ($(".hob:checked").val() == null) {
            errors[13] = $("#myModalEdit #hobbyMsg").attr("class", "danger").text("趣味は空白にしないでください。")
            $('#myModalEdit input[name="hobby[]"]').on("input", function () {
                $("#myModalEdit #hobbyMsg").text("");
            })
        }
        // ##############################################################
        var id = $("#myModalEdit #userid").val();
        var regno = $("#myModalEdit #regno").val();
        var address1 = $("#myModalEdit #address1").val();
        var address2 = $("#myModalEdit #address2").val();
        var nation = $("#myModalEdit #nation").val();
        var dob = $("#myModalEdit #dob").val();
        var faculty = $("#myModalEdit #faculty option:selected").val();
        var course = $("#myModalEdit #course option:selected").val();
        var gender = $("#myModalEdit [name=Gender]:checked").val()
        var selectedHobby = new Array();
        $('#myModalEdit input[name="hobby[]"]:checked').each(function () {
            selectedHobby.push(this.value);
        });
        // Create FormData
        var fd = new FormData($("#addFormEdit")[0])
        fd.append('status', 'update');
        // console.log(Array.from(fd))
        if (errors == "") {
            if (window.confirm("Following Data will be Submited " + "\n" +
                "-------------------------" + "\n" +
                "UserId :" + id + "\n" +
                "RegisterNo :" + regno + "\n" +
                "LastName :" + lname + "\n" +
                "firstName :" + fname + "\n" +
                "nationality :" + nation + "\n" +
                "Postalcode :" + zip + "\n" +
                "Address 1 :" + address1 + "\n" +
                "Address 2 :" + address2 + "\n" +
                "Date of birth :" + dob + "\n" +
                "Tele phone :" + tel + "\n" +
                "Faculty :" + faculty + "\n" +
                "Course :" + course + "\n" +
                "Gender :" + gender + "\n" +
                "Hobby :" + selectedHobby + "\n"
            )) {
                $.ajax({
                    // dataType: 'json',
                    url: "../ajaxfile/studentAction.php",
                    type: "post",
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#update_btn').attr("disabled", "disabled");
                        $('#addFormEdit').css("opacity", ".5");
                    },
                    success: function (data) {
                        // console.log(data);
                        if (data == 1) {
                            getPageData();
                            alert("data updated successfully");
                            $("#addFormEdit").trigger("reset");
                            $("#myModalEdit").fadeOut();
                            $("#myModalEdit").hide();
                        } else {
                            getPageData();
                            alert("data update unsuccessfull");
                            $("#myModalEdit").fadeOut();
                            $("#myModalEdit").hide();
                        }
                        $('#addFormEdit').css("opacity", "");
                        $("#update_btn").removeAttr("disabled");
                    }
                });
            }
        } else {
            $("#myModalEdit #lastMsg").attr("class", "danger").text("まず、すべてのエラーを解決して下さい。").show("slow").fadeOut(4000)
        }
    });
    /*update table data ends */

    $("#cancel").click(function () {
        getPageData();
        $("#addFormEdit").trigger("reset");
        $("#myModalEdit").fadeOut();
        $("#myModalEdit").hide();
        $("#addFormEdit span").removeClass().text("");
    });

    /*delete the data from table */
    $(document).on('click', '.tbl-delete', function (e) {
        e.preventDefault();
        var id = $(this).attr("id");
        var c_obj = $(this).parents("tr");
        if (confirm("Are you sure do you want to delete?")) {
            $.ajax({
                url: "../ajaxfile/studentAction.php",
                type: "post",
                data: { userId: id, status: 'delete' },
                success: function (data) {
                    // console.log(data);
                    if (data != 1) {
                        c_obj.remove();
                        alert("data deleted successfully");
                        getPageData();
                    } else {
                        alert("data delete Unsuccessfully");
                    }
                }
            });
        }
    });

    // ##################################################################
    // ###################  ADD FORM ####################################
    $("#addForm").on("submit", function (e) {
        e.preventDefault();
        function blnkinput(mark) {
            var blk = $(mark).val() == "";
            return blk;
        }
        function clearMsg(mark) {
            var fun = $(mark).on("input", function () {
                $(this).next().text("");
            })
            return fun;
        }
        // Form validation Start
        //regex patterns
        var namePattr = /^[A-Za-z]{2,}$/;
        var zipPattr = /^[0-9]{7}$/;
        var mobPattr = /^[0-9]{9,}$/;
        var errors = [];
        var lname = $("#lname").val()
        var fname = $("#fname").val()
        var zip = $("#zip").val()
        var tel = $("#tel").val()
        var match = ['jpeg', 'png', 'jpg'];
        var ext = $("#dp").val().toLowerCase().split(".").pop()
        // console.log(ext)


        if (blnkinput("#regno")) {
            errors[0] = $("#regnoMsg").attr("class", "danger").text("学籍番号は空白にしないでください。");
            clearMsg("#regno")
        }
        else if ($("#regno").val().trim() != "") {
            var regno = $("#regno").val()
            function getValues() {
                var res = $.ajax({
                    url: "../ajaxfile/fetchFacultyCourse.php",
                    type: "post",
                    data: { regno_fetch: 1, regno: regno },
                    success: function (data) {
                    }
                })
                return res.responseText;
            }
            var result = getValues()
            if (result == "alreadySaved") {
                errors[0] = $("#regnoMsg").attr("class", "danger").text("学籍番号すでに保存しています。");
                clearMsg("#regno")
            }

        }
        if (blnkinput("#lname")) {
            errors[1] = $("#lnameMsg").attr("class", "danger").text("姓は空白にしないでください。");
            clearMsg("#lname")
        } else if (!namePattr.test(lname)) {
            errors[1] = $("#lnameMsg").attr("class", "danger").text("姓は文字のみにする必要があります。");
            clearMsg("#lname")
        }
        if (blnkinput("#fname")) {
            errors[2] = $("#fnameMsg").attr("class", "danger").text("名は空白にしないでください。");
            clearMsg("#fname")
        } else if (!namePattr.test(fname)) {
            errors[2] = $("#fnameMsg").attr("class", "danger").text("名は文字のみにする必要があります。");
            clearMsg("#fname")
        }
        if (blnkinput("#nation")) {
            errors[3] = $("#nationMsg").attr("class", "danger").text("国籍は空白にしないでください。");
            clearMsg("#nation")
        }
        if (blnkinput("#dp")) {
            errors[4] = $("#dpMsg").attr("class", "danger").text("写真は空白にしないでください。");
            clearMsg("#dp")
        } else if (!((ext == match[0]) || (ext == match[1]) || (ext == match[2]))) {
            errors[4] = $("#dpMsg").attr("class", "danger").text("写真はJPG,JEPGやPNGだけでお願いします。");
            clearMsg("#dp")
        }
        if (blnkinput("#zip")) {
            errors[5] = $("#zipMsg").text("郵便番号は空白にしないでください。")
            clearMsg("#zip")
        } else if (!zipPattr.test(zip)) {
            errors[5] = $("#zipMsg").text("郵便番号は８桁のみにする必要があります。");
            clearMsg("#zip")
        }
        if (blnkinput("#address1")) {
            errors[6] = $("#addr1Msg").attr("class", "danger").text("住所は空白にしないでください。")
            clearMsg("#address1")
        }
        if (blnkinput("#address2")) {
            errors[7] = $("#addr2Msg").attr("class", "danger").text("住所は空白にしないでください。")
            clearMsg("#address2")
        }
        if (blnkinput("#dob")) {
            errors[8] = $("#dobMsg").attr("class", "danger").text("誕生日は空白にしないでください。")
            clearMsg("#dob")
        }
        if (blnkinput("#tel")) {
            errors[9] = $("#telMsg").attr("class", "danger").text("電話番号は空白にしないでください。")
            clearMsg("#tel")
        } else if (!mobPattr.test(tel)) {
            errors[9] = $("#telMsg").attr("class", "danger").text("電話番号は数字のみにする必要があります。");
            clearMsg("#tel")
        }
        if (!$('input[name="Gender"]').is(":checked")) {
            errors[10] = $("#sexMsg").attr("class", "danger").text("性別は空白にしないでください。")
            $('input[name="Gender"]').on("input", function () {
                $("#sexMsg").text("");
            })
        }
        if (blnkinput("#faculty")) {
            errors[11] = $("#facultyMsg").attr("class", "danger").text("学科は空白にしないでください。")
            clearMsg("#faculty")
        }
        if (blnkinput("#course")) {
            errors[12] = $("#courseMsg").attr("class", "danger").text("コース名は空白にしないでください。")
            clearMsg("#course")
        }
        if (!$('input[name="hobby[]"]').is(":checked")) {
            // if ($(".hob:checked").val() == null) {
            errors[13] = $("#hobbyMsg").attr("class", "danger").text("趣味は空白にしないでください。")
            $('input[name="hobby[]"]').on("input", function () {
                $("#hobbyMsg").text("");
            })
        }

        var fd = new FormData(this);
        fd.append('status', 'insert');
        var entry = []
        for (var valu of fd.values()) {
            entry.push(valu);
        }
        var selectedHobby = new Array();
        $('input[name="hobby[]"]:checked').each(function () {
            selectedHobby.push(this.value);
        });
        if (errors == "") {
            if (window.confirm("Following Data will be Submited " + "\n" +
                "-------------------------" + "\n" +
                "RegisterNo :" + entry[0] + "\n" +
                "LastName :" + entry[1] + "\n" +
                "firstName :" + entry[2] + "\n" +
                "nationality :" + entry[3] + "\n" +
                "Postalcode :" + entry[5] + "\n" +
                "Address 1 :" + entry[6] + "\n" +
                "Address 2 :" + entry[7] + "\n" +
                "Date of birth :" + entry[8] + "\n" +
                "Tele phone :" + entry[9] + "\n" +
                "Gender :" + entry[10] + "\n" +
                "Faculty :" + entry[11] + "\n" +
                "Course :" + entry[12] + "\n" +
                "Hobby :" + selectedHobby + "\n"
            ))
                $.ajax({
                    url: '../ajaxfile/studentAction.php',
                    type: 'post',
                    data: fd,
                    // dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#subtn').attr("disabled", "disabled");
                        $('#addForm').css("opacity", ".5");
                    },
                    success: function (response) {
                        // console.log(response)
                        if (response == "dataSaved") {
                            // console.log(response)
                            alert("プロファイル作成終了です。");
                            $("#myModal").fadeOut();
                            $("#myModal").hide();
                            getPageData();
                        }
                        $('#addForm').css("opacity", "");
                        $("#subtn").removeAttr("disabled");
                    }
                })
        } else {
            $("#lastMsg").attr("class", "danger").text("まず、すべてのエラーを解決して下さい。").show("slow").fadeOut(4000)
        }
    })
    $("#canclebtn").click(function () {
        getPageData();
        $("#addForm").trigger("reset");
        $("#myModal").fadeOut();
        $("#myModal").hide();
        $("#addForm span").removeClass().text("");
    });
    $("#myBtn").click(function () {
        $("#addForm").trigger("reset");
        $("#addForm span").removeClass().text("");
    })
});