<?php 
if(isset($_SESSION['regno'])){
  $regno = $_SESSION['regno'];
################# MAIN DATA ###########################
        date_default_timezone_set("Asia/Tokyo");    ###
        // include("../../database/db.php");        ###
        include("../../functions/function.php");    ###
        // query object for sql --------------------###
        $obj1 = new sfunction();                    ###
        $obj = new query();                         ###
        // query object end--------------           ###
        $facultyRow = $obj->get_data('faculty');    ###
        $courseRow = $obj->get_data('course');      ###
#######################################################
 

 $condi_arr=array("regno"=>"{$regno}");
 $row=$obj->get_data("studentpf","*",$condi_arr);
 $row=$row[0];
if(isset($row)){
?>
    <div class="profile">
        <div class="container">
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
                            <h2 class="bl tx-center rm-border tx-warning">Details of Your Profile in School</h2>
                        </div>
                        <div class="row">
                            <h3 class="bl">学籍番号 : <strong class="mn"><?php echo $row['regno']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">氏名 : <strong class="mn"><?php echo $row['lname']." ".$row['fname']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">国籍 : <strong class="mn"><?php echo $row['nationality']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">郵便番号（〒）： <strong class="mn"><?php echo $row['postcode']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">現在の住所　： <strong class="mn"><?php echo $row['address'].$row['address1']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">生年月日　： <strong class="mn"><?php echo $row['birthdate']; ?></strong></h3>
                            </div>
                            <div class="row">
                                <h3 class="bl">電話番号　： <strong class="mn"><?php echo $row['mobile']; ?></strong></h3>
                            </div>
                            <div class="row">
                            <h3 class="bl">性別　： <strong class="mn"><?php echo $row['sex']; ?></strong></h3>
                        </div>
                        <div class="row">
                            <h3 class="bl">学科名　： <strong class="mn"><?php echo $row['faculty']; ?></strong></h3>
                        </div>
                        <div class="row">
                            <h3 class="bl">コース名 : <strong class="mn"><?php echo $row['course']; ?></strong></h3>
                        </div>
                        <div class="row">
                            <h3 class="bl">趣味　： <strong class="mn"><?php echo $row['hobby']; ?></strong></h3>
                        </div>
                    </div>
                </div>
            </div>
            <a href="" class="ft-link">&#34If your data are wrong than contact to administrator of SMS&#34</a>
        </div>   
    </div>
<?php }
}else{
    echo "YOu are not the student of this school";
} ?>

