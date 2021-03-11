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
 $courseId='';

 $condi_arr=array("regno"=>"{$regno}");
 $row=$obj->get_data('studentpf','course',$condi_arr);
 $row=$row[0];
if(isset($row)){
    $condi_arr1=array("cname"=>"{$row['course']}");
    $row1=$obj->get_data('course','',$condi_arr1);
    $row1=$row1[0];
    if(isset($row1)){
        $courseId=$row1['cid'];
    }
}
// echo $courseId;
$condi_arr2=array("cid"=>"{$courseId}","status"=>"0");
 $row2=$obj->get_data('subject','',$condi_arr2);
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
                                <div id="err">
                                    <div class="sel">
                                       
                                        <select class="select" name="cato" id="catpo">
                                            <option value="">select exam catagory</option>
                                            <?php if(isset($row2[0])){ ?>
                                            <?php
                                                foreach($row2 as $list){
                                                    echo "<option value='{$list['subname']}'>".$list['subname']."</option>";
                                                }
                                             ?>
                                              <?php } ?>
                                        </select>
                                       
                                    </div>
                                    <span class="exer"></span>
                                </div>
                                <div class="butn">
                                    <input type="button" class="sub_btn" name="catpo_btn" id="catpo_btn" value="Submit">
                                </div>
                            </div>
                            
                         </div>
                </div>
                <div class="col-5">
                    <div class="line">
                        <div class="cont_box" style="overflow:auto;" id="exam_box">
                            <div class="top">
                                    <h3>Quiz/<b id="lnk">PHP</b></h3>
                                    <h3>質問<b id="total"></b></h3>
                                    <h3 id="timer"></h3>
                                    <h3>1:00分/問</h3>
                            </div> 
                                
                            <div class="head">
                                <h3 id="question"></h3>
                                </div>
                            <div class="answers">
                                
                            </div>
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

