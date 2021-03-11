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
        <div class="search_bar">
            <label for="search"><i class="fas fa-search-plus"></i></label>
            <input type="search" name="" id="search" placeholder="search by Faculty" oninput="filter()">
        </div> 
            <h3>Faculty Details</h3>
            <div class="line">
            <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Faculty</button>
            </div>
        </div>
        <!-- The Modal of exam category -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content" style="overflow-y:auto;"> 
                <div class="modal-head">
                    <h4>Faculty Details</h4>
                    <span class="close">&times;</span>
                </div> 
                <form action="#" method="post" id="addForm">
                    <div class="modal-body">
                    <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="fculty">faculty Name:</label>
                                    <input type="text" name="faculty" id="faculty" placeholder="Enter Faculty Name">
                                    <span class="danger" id="fac_err"></span>
                                </div>       
                            </div>
                            
                            <div class="row">
                                <div class="col-5">
                                    <input type="submit" class="btn_success" value="Submit">
                                </div>
                                <div class="col-5"><input type="button" class="btn_danger " value="cancel" id="cancel"></div>
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
    <h4>Update Faculty Details</h4>
    <span class="close">&times;</span>
</div> 
<form action="#" method="post" id="updateForm">
    <div class="modal-body">
        <div class="cont_nr">
            <div class="row">
                <div class="col">
                    <label for="ufaculty">Register No:</label>
                    <input type="text" name="" id="ufaculty" placeholder="Enter Faculty Name" value="">
                    <input type="hidden" name="regno" id="regno" placeholder="Enter user number">
                    <span class="danger" id="ufac_err"></span>
                </div>           
            </div>
            <div class="row">
                <div class="col-5">
                    <input type="submit" class="btn_success" value="Update" id="Fac_update_btn">
                </div>
                <div class="col-5">
                    <input type="button" class="btn_danger" id="ucancel" value="cancel">
                </div>
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
                                        <th>Faculty Name</th>
                                        <th>Total Course</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_faculty">
                                
                                </tbody>
                            </table>
                            <div class='pagenition' id="pagination">
                            
                            </div>
                     </div>
            </div>
    </div>
</div>
