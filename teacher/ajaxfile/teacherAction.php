<?php
// session_start();
include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
if (isset($_SESSION['Islogin']) && isset($_SESSION['Islogin']) != 'yes') {
    redirect("../../index.php");
} else if (isset($_POST["status"]) && $_POST["status"] == "fetch") {
    $num_rec_per_page = 7;
    $page  = '';
    if (isset($_POST["page_no"])) {
        $page  = $_POST["page_no"];
    } else {
        $page = 1;
    };
    $start_from1 = ($page - 1) * $num_rec_per_page;
    $start_from = "$start_from1";
    $condi_array = array("status" => "teacher");
    $row = $obj->get_data('teacherpf', '*', '', 'pfId', 'desc', $start_from, $num_rec_per_page);
    // echo json_encode($row);
    //  $row=$obj->get_data("studentpf","*","","","",'0',$num_rec_per_page);
    //  die($row);
    //  $row=$obj->get_join_data('user','studentpf','*','userId',$condi_array,'','',$start_from,$num_rec_per_page);
    if (isset($row[0])) {
        $json[] = $row;
        $data['data'] = $json;

        $row1 = $obj->get_data('teacherpf');
        $result = count($row1);
        $data['total'] = $result;

        $data['faculty'] = "select * from teacherpf limit" . $start_from . "," . $num_rec_per_page;

        echo json_encode($data);
    } else {
        $data['error'] = "no data found";
        echo json_encode($data);
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'getData') {
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    $condi_array = array("pfId" => "{$userId}");
    $row = $obj->get_data("teacherpf", "*", $condi_array);
    // $row = $obj->get_join_data('user','studentpf','','userId',$condi_array);
    if (isset($row[0])) {
        $data['data'] = $row[0];
        echo json_encode($data);
    } else {
        $data['error'] = "no data found";
        echo json_encode($data);
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'update') {
    $userId = $_POST['userid'];
    $regno = $_POST['regno'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $nationality = $_POST['nation'];
    $zip = $_POST['zip'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $gender = $_POST['Gender'];
    $skill = implode(",", $_POST["skill"]);
    $hobby = implode(",", $_POST["hobby"]);
    $fileName = $_FILES['dp']['name'];
    $fileTmp = $_FILES['dp']['tmp_name'];
    $uploadDir = '../assets/uploads/';
    $dest_path = $uploadDir . $fileName;
    $condi_array = array(
        "pfId" => "{$userId}",
        "regno" => "{$regno}",
        "lname" => "{$lname}",
        "fname" => "{$fname}",
        "nationality" => "{$nationality}",
        "postcode" => "{$zip}",
        "address" => "{$address1}",
        "address1" => "{$address2}",
        "birthdate" => "{$dob}",
        "mobile" => "{$tel}",
        "sex" => "{$gender}",
        "skill" => "{$skill}",
        "hobby" => "{$hobby}"
    );
    if ($fileName != "") {
        $condi_array["image"] = "{$fileName}";
    }
    $row = $obj->update_data('teacherpf', $condi_array, 'pfId', $userId);
    if (isset($row)) {
        move_uploaded_file($fileTmp, $dest_path);
        echo 1;
    } else {
        echo 0;
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'delete') {
    $userId = $_POST['userId'];
    $status = $_POST['status'];
    $row = $obj->delete_data('teacherpf', 'pfId', $userId);
    if (isset($row)) {
        echo 1;
    } else {
        echo 0;
    }
} else if (isset($_POST['status']) && $_POST['status'] == 'insert') {
    $regno = $_POST["regno"];
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $nationality = $_POST["nation"];
    $postcode = $_POST["zip"];
    $address = $_POST["address1"];
    $address1 = $_POST["address2"];
    $birthdate = $_POST["dob"];
    $mobile = $_POST["tel"];
    $sex = $_POST["Gender"];
    $skill = implode(",", $_POST["skill"]);
    $hobby = implode(",", $_POST["hobby"]);
    $fileName = $_FILES['dp']['name'];
    $fileTmp = $_FILES['dp']['tmp_name'];
    // directory in which the uploaded file will be moved
    $uploadDir = '../assets/uploads/';
    $dest_path = $uploadDir . $fileName;
    // echo ("<pr>" . print_r($_POST) . "</pr>");
    $condi_array = array(
        "regno" => "{$regno}",
        "lname" => "{$lname}",
        "fname" => "{$fname}",
        "nationality" => "{$nationality}",
        "image" => "{$fileName}",
        "postcode" => "{$postcode}",
        "address" => "{$address}",
        "address1" => "{$address1}",
        "birthdate" => "{$birthdate}",
        "mobile" => "{$mobile}",
        "sex" => "{$sex}",
        "skill" => "{$skill}",
        "hobby" => "{$hobby}"
    );
    $row4 = $obj->insert2_data("teacherpf", $condi_array);
    // move_uploaded_file($fileTmp, $dest_path);
    if (isset($row4)) {
        move_uploaded_file($fileTmp, $dest_path);
        echo "dataSaved";
        // echo $hobby;
    }
}
