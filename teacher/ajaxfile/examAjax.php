<?php
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
$obj2 = new chat();
// query object end--------------
$arr = [];
if (isset($_POST["status"]) && $_POST["status"] == "fetchSubjects") {
    $subject = $obj->get_data("subject", "subid,subname,status");
    if (isset($subject[0])) {
        $arr['subject'] = $subject;
        $arr['total'] = [];
        $i = 0;
        foreach ($subject as $list) {
            $condi = ["subid" => "{$list['subid']}"];
            $question = $obj->get_data("question", "*", $condi);
            if (isset($question[0])) {
                $arr['total'][$i] = count($question);
            } else {
                $arr['total'][$i] = "0";
            }
            $i++;
        }
    } else {
        $arr['error'] = "false";
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "actv_dactv") {
    $subid = $_POST["subid"];
    $statid = $_POST["statid"];
    $condi = ["status" => $statid];
    $row = $obj->update_data("subject", $condi, "subid", $subid);
    if (isset($row)) {
        $arr['success'] = "true";
    } else {
        $arr['error'] = "false";
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "viewques") {
    $subid = $_POST["subid"];
    $sql = "SELECT * FROM question WHERE subid='{$subid}' ORDER BY sn;";
    $question = $obj2->get_data($sql);
    if (isset($question[0])) {
        $arr['question'] = $question;
        $i = 0;
        foreach ($question as $list) {
            $condi1 = ["subid" => "{$subid}", "qid" => "{$list['sn']}"];
            $answer = $obj->get_data("answer", "*", $condi1);
            if (isset($answer[0])) {
                $arr['answer'][$i] = $answer;
            } else {
                $arr['error'] = "false1";
            }
            $i++;
        }
    } else {
        $arr['error'] = "false";
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "update") {
    $quid = $obj1->get_safe_value($_POST["qid"]);
    $eqno = $obj1->get_safe_value($_POST["eqno"]);
    $ques = $obj1->get_safe_value($_POST["ques"]);
    $ans1 = $obj1->get_safe_value($_POST["ans1"]);
    $ans2 = $obj1->get_safe_value($_POST["ans2"]);
    $ans3 = $obj1->get_safe_value($_POST["ans3"]);
    $ans4 = $obj1->get_safe_value($_POST["ans4"]);
    $crtAns = $obj1->get_safe_value($_POST["crtAns"]);
    $time = $obj1->get_safe_value($_POST["time"]);
    $subid = $obj1->get_safe_value($_POST["subid"]);
    $aid = $obj1->get_safe_value($_POST["aid"]);
    $aidArray = explode(',', $aid);
    $ansArray = array($ans1, $ans2, $ans3, $ans4);
    $sql1 = "UPDATE answer SET answer='$ansArray[0]' WHERE subid='$subid' and qid='$quid' and aid='$aidArray[0]';";
    for ($i = 1; $i < count($ansArray); $i++) {
        $ans = $ansArray[$i];
        $ansId = $aidArray[$i];
        $sql1 .= "UPDATE answer SET answer='$ans',qid='$eqno' WHERE subid='$subid' and aid='$ansId';";
    }
    $row1 = $obj2->mult_qry($sql1);
    $sql = "UPDATE question SET correct_ans='$crtAns',question='$ques',time='$time',sn='$eqno' WHERE qid='$quid'";
    $row = $obj2->put_data($sql);
    if (isset($row1) && isset($row)) {
        // echo 1;
        $arr['success'] = "true";
    } else {
        // echo 0;
        $arr['error'] = "false";
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "addQues") {
    $qno = $_POST["qno"];
    $ques = $_POST["ques"];
    $ans1 = $_POST["ans1"];
    $ans2 = $_POST["ans2"];
    $ans3 = $_POST["ans3"];
    $ans4 = $_POST["ans4"];
    $crtAns = $_POST["crtAns"];
    $time = $_POST["time"];
    $subid = $_POST["subid"];
    $condi = ["subid" => $subid, "sn" => $qno];
    $row = $obj->get_data("question", "*", $condi);
    if (isset($row[0])) {
        $arr['error'] = "false1";
    } else {
        $ansArry = [$ans1, $ans2, $ans3, $ans4];
        $sql = "INSERT INTO answer (subid,qid,answer) VALUES('{$subid}','{$qno}','{$ansArry[0]}');";
        for ($i = 1; $i < count($ansArry); $i++) {
            $ans = $ansArry[$i];
            $sql .= "INSERT INTO answer (subid,qid,answer) VALUES('{$subid}','{$qno}','{$ans}');";
        }
        $row = $obj2->mult_qry($sql);
        $field = ["correct_ans" => "{$crtAns}", "subid" => "{$subid}", "question" => "{$ques}", "sn" => "{$qno}", "time" => "{$time}"];
        $row1 = $obj->insert2_data("question", $field);
        if (isset($row) && isset($row1)) {
            $arr['success'] = "true";
            // echo "true";
        } else {
            $arr['error'] = "false2";
            // echo "false";
        }
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "deleteUni") {
    // print_r($_POST);
    $qid = $_POST["qid"];
    $aid = $_POST["aid"];
    $aidArry = explode(",", $aid);
    foreach ($aidArry as $list) {
        $row1 = $obj->delete_data("answer", "aid", $list);
    }
    $row = $obj->delete_data("question", "qid", $qid);
    if (isset($row) && isset($row1)) {
        $arr['success'] = "true";
    } else {
        $arr['error'] = "false";
    }
} elseif (isset($_POST["status"]) && $_POST["status"] == "deleteAll") {
    // print_r($_POST);
    $subid = $_POST["subid"];
    $row = $obj->delete_data("question", "subid", $subid);
    $row1 = $obj->delete_data("answer", "subid", $subid);
    if (isset($row) && isset($row1)) {
        $arr['success'] = "true";
    } else {
        $arr['error'] = "false";
    }
}
echo json_encode($arr);
