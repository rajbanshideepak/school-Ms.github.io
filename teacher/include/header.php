<?php 
session_start(); 
require_once("../../database/db.php");
$obj = new query(); 
if(!isset($_SESSION['Islogin'])){
  header("location:../../index.php");
}
$condition =array("regno"=>"{$_SESSION['regno']}");
$row=$obj->get_data("teacherpf",'*',$condition);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management system</title>
    <link rel="shortcut icon" href="../../asset/image/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../../chatMessage/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body >

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <div class="mob">
        <div>
        <label for="check">
          <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
      </div>
      
        <div class="left_area">
          <h3>school management <span>system</span></h3>
        </div>
        <div class="right_area">
          <i class="fas fa-envelope fa-lg" aria-hidden="true" id="bell" onclick="window.location.href='../php/chatMessage.php'"><span>2</span></span></i>
          <i class="fas fa-bell fa-lg" aria-hidden="true" id="bell" onclick="window.location.href='../php/noticeboard.php'"><span>4</span></span></i>
          <a href="logout.php" class="logout_btn"><i class="fas fa-power-off"></i> Logout</a>
        </div>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
      <?php 
      $img="";
      if(isset($row[0])){
        $img =$row[0]['image'];
      }
       ?>
        <img src="../assets/uploads/<?php echo $img ?>" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <select name="lang" id="lang_mob"　style="margin-left: 36px;">
            <option value="en">EN</option>
            <option value="jp" selected>JP</option>
            <option value="np">NP</option>
            <option value="vi">VI</option>
            <!-- <option value="cn">CN</option> -->
        </select>
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span class="langu1">Dashboard</span></a>
        <a href="courseNfaculty.php"><i class="fas fa-cogs"></i><span class="langu1">Course & Faculty</span></a>
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='teacher' ){ ?>
        <a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i><span class="langu1">Teacher</span></a>
        <a href="faculty_atten.php"><i class="fas fa-clipboard"></i><span class="langu1">All Attendence</span></a>
        <?php } ?>
        <a href="students.php" id="student"><i class="fas fa-user-graduate"></i><span class="langu1">Student</span></a>
        <a href="exam.php"><i class="fas fa-book"></i><span class="langu1">Exam</span></a>
        <a href="result.php"><i class="fas fa-poll"></i><span class="langu1">Result</span></a>
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='admin' ){ ?>
        <a href="faculty_atten.php"><i class="fas fa-user"></i><span class="langu1">Attendance</span></a>
        <?php } ?>
        <a href="feemanage.php"><i class="fas fa-yen-sign"></i><span class="langu1">Fee Mangement</span></a>
        <a href="users.php"><i class="fas fa-users"></i><span class="langu1">Users</span></a>
        <a href="settings.php"><i class="fas fa-sliders-h"></i><span class="langu1">Settings</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="../assets/uploads/<?php echo $img ?>" class="profile_image" alt="">
        <h4><?php if(isset($_SESSION['email'])){echo $_SESSION['email']; }?></h4>
      </div>
      <select name="lang" id="lang"　style="margin-left: 36px;">
          <option value="en">EN</option>
          <option value="jp" selected>JP</option>
          <option value="np">NP</option>
          <option value="vi">VI</option>
          <!-- <option value="cn"></option> -->
        </select>
      <a href="dashboard.php"><i class="fas fa-desktop"></i><span class="langu">Dashboard</span></a>
      <a href="courseNfaculty.php"><i class="fas fa-cogs"></i><span class="langu">Course & Faculty</span></a>
       <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='teacher' ){ ?>
        <a href="teacher.php"><i class="fas fa-chalkboard-teacher"></i><span class="langu">Teacher</span></a>
        <a href="faculty_atten.php"><i class="fas fa-clipboard"></i><span class="langu">All Attendence</span></a>
        <?php } ?>
      <a href="students.php" id="student"><i class="fas fa-user-graduate"></i><span class="langu">Student</span></a>
      <a href="exam.php"><i class="fas fa-book"></i><span class="langu">Exam</span></a>
      <a href="result.php"><i class="fas fa-poll"></i><span class="langu">Result</span></a>
      <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='admin' ){ ?>
      <a href="faculty_atten.php"><i class="fas fa-user"></i><span class="langu">Attendance</span></a>
      <?php } ?>
      <a href="feemanage.php"><i class="fas fa-yen-sign"></i><span class="langu">Fee Mangement</span></a>
      <a href="users.php"><i class="fas fa-users"></i><span class="langu">users</span></a>
      <a href="settings.php"><i class="fas fa-sliders-h"></i><span class="langu">Settings</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="card">