<?php
  require_once("../../database/db.php");
 session_start() ;

$obj = new query(); 
 $regno = $_SESSION['regno'];

 $condi_arr=array("regno"=>"{$regno}");
 $row=$obj->get_data("studentpf","*",$condi_arr);
 $row=$row[0];
if(isset($row)){
 ?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management system</title>
    <link rel="shortcut icon" href="../../asset/image/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../../chatMessage/student_chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

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
          <a href="message.php" title="メッセージ"><i class="fas fa-envelope fa-lg" aria-hidden="true" id="bell"><span>!</span></i></a>
          <?php
              $condi_arr=array("status"=>"1");
              $noti="";
              $count=$obj->get_data("noticeboard","",$condi_arr);
              if($count[0]){
                $noti=count($count);
              }else{
                $noti="0";
              }
          ?>
          <a href="notification.php?cnt=<?php echo $noti; ?>"><i class="fas fa-bell fa-lg" aria-hidden="true" id="bell" title="掲示板"><span><?php echo $noti?> </span></i></a>
          <a href="../php/logout.php" class="logout_btn" title="ログアウト"><i class="fas fa-power-off"></i> Logout</a>
        </div>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
      <select name="lang" id="lang1"　style="margin-left: 36px;">
          <option value="en">EN</option>
          <option value="jp" selected>JP</option>
          <option value="np">NP</option>
          <option value="vi">VI</option>
          <!-- <option value="cn">CN</option> -->
        </select>
        <img src="../../teacher/assets/uploads/<?php echo $row['image']?>" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="../php/home"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="../php/exam"><i class="fas fa-book"></i><span>Exam</span></a>
        <a href="../php/result"><i class="fas fa-poll"></i><span>Result</span></a>
        <a href="../php/attendance"><i class="fas fa-user"></i><span>Attendance</span></a>
        <a href="../php/myfee"><i class="fas fa-yen-sign"></i><span> My Fee detials</span></a>
        <a href="../php/apply"><i class="fas fa-closed-captioning"></i><span>Apply</span></a>
        <!-- <a href="../php/about.php"><i class="fas fa-info-circle"></i><span>About</span></a> -->
        <a href="../php/settings"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
        <select name="lang" id="lang"　style="margin-left: 36px;">
          <option value="en">EN</option>
          <option value="jp" selected>JP</option>
          <option value="np">NP</option>
          <option value="vi">VI</option>
          <!-- <option value="cn">CN</option> -->
        </select>
      <div class="profile_info">
        <img src="../../teacher/assets/uploads/<?php echo $row['image']?>" class="profile_image" alt="">
        <h4><?php echo $_SESSION['email']; ?></h4>
      </div>
        <a href="../php/home"><i class="fas fa-desktop"></i><span class="langu">Dashboard</span></a>
        <a href="../php/exam"><i class="fas fa-book"></i><span class="langu">Exam</span></a>
        <a href="../php/result"><i class="fas fa-poll"></i><span class="langu">Result</span></a>
        <a href="../php/attendance"><i class="fas fa-user"></i><span class="langu">Attendance</span></a>
        <a href="../php/myfee"><i class="fas fa-yen-sign"></i><span class="langu"> My Fee detials</span></a>
        <a href="../php/apply"><i class="fas fa-closed-captioning"></i><span class="langu">Apply</span></a>
        <!-- <a href="../php/about.php"><i class="fas fa-info-circle"></i><span>About</span></a> -->
        <a href="../php/settings"><i class="fas fa-sliders-h"></i><span class="langu">Settings</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="card">
        <?php } ?>
        