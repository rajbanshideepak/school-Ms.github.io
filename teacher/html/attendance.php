
    <?php 
    date_default_timezone_set("Asia/Tokyo");
// session_start();
// include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
$facultyRow = $obj->get_data('faculty');
$courseRow = $obj->get_data('course');
// print_r($courseRow);
?>

<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
        <div class="back">
        <a href="faculty_atten.php">
            <h4><i class="fa fa-backward" aria-hidden="true"></i> Back</h4>
        </a>
        </div>
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by student names" oninput="filter()">
        </div> 
            <h3>Attendance</h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add student Attendance</button>
            </div>
        </div>
        <!-- The Modal of add  attendance -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content" style="overflow-y:auto;"> 
                <div class="modal-head">
                    <h4>Student Details</h4>
                    <span class="close">&times;</span>
                </div> 
                <form id="addaten" autocomplete="off">
                    <div class="modal-body">
                    <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="regno">Register No:</label>
                                    <input type="text" name="regno" id="regno" placeholder="Enter reg no" value="">
                                    <span id="regcheck"></span>
                                </div>           
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="time">Time</label>
                                    <input type="time" name="time" id="time" value="<?php echo date('h:i');?>">
                                    <span id="timecheck"></span>
                                </div>           
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d')?>">
                                    <span id="datecheck"></span>
                                </div>           
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="status">Status</label>
                                    <select name="select" id="status">
                                        <option value="">Select status</option>
                                        <option value="1" selected>Present</option>
                                        <option value="0">absence</option>
                                    </select>
                                    <span id="statuscheck"></span>
                                </div>           
                            </div>
                            
                            <div class="row">
                                    <input type="submit" class="btn_success" id="addatten" value="Submit">   
                            </div>
                            
                        </div>
    
                    </div>
                        
                    
                </form>
                
                </div>

            </div>
    <!-- The Modal of exam category end-->
 <!-- The Modal of exam category  -->
<div id="myModalEdit" class="modal">
<!-- Modal content -->
<div class="modal-content" style="overflow-y:auto;"> 
<div class="modal-head">
    <h4>Update Student Attendance</h4>
    <span class="close">&times;</span>
</div> 
<form action="#" method="post" id="editForm">
    <div class="modal-body">
        <div class="cont_nr">
            <div class="row">
                <div class="col">
                    <!-- <label for="regno">Register No:</label> -->
                    <input type="hidden" name="edit_id" id="edit_id" value="">
                    <input type="hidden" name="edit_regno" id="edit_regno" placeholder="Enter reg no" value="" required >
                    <span id="edit_regcheck"></span>
                </div>           
            </div>
            <div class="row">
                <div class="col">
                    <label for="time">Time</label>
                    <input type="time" name="edit_time" id="edit_time" value="<?php echo date('h:i');?>" required>
                    <span id="timecheck"></span>
                </div>           
            </div>
            <div class="row">
                <div class="col">
                    <label for="date">Date</label>
                    <input type="date" name="edit_date" id="edit_date" value="<?php echo date('Y-m-d')?>" required>
                    <span id="datecheck"></span>
                </div>           
            </div>
            <div class="row">
                <div class="col">
                    <label for="status">Status</label>
                    <select name="edit_select" id="edit_status" required>
                        <option value="">Select status</option>
                        <option value="1" selected>Present</option>
                        <option value="0">absence</option>
                    </select>
                    <span id="statuscheck"></span>
                </div>           
            </div>              
            <div class="row">
                <input type="submit" class="btn_success" id="update_btn" value="update">   
            </div>
        </div>
    </div>   
</form>
</div>
</div>
<!-- The Modal of exam category end-->
<div class="panel-body">
    <div style='overflow-x:auto;'>
        <table id='mytbl'>
            <thead>
                <tr>
                    <th>sn</th>
                    <th>Student Name</th>
                    <th>Register Number</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                                
            </tbody>
        </table>
                <div class='pagenition' id="pagination">
                            
                </div>
            </div>
        </div>
    </div>
</div>

