<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
</head>
<!-- style="overflow:hidden" -->

<body>
    <input id="regid" type="hidden" value="<?php echo $_SESSION['regno'] ?>">
    <div id="cont">
        <div id="side">
            <div class="search_barr">
                <!-- <form autocomplate="off"> -->
                <input type="text" name="search" id="src_user" placeholder="type name....." oninput="filterList()">
                <!-- </form> -->
            </div>
            <div class="user_list">
                <div class="cato">
                    <input type="button" class="ubtn btn_success" id="teacher" value="Teacher">
                    <input type="button" class="ubtn btn_success active" id="student" value="Student">
                    <input type="button" class="ubtn btn_success" id="classMate" value="Grooup">
                </div>
                <div class="u_list">
                    <ul id="ul_list">
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="prof">
                <input type="hidden" value="">
                <img src="../images/teacher.png" alt="profile" srcset="">
                <div id="detil">
                    <h3 id="unam"></h3>
                    <!-- <h5>1 message form admin</h5> -->
                </div>
                <div id="icon">
                    <h3><i class="fas fa-video fa-lg"></i></h3>
                    <h3><i class="fas fa-phone fa-lg"></i></h3>
                </div>
            </div>
            <div id="chatBox">
                <ul id="chat">
                </ul>
                <footer>
                    <textarea placeholder="Type your message..."></textarea>
                    <a id="send" href="#"><i class="fas fa-paper-plane fa-lg"></i></a>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>