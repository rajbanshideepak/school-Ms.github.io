<?php 
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
        <h4 style="cursor:pointer;color:yellow" id="back">Back</h4>
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by course" oninput="filter()">
        </div> 
            <h3>Course Details</h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Course</button>
            </div>
        </div>
        <!-- The Modal of exam category -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content" style="overflow-y:auto;"> 
                <div class="modal-head">
                    <h4>Course Details</h4>
                    <span class="close">&times;</span>
                </div> 
                <form id="addForm_course">
                    <div class="modal-body">
                    <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="course">Course Name:</label>
                                    <input type="text" name="course" id="course" placeholder="Enter Course Name">
                                    <span class="danger" id="fac_err"></span>
                                </div>            
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <input type="submit" class="btn_success" value="Submit">
                                </div>
                                <div class="col-5"><input type="button" class="btn_danger" id="cancel" value="cancel"></div>
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
    <h4>Update course Details</h4>
    <span class="close">&times;</span>
</div> 
<form id="updateFormcourse">
    <div class="modal-body">
    <div class="cont_nr">
            <div class="row">
                <div class="col">
                    <label for="ucourse">Course Name:</label>
                    <input type="text" name="ucourse" id="ucourse" placeholder="Enter course Name">
                    <input type="hidden" name="regno" id="regno" placeholder="Enter user number">
                    <span class="danger" id="ufac_err"></span>
                </div>         
            </div>
            <div class="row">
                <div class="col-5">
                    <input type="submit" class="btn_success" value="Update" id="update_btn">
                </div>
                <div class="col-5"><input type="button" class="btn_danger" id="ucancel" value="cancel"></div>
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
                                        <th>Course Name</th>
                                        <th>Total Subject</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_course">
                                
                                </tbody>
                            </table>
                            <div class='pagenition' id="pagination">
                            
                            </div>
                     </div>
            </div>
    </div>
</div>
