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
            <h3>Subject Details</h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Subject</button>
            </div>
        </div>
        <!-- The Modal of exam category -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content" style="overflow-y:auto;"> 
                <div class="modal-head">
                    <h4>Subject Details</h4>
                    <span class="close">&times;</span>
                </div> 
                <form id="addForm_subject">
                    <div class="modal-body">
                    <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="subject">Subject Name:</label>
                                    <input type="text" name="subject" id="subject" placeholder="Enter subject Name">
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
    <h4>Update Subject Details</h4>
    <span class="close">&times;</span>
</div> 
<form id="updateFormsubject">
    <div class="modal-body">
    <div class="cont_nr">
            <div class="row">
                <div class="col">
                    <label for="usubject">Subject Name:</label>
                    <input type="text" name="usubject" id="usubject" placeholder="Enter Subject Name">
                    <input type="hidden" name="regno" id="regno">
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
                                        <th>Subject Name</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_subject">
                                
                                </tbody>
                            </table>
                            <div class='pagenition' id="pagination">
                            
                            </div>
                     </div>
            </div>
    </div>
</div>
