<?php 
// session_start();
// print_r($_SESSION);
// include("../../database/db.php");
include("../../functions/function.php");
if(!isset($_SESSION['Islogin'])){
    redirect("../../index.php");
}
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
?>
<!--  -->
<div class="cont_nr" style="background-color: #201b26;background-color:rgba(0,0,0.3,black);color:#fff">
    <div class="row">
        <h3>Dashboard</h3>
    </div>
</div>
<hr>
<div class=".cont_nr">
  <div class="row" style="margin-bottom:50px">
        <div class="col-3">
        <a href="students.php" style="color:black"> 
             <div class="card">
                <img src="../images/student.png" alt="Avatar" style="width:100%; heigh:50%">
                <div class="container">
                    <h4><b>Student Details</b></h4>
                    <p>You can see all the student details</p>
                </div>
            </div>
        </a>
        </div>
        
        <div class="col-3">
           <a href="faculty_atten.php" style="color:black"> 
            <div class="card">
                <img src="../images/attendance.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b>Attendance Details</b></h4>
                    <p>Manage your student attendance</p>
                </div>
            </div>
            </a>
        </div>
        
        <?php if(isset($_SESSION['status']) && $_SESSION['status']=="admin"){ ?>
        <div class="col-3">
        <a href="teacher.php" style="color:black"> 
            <div class="card">
                <img src="../images/teacher.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b>Teacher Details</b></h4>
                    <p>you can see all the teacher details</p>
                </div>
            </div>
        </a>
        </div>
        <?php } ?>
        <div class="col-3">
        <a href="feemanage.php" style="color:black"> 
            <div class="card">
                <img src="../images/feemanage.png" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4><b>Fee Details</b></h4>
                    <p>By clicking manage Fee Details</p>
                </div>
            </div>
        </a>
        </div>
  </div>
  <!--  -->
  