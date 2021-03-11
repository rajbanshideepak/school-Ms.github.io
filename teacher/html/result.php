<div class="cont_nr">
    <fieldset>
        <legend>This is result adding page</legend>
<!-- for the faculty filed-->
    <div class="row">
        <div class="col">
            <div id="result_faculty_box">
                <label for="Result_faculty">学科名　**</label>
                <select name="Result_faculty" id="result_faculty">
                    <option value="">選考学科名　</option>
                </select>
                <span class="result_error"></span>
            </div>
        </div>         
    </div>
<!-- for the course field -->
    <div class="row">
        <div class="col">
            <div id="result_course_box">
                <label for="Result_course">コース名 **</label>
                <select name="Result_course" id="result_course">
                    <option value="">選考コース名</option>
                </select>
                <span class="result_error"></span>
            </div>
        </div>         
    </div>
    <!-- for the actions buttons  -->
    <div class="row">
        <div class="col">
            <input type="submit" class="btn_success" value="Add Result" id="add_result_btn">
        </div>
    </div> 
    </fieldset>
    <!-- for total marks and pass marks and year and month -->
    <hr style="margin: 30px 0px;">
    <h3>Add marks for all Subject</h3>
    <div class="row" style="overflow:auto;">
        <table style="display:none" id="marks_tbl">
            <thead>
                <tr style="border-bottom:1px solid white">
                    <th>sn</th>
                    <th>科目名</th>
                    <th>満点</th>
                    <th>合格点</th>
                    <th>Action</th>
                </tr>
            </thead>
            <form>
                <tbody id="marks_edit">
                </tbody>
            </form>
        </table>       
    </div>
    <!-- for result adding table  -->
    <hr style="margin: 30px 0px;">
    <h3>Add result for all student</h3>
    <div class="row" style="overflow:auto;">
        <table style="display:none" id="res_tbl">
            <thead>
                <tr style="border-bottom:1px solid white">
                    <th>sn</th>
                    <th style="text-align:center">学生名</th>
                    <th style="text-align:center">年</th>
                    <th style="text-align:center">月</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <form>
                <tbody id="result_marks_edit">
                </tbody>
            </form>
        </table>
        <!-- The Modal of exam result -->
        <div id="result_modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="overflow-y:auto;">
            <div class="modal-head">
                <h4>Student Result</h4>
                <span class="close">&times;</span>
            </div>
            <form  id="resultForm">
                <div class="modal-body">
                    <div class="cont_nr">
                    <div class="row">
                        <div class="col">
                            <label for="std_name">学生名:</label>
                            <input type="text" name="faculty" id="std_name" value="">
                            <input type="hidden" name="regno" id="std_regno" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div id="yr">
                                <label for="res_year">Year</label>
                                <input type="text" id="res_year" value="">
                                <span class="result_error"></span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div id="mnt">
                                <label for="res_month">month</label>
                                <input type="text" id="res_month" value="">
                                <span class="result_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="overflow:auto;padding-left:5px">
                        <table id="res_tbl1">
                            <thead>
                                <tr style="border-bottom:1px solid white">
                                    <th>sn</th>
                                    <th style="text-align:center">科目名</th>
                                    <th style="text-align:center">満点</th>
                                    <th style="text-align:center">合格点</th>
                                    <th style="text-align:center">受付点数</th>
                                    <th style="text-align:left">科目あたりの割合</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="result_page"></tbody>
                        </table>    
                    </div>
                    <div id="ms" style="color:green"></div>
                    <!-- <div class="row">
                        <div class="col-5">
                            <input type="submit" class="btn_success" value="Update" id="std-update">
                        </div>
                        <div class="col-5"><input type="button" class="std-edit btn_danger" id="sedit" value="Edit Year and Month"></div>
                    </div> -->
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- The Modal of exam category end-->      
        
        <!-- modal for the adding  result in database -->
        <!-- The Modal of exam result -->
        <div id="result_add_modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="overflow-y:auto;">
            <div class="modal-head">
                <h4>Student Result</h4>
                <span class="close">&times;</span>
            </div>
            <form  id="resultForm">
                <div class="modal-body">
                    <div class="cont_nr">
                    <div class="row">
                        <div class="col">
                            <label for="std_name">学生名:</label>
                            <input type="text" name="faculty" id="std_name_add" value="">
                            <input type="hidden" name="regno" id="std_regno_add" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div id="yr">
                                <label for="res_year">Year</label>
                                <input type="text" id="res_year_add" value="">
                                <span class="result_error"></span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div id="mnt">
                                <label for="res_month">month</label>
                                <input type="text" id="res_month_add" value="">
                                <span class="result_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="overflow:auto;padding-left:5px">
                        <table id="res_tbl1">
                            <thead>
                                <tr style="border-bottom:1px solid white">
                                    <th>sn</th>
                                    <th style="text-align:center">科目名</th>
                                    <th style="text-align:center">満点</th>
                                    <th style="text-align:center">合格点</th>
                                    <th style="text-align:center">受付点数</th>
                                    <th style="text-align:left">科目あたりの割合</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="result_add_page"></tbody>
                        </table>  
                        
                    </div>
                    <div id="ms_add" style="color:green"></div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- The Modal of exam category end-->      
    </div>
</div>