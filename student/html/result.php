<?php 
if(isset($_SESSION['regno'])){
################# MAIN DATA ###########################
        date_default_timezone_set("Asia/Tokyo");    ###
        // include("../../database/db.php");        ###
        include("../../functions/function.php");    ###
        // query object for sql --------------------###
        $obj1 = new sfunction();                    ###
        $obj = new query();                         ###
        // query object end--------------           ###
#######################################################
 $regno = $_SESSION['regno'];
?>
    
    <div class="profile">
        <div class="container">
            <div class="row">
                <div class="col-5">
                <div class="line">
                            <div class="img">
                                <img src="../assets/images/reg.png" alt="img">
                            </div>
                            <div class="frm">
                            <form  id="result_form">
                                <input type="hidden" name="" id="regno" value="<?php echo $regno; ?>">
                                <div class="sel" id="year">
                                    <select class="select" name="yars" id="yars">
                                        <option value="">select Years</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                    <span class="er"></span>
                                </div>
                                <div class="sel" id="month">
                                    <select class="select" name="mnth" id="mnth">
                                        <option value="">select Months</option>
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>   
                                    </select>
                                    <span class="er"></span>
                                </div>
                                <div class="butn">
                                    <input type="submit" class="sub_btn" name="yars_btn" id="yars_btn" value="Submit">
                                </div>
                                </form>
                            </div>
                            
                         </div>
                </div>
                <div class="col-5">
                    <div class="line">
                        <div class="cont_tbl" style="overflow:auto;">
                        <div class="top">
                                    <h3>Year/month</h3>
                                    <h3 id="yrmnt"></h3>
                                    <h3><a href="#">Download</a></h3>
                                </div> 
                             <table class="table">
                                 <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Subject</th>
                                        <th>Full Mark</th>
                                        <th>Pass Mark</th>
                                        <th>Score</th>
                                        <th>percent(%)</th>
                                    </tr>
                                 </thead>
                                 <tbody id="result_data">
                                     
                                 </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
<?php 
}else{
    echo "YOu are not the student of this school";
} ?>

