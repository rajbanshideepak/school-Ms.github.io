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
                <input type="hidden" id="subid" value="<?php echo $_GET["subid"]; ?>">
                <label for="search"><i class="fas fa-search-plus"></i></label>
                <input type="search" name="" id="search" placeholder="search by Exam Name" oninput="filter()">
            </div>
            <h3>Question Bank</h3>
            <div class="line">
                <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Question</button>
            </div>
        </div>
        <div class="panel-body">
            <div style='overflow-x:auto;'>
                <table id='mytbl'>
                    <thead>
                        <tr>
                            <th>sn</th>
                            <th>Questions</th>
                            <th>Q.No.</th>
                            <th>Option Answers</th>
                            <th>Correct Answer</th>
                            <th>Time</th>
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
        <!-- //////////////////////////////////////////////////// -->
        <!-- Modal for question Add Start-->
        <div id="myModalAdd" class="modal">
            <!-- Modal content -->
            <div class="modal-content" style="overflow-y:auto;">
                <div class="modal-head">
                    <h4>Add Question</h4>
                    <span class="close">&times;</span>
                </div>
                <form id="addForm">
                    <div class="modal-body">
                        <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="Aqno">Question No:</label>
                                    <input type="number" name="qno" id="Aqno" placeholder="Question No." value="" min="1" required>
                                    <label for="ufaculty">Question for Add:</label>
                                    <input type="text" name="ques" id="Aques" placeholder="Add Question" value="" required>
                                    <label for="ufaculty">Option Answers:</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="lname">答え１</label>
                                            <input type="text" name="ans1" id="Aans1" placeholder="答え１" value="" required>
                                        </div>
                                        <div class="col-5">
                                            <label for="fname">答え２</label>
                                            <input type="text" name="ans2" id="Aans2" placeholder="答え２" value="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="lname">答え３</label>
                                            <input type="text" name="ans3" id="Aans3" placeholder="答え３" value="" required>
                                        </div>
                                        <div class="col-5">
                                            <label for="fname">答え４</label>
                                            <input type="text" name="ans4" id="Aans4" placeholder="答え４" value="" required>
                                        </div>
                                    </div>
                                    <!-- <input type="text" name="modAns" id="AmodAns" placeholder="Edit Option Answer" value="" required> -->
                                    <label for="ufaculty">Correct Answer:</label>
                                    <input type="text" name="crtAns" id="AcrtAns" placeholder="Enter Correct Answer" value="" required>
                                    <label for="ufaculty">Time for question:</label>
                                    <input type="number" name="time" id="Atime" placeholder="数字だけ" value="" min="1" max="10" required>
                                    <span class="danger" id="Aufac_err"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <input type="submit" class="btn_success" value="ADD" id="AFac_update_btn">
                                </div>
                                <div class="col-5">
                                    <input type="button" class="btn_danger" id="Acancel" value="cancel">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal for question Add end-->
        <!-- //////////////////////////////////////////////////// -->
        <!-- Modal for question edit Start-->
        <div id="myModalEdit" class="modal">
            <!-- Modal content -->
            <div class="modal-content" style="overflow-y:auto;">
                <div class="modal-head">
                    <h4>Edit Question</h4>
                    <span class="close">&times;</span>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="qid" id="qid" placeholder="Question ID" value="" required>
                                    <input type="hidden" id="aid" name="aid" value="">
                                    <label for="ufaculty">Question No.</label>
                                    <input type="text" name="eqno" id="eqno" placeholder="Edit Question" value="" required>
                                    <label for="ufaculty">Question for edit:</label>
                                    <input type="text" name="ques" id="ques" placeholder="Edit Question" value="" required>
                                    <label for="ufaculty">Option Answers:</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="lname">答え１</label>
                                            <input type="text" name="ans1" id="ans1" placeholder="答え１" value="" required>
                                        </div>
                                        <div class="col-5">
                                            <label for="fname">答え２</label>
                                            <input type="text" name="ans2" id="ans2" placeholder="答え２" value="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="lname">答え３</label>
                                            <input type="text" name="ans3" id="ans3" placeholder="答え３" value="" required>
                                        </div>
                                        <div class="col-5">
                                            <label for="fname">答え４</label>
                                            <input type="text" name="ans4" id="ans4" placeholder="答え４" value="" required>
                                        </div>
                                    </div>
                                    <!-- <input type="text" name="modAns" id="modAns" placeholder="Edit Option Answer" value="" required> -->
                                    <label for="ufaculty">Correct Answer:</label>
                                    <input type="text" name="crtAns" id="crtAns" placeholder="Enter Correct Answer" value="" required>
                                    <label for="ufaculty">Time for question:</label>
                                    <input type="number" name="time" id="time" placeholder="数字だけ" value="" min="1" max="10">
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
    </div>
</div>