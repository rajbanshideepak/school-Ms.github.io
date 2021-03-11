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
 $cond =array("regno"=>"{$_SESSION['regno']}");
 $fac =$obj->get_data('studentpf','*',$cond);
 if(isset($fac[0])){
     $_SESSION['faculty']=$fac[0]['faculty'];
 }
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
                                <form id="aten_form">
                                    <div class="inp" id="error">
                                        <span class="status1"></span>
                                        <span class="success"></span>
                                        <input type="hidden" class="input"  id="regno" value="<?php echo $regno ?>">
                                        <input type="text" class="input" name="aten" id="aten" placeholder="Enter Your Resgister Id or Number ">
                                        <input type="hidden" class="input"  id="faculty" value="<?php echo $_SESSION['faculty'] ?>">
                                    </div>
                                    <div class="butn">
                                        <input type="submit" class="sub_btn" name="aten_btn" id="aten_btn" value="Submit">
                                    </div>
                                </form>
                            </div>
                            
                         </div>
                </div>
                <div class="col-5">
                    <div class="line">
                        <div class="cont_tbl" style="overflow:auto;">
                             <table class="table">
                                 <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Register Number</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                 </thead>
                                 <tbody id="aten_data">
                                 
                                 </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>

<?php }else{
    echo "YOu are not the student of this school";
} ?>

