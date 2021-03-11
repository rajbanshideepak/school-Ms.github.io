$("document").ready(function () {
    // console.log($("#regid").val())
    // console.log($("#activeId").val())
    fetch_user()
    // fetch data for this page
    function fetch_user() {
        $("#chat").addClass("chat").html('<img src="../../asset/image/chat.png" alt="Chat" height="281" width="339">')
        $.ajax({
            dataType: "json",
            url: "../../chatMessage/chatMessageAjx.php",
            type: "POST",
            data: { status: 'fetch' },
            success: function (data) {
                // console.log(window.location)
                // console.log(data)
                sidelist(data.studentpf)
                var ubtn = document.getElementsByClassName("ubtn")
                for (var i = 0; i < ubtn.length; i++) {
                    ubtn[i].addEventListener("click", (e) => {
                        // alert("hello");
                        ubtn[0].classList.remove("active")
                        ubtn[1].classList.remove("active")
                        ubtn[2].classList.remove("active")
                        e.target.classList.add("active")
                        if (e.target.value == "Teacher") {
                            sidelist(data.teacherpf)
                        } else if (e.target.value == "Student") {
                            sidelist(data.studentpf)
                        }
                    })
                }
            }
        })
    }
    function sidelist(data) {
        // console.log(data)
        var list = ""
        // console.log(data)
        for (var i = 0; i < data.length; i++) {
            if (data[i].regno == $("#regid").val()) {
                console.log(data[i].regno)
                console.log($("#regid").val())
            } else {
                list += '<li class="dec">'
                list += '<img src="../assets/uploads/' + data[i].image + '" alt="profile" name="' + data[i].image + '">'
                list += '<a class="prevent" href="">'
                list += '<h3>' + data[i].lname + ' ' + data[i].fname + ''
                list += '</h3>'
                list += '</a>'
                list += '<input id="regno" type="hidden" value="' + data[i].regno + '">'
                list += '</li>'
            }
        }
        $("#ul_list").html(list)
    }

    // Fetech Message Function
    function fetchMsg(sender, receiver) {
        $.ajax({
            dataType: "json",
            url: "../../chatMessage/chatMessageAjx.php",
            type: "POST",
            data: {
                status: 'fetchMsg',
                sender: sender,
                receiver: receiver
            },
            success: function (data) {
                // console.log(data)
                if (data == "noData") {
                    $("#chat").addClass("chat").html('<img src="../../asset/image/chat.png" alt="Chat" height="281" width="339" class="cover">')
                } else {
                    $("#chat").removeClass("chat")
                    var msglist = ""
                    for (var i = 0; i < data.length; i++) {
                        if (data[i]["from_id"] == sender) {
                            msglist += '<li class="me">'
                            msglist += '<div class="entete">'
                            msglist += '<h3>' + data[i]["timeStamp"] + '</h3>'
                            msglist += '<h2 style="margin:10px;">' + data[i]["from_id"] + '</h2>'
                            msglist += '<span class="status blue"></span>'
                            msglist += '</div>'
                            msglist += '<div class="triangle"></div>'
                            msglist += '<div class="message">' + data[i]["chat_msg"] + '</div>'
                            msglist += '</li>'
                        } else if (data[i]["from_id"] == receiver) {
                            msglist += '<li class="you">'
                            msglist += '<div class="entete">'
                            msglist += '<span class="status green"></span>'
                            msglist += '<h2 style="margin:10px;">' + data[i]["from_id"] + '</h2>'
                            msglist += '<h3>' + data[i]["timeStamp"] + '</h3>'
                            msglist += '</div>'
                            msglist += '<div class="triangle"></div>'
                            msglist += '<div class="message">' + data[i]["chat_msg"] + '</div>'
                            msglist += '</li>'
                        }
                    }
                    $("#chat").html(msglist)
                    // scroolUp("chat", "scrollHeight", 500)
                }
            }
        })
    }

    // var sender = $("#regid").val();
    var sender = $("#regid").val();
    var setInterID = setInterval(function () {
        var receiver = updateMsg();
        fetchMsg(sender, receiver)
    }, 1000)

    $(document).on('click', '.dec', function (e) {
        e.preventDefault();
        $("#main").css("display", "block")
        var imgName = $(this).find("img").attr("src")
        var usrnm = $(this).find("h3").text()
        var receiver = $(this).find("#regno").val()

        $("#prof>input").val(receiver)
        $("#prof").find("img").attr("src", imgName)
        $("#prof>#detil").find("h3").text(usrnm)
        fetchMsg(sender, receiver)
        scroolUp("chat", "scrollHeight", "500")
        $("#ul_list>li").each(function () {
            $(this).attr("data", "")
        })
        $(this).attr("data", "to_user")
        // console.log(updateMsg())
    });

    // receiver value
    function updateMsg() {
        var regId = ""
        $("#ul_list>li").each(function () {
            if ($(this).attr("data") == "to_user") {
                regId = $(this).find("#regno").val()
            }
        })
        return regId
    }

    // Scrool UP function
    scroolUp("chat", "scrollHeight", "500")
    function scroolUp(target, properti, time) {
        $('#' + target).animate({ scrollTop: $('#' + target).prop(properti) }, time);
    }
    // Message send function
    function sendMsg(sender, receiver, message) {
        $.ajax({
            dataType: "json",
            url: "../../chatMessage/chatMessageAjx.php",
            type: "POST",
            data: {
                status: 'sendMsg',
                sender: sender,
                receiver: receiver,
                msg: message
            },
            success: function (data) {
                // console.log(data)
                if (data[0]) {
                    $("#chat").removeClass("chat")
                    // chatList(data, sender, receiver)
                    fetchMsg()
                }
            }
        })
    }
    // Message Sending process
    $("#chatBox > footer > a").on("click", (e) => {
        e.preventDefault()
        var message = $("#chatBox>footer>textarea").val()
        var receiver = $("#prof>input").val()
        var sender = $("#regid").val();
        if (sender != "" && receiver != "" && message != "") {
            sendMsg(sender, receiver, message)
            $("#chatBox>footer>textarea").val("")
            scroolUp("chat", "scrollHeight", "500")
        } else {
            alert("メッセージ送るためまずユーザーを選んでください。")
        }
    })
})