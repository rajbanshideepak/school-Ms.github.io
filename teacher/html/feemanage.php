<div class="cont_nr">
    <div class="row">
        <div class="col-5">
        <form id="firstForm">
            <fieldset>
                <legend>This is First year Fee</legend>
                <!-- for the faculty filed-->
                <div class="row">
                    <div class="col">
                        <div id="fee_faculty_box">
                            <label for="fee_faculty">学科名　**</label>
                            <select name="fee_faculty" id="fee_faculty" class="fee_faculty">
                                <option value="">選考学科名　</option>
                            </select>
                            <span class="result_error"></span>
                        </div>
                    </div>         
                </div>
                <!-- for the course field -->
                <div class="row">
                    <div class="col-5">
                        <div id="fee_course_box">
                            <label for="fee_course">コース名 **</label>
                            <select name="fee_course" id="fee_course" class="fee_course">
                                <option value="">選考コース名</option>
                            </select>
                            <span class="result_error"></span>
                        </div>
                    </div> 
                    <div class="col-5">
                        <div id="fee_amount_box">
                            <label for="fee_amount">年間学費 **</label>
                            <input type="number" name="" id="fee_amount" placeholder="Enter the Fee Amount">
                            <span class="result_error"></span>
                        </div>
                    </div>        
                </div>
                <!-- for the actions buttons  -->
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn_success" value="Add Fee for 1st year" id="first_add_fee">
                    </div>
                    <div class="col" style="display:none">
                        <input type="button" class="btn_success" value="update Fee for 1st year" id="update_first_add_fee">
                    </div>
                </div> 
            </fieldset>
        </form>
    </div>
        <!-- first year end here -->
        <!-- second  year start  from here -->
        <div class="col-5">
        <fieldset>
                <legend>This is Second year Fee</legend>
                <!-- for the faculty filed-->
                <div class="row">
                    <div class="col">
                        <div id="fee_sec_faculty_box">
                            <label for="fee_sec_faculty">学科名　**</label>
                            <select name="fee_sec_faculty" id="fee_sec_faculty" class="fee_faculty">
                                <option value="">選考学科名　</option>
                            </select>
                            <span class="result_error"></span>
                        </div>
                    </div>         
                </div>
                <!-- for the course field -->
                <div class="row">
                    <div class="col-5">
                        <div id="fee_sec_course_box">
                            <label for="fee_sec_course">コース名 **</label>
                            <select name="fee_sec_course" id="fee_sec_course" class="fee_course">
                                <option value="">選考コース名</option>
                            </select>
                            <span class="result_error"></span>
                        </div>
                    </div>
                    <div class="col-5">
                        <div id="fee_sec_amount_box">
                            <label for="fee_sec_amount">年間学費 **</label>
                            <input type="number" name="" id="fee_sec_amount" placeholder="Enter the Fee Amount">
                            <span class="result_error"></span>
                        </div>
                    </div>          
                </div>
                <!-- for the actions buttons  -->
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn_success" value="Add second year Fee" id="second_add_fee">
                    </div>
                </div> 
            </fieldset>
        </div>
    </div>
    <!-- for total marks and pass marks and year and month -->
    <div class="row" id="msg" style="display:none;">
        <div class="col">
            <h3 id="stat">
                <span></span>
            </h3>
        </div>
    </div>
    <hr style="margin: 30px 0px;">
    <div class="row">
        <div class="col-5">
        <h4 align="center">First Year Fee Details</h4>
            <div class="row" style="overflow:auto;padding-left:5px">
                <div class="ht" style="width:100%;height:auto;max-height:500px;overflow:auto">
                    <table id="firstyear">
                        <thead>
                            <tr style="border-bottom:1px solid white">
                                <th>sn</th>
                                <th style="text-align:center">Faculty</th>
                                <th style="text-align:center">Course</th>
                                <th style="text-align:center">TotalFee</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="firstyear_fee"></tbody>
                    </table> 
                </div>   
            </div>
        </div>
       <div class="col-5">
       <h4 align="center">Second Year Fee Details</h4>
        <div class="row" style="overflow:auto;padding-left:5px">
            <div class="ht" style="width:100%;height:auto;max-height:500px;overflow:auto">
                    <table id="secondyear">
                        <thead>
                            <tr style="border-bottom:1px solid white">
                                <th>sn</th>
                                <th style="text-align:center">Faculty</th>
                                <th style="text-align:center">Course</th>
                                <th style="text-align:center">TotalFee</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="secondyear_fee"></tbody>
                    </table>    
                </div>
            </div>
       </div>
    </div>
</div>