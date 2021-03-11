<?php 
if(isset($_SESSION['regno'])){
    $regno = $_SESSION['regno'];
   // session_start();
    // include("../../database/db.php");
    include("../../functions/function.php");
    // query object ----------------------
    $obj1 = new sfunction();
    $obj = new query();
    // query object end--------------
 $condi_arr=array("user.regno"=>"{$regno}");
//  $condi="user.".
 $row=$obj->get_join_data("teacherpf","user","*","regno",$condi_arr);
 $row=$row[0];
if(isset($row)){
?>
    <div class="profile">
        <div class="cont_nr">
            <div class="row">
                <div class="col-3">
                        <div class="row">
                            <div class="prof">
                                <form action="" method="post">
                                    <img src="../../teacher/assets/uploads/<?php echo $row['image']?>"
                                    alt="Profile" width="100%" height="100%">
                                    <!-- <input type="file" name="profile" id="profile"> -->
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="description">
                                <strong class="tx-normal">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </strong>
                            </div>
                        </div>
                </div>
                <div class="col">
                    <div class="dash_board">
                        <div class="row">
                            <h2 class="bl tx-primary" align="center">User Details</h2>
                        </div>
                        <div class="row">
                            <h3 class="bl">学籍番号 : <strong class="mn" id="regno"><?php echo $row['regno']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">氏名 : <strong class="mn"><?php echo $row['lname']." ".$row['fname']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">メールアドレス : <strong class="mn"><?php echo $row['eMail']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">登録の日   ： <strong class="mn"><?php echo $row['regDate']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">パスワード   ： 
                                    <strong class="mn">*****
                                        <input type="checkbox" name="" id="cpass_btn">
                                        <label for="cpass_btn" class="cpass">更新する</label>
                                        
                                        <div class="cpass_box">
                                            <form id="cp_form" >
                                                <div class="row">
                                                    <h3 class="bl">現在のパスワード入力 : </h3>
                                                </div>
                                                <div class="row ">
                                                   <div class="col">
                                                        <div id="currentPass">
                                                            <input type="password" class="form_control bl" name="cpass" id="cpass">
                                                            <span class="status"></span>
                                                        </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">
                                                        <h3 class="bl">新パスワード入力 : </h3>
                                                    </div>
                                                    <div class="col-5">
                                                        <h3 class="bl">もう一度新パスワード入力 : </h3>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-5">
                                                        <div id="newpassword">
                                                            <input type="password" class="form_control bl" name="newpass" id="newpass">
                                                            <span class="status"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                       <div id="renewpassword">
                                                        <input type="password" class="form_control bl" name="renewpass" id="renewpass">
                                                            <span class="status"></span>
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="col-3"></div>
                                                     <div class="col-3"><input type="submit" class="btn-primary-l bl" name="" id="cp_btn"></div>
                                                     <div class="col-3"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </strong></h3>
                            </div>        
                    </div>
                </div>
            </div>
            
        </div>   
    </div>
<?php }
}else{
    echo "You are not the teacher here";
} ?>

