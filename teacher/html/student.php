<?php
// session_start();
// include("../../database/db.php");
include("../../functions/function.php");
// query object ----------------------
$obj1 = new sfunction();
$obj = new query();
// query object end--------------
// $facultyRow = $obj->get_data('faculty');
// $courseRow = $obj->get_data('course');
// print_r($courseRow);
?>
<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
            <div class="search_bar">
                <label for="search"><i class="fas fa-search-plus"></i></label>
                <input type="search" name="" id="search" placeholder="search by names" oninput="filter2()">
            </div>
            <h3>Student Details</h3>
            <div class="line">
                <button class="addbtn" id="myBtn"><i class="fas fa-plus"></i> Add Student</button>
            </div>
        </div>
        <!-- The Modal of Add students -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="overflow-y:auto;">
                <div class="modal-head">
                    <h4>Student Details</h4>
                    <span class="close">&times;</span>
                </div>
                <form id="addForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="cont_nr">
                            <div class="row">
                                <div class="col">
                                    <label for="regno">Register No:</label>
                                    <input type="text" name="regno" id="regno" placeholder="Enter Register number" value="adsf">
                                    <span id="regnoMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name" value="adsf">
                                    <span id="lnameMsg"></span>
                                </div>
                                <div class="col-5">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" placeholder="Enter Your First Name" value="adsf">
                                    <span id="fnameMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="col">
                                        <label for="nation">Nationality</label>
                                        <select name="nation" id="nation">
                                            <option value="">Select Nationality</option>
                                        </select>
                                        <span id="nationMsg"></span>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <label for="dp">Profile Image</label>
                                    <input type="file" name="dp" id="dp" placeholder="Profile Image">
                                    <span id="dpMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="zip">Postal Code</label>
                                    <input type="text" name="zip" id="zip" placeholder="5330011" value="5440002">
                                    <span id="zipMsg"></span>
                                </div>
                                <div class="col-5">
                                    <input type="button" name="zipbtn" id="zipbtn" value="search address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address1">Address1</label>
                                    <input type="text" name="address1" id="address1" placeholder="大阪市東淀川区大桐" value="adsf">
                                    <span id="addr1Msg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address2">Address2</label>
                                    <input type="text" name="address2" id="address2" placeholder="５－１４－８７ダイドーファイブ　４０３号" value="adsf">
                                    <span id="addr2Msg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" value="2020/12/23">
                                    <span id="dobMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="tel">Mobile</label>
                                    <input type="tel" name="tel" id="tel" value="123456789">
                                    <span id="telMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Gender</label>
                                <div class="form_radio">
                                    <input type="radio" name="Gender" id="male" value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="Gender" id="female" value="female">
                                    <label for="female">female</label>
                                    <input type="radio" name="Gender" id="sexother" value="other">
                                    <label for="sexother">Other</label>
                                </div>
                                <span id="sexMsg"></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="faculty">Faculty</label>
                                    <select name="faculty" id="faculty">
                                        <option value="">Select Faculty</option>
                                    </select>
                                    <span id="facultyMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="course">Course</label>
                                    <select name="course" id="course">
                                        <option value="">select course</option>
                                    </select>
                                    <span id="courseMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Hobby</label>
                                <div class="form_radio">
                                    <input type="checkbox" name="hobby[]" value="Sports">
                                    <label for="sports">Sports</label>
                                    <input type="checkbox" name="hobby[]" value="Music">
                                    <label for="music">Music</label>
                                    <input type="checkbox" name="hobby[]" value="Reading and Writing">
                                    <label for="rw">Reading & writting</label>
                                    <input type="checkbox" name="hobby[]" value="Others">
                                    <label for="others">other</label>
                                </div>
                                <span id="hobbyMsg"></span>
                            </div>
                            <div class="row"><span id="lastMsg" style="width:100%"></span></div>
                            <div class="row">
                                <div class="col-5">
                                    <input type="submit" class="btn_success" id="subtn" value="Submit">
                                </div>
                                <div class="col-5"><input type="button" class="btn_danger" id="canclebtn" value="cancel"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- The Modal of add student end-->
        <!-- ############################################################################################# -->
        <!-- The Modal of edit students -->
        <div id="myModalEdit" class="modal">

            <!-- Modal content -->
            <div class="modal-content" style="overflow-y:auto;">
                <div class="modal-head">
                    <h4>Update Student Details</h4>
                    <span class="close">&times;</span>
                </div>
                <form id="addFormEdit" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="cont_nr">

                            <div class="row">
                                <div class="col">
                                    <label for="regno">Register No:</label>
                                    <input type="text" name="regno" id="regno" placeholder="Enter Register number">
                                    <span id="regnoMsg"></span>
                                    <input type="hidden" name="userid" id="userid" placeholder="Enter user number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" placeholder="Enter Your Last Name">
                                    <span id="lnameMsg"></span>
                                </div>
                                <div class="col-5">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" placeholder="Enter Your First Name">
                                    <span id="fnameMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="col">
                                        <label for="nation">Nationality</label>
                                        <select name="nation" id="nation">
                                            <option value="">Select Nationality</option>
                                        </select>
                                        <span id="nationMsg"></span>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <label for="dp">Profile Image</label>
                                    <input type="file" name="dp" id="dp" placeholder="Profile Image">
                                    <span id="dpMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <label for="zip">Postal Code</label>
                                    <input type="text" name="zip" id="zip" placeholder="5330011" value="">
                                    <span id="zipMsg"></span>
                                </div>
                                <div class="col-5">
                                    <input type="button" name="zipbtn" id="zipbtn" value="search address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address1">Address1</label>
                                    <input type="text" name="address1" id="address1" placeholder="大阪市東淀川区大桐" value="">
                                    <span id="addr1Msg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address2">Address2</label>
                                    <input type="text" name="address2" id="address2" placeholder="５－１４－８７ダイドーファイブ　４０３号">
                                    <span id="addr2Msg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" data-date-format="DD MMMM YYYY" value="0000-00-00" name="dob" id="dob">
                                    <span id="dobMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="tel">Mobile</label>
                                    <input type="tel" name="tel" id="tel" value="">
                                    <span id="telMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Gender</label>
                                <div class="form_radio">
                                    <input type="radio" name="Gender" id="male" value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="Gender" id="female" value="female">
                                    <label for="female">female</label>
                                    <input type="radio" name="Gender" id="sexother" value="other">
                                    <label for="sexother">Other</label>
                                </div>
                                <span id="sexMsg"></span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="faculty">Faculty</label>
                                    <select name="faculty" id="faculty">
                                        <option value="">Select Faculty</option>
                                    </select>
                                    <span id="facultyMsg"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="course">Course</label>
                                    <select name="course" id="course">
                                        <option value="">select course</option>
                                    </select>
                                    <span id="courseMsg"></span>
                                </div>
                            </div>
                            <div class="form_check">
                                <label for="address">Hobby</label>
                                <div class="form_radio">
                                    <input type="checkbox" name="hobby[]" id="sports" value="sports">
                                    <label for="sports">Sports</label>
                                    <input type="checkbox" name="hobby[]" id="music" value="music">
                                    <label for="music">Music</label>
                                    <input type="checkbox" name="hobby[]" id="rw" value="reading and writing">
                                    <label for="rw">Reading & writting</label>
                                    <input type="checkbox" name="hobby[]" id="others" value="others">
                                    <label for="others">other</label>
                                </div>
                                <span id="hobbyMsg"></span>
                            </div>
                            <div class="row"><span id="lastMsg" style="width:100%"></span></div>
                            <div class="row">
                                <div class="col-5">
                                    <input type="submit" class="btn_success" value="Update" id="update_btn">
                                </div>
                                <div class="col-5"><input type="button" class="btn_danger" id="cancel" value="cancel"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- The Modal of Edit student end-->

        <div class="panel-body">
            <div style='overflow-x:auto;'>
                <table id='mytbl'>
                    <thead>
                        <tr>
                            <th>sn</th>
                            <th>Images</th>
                            <th>FullName</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>Faculty</th>
                            <th>Course</th>
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
<!-- <script src="../assets/js/studntFormValidation.js"></script> -->