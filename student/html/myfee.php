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
        $firstYear = $obj->get_data('firstyearfee');###
        $secyear = $obj->get_data('secyearfee');    ###
#######################################################
 

 $condi_arr=array("regno"=>"{$regno}");
 $row=$obj->get_data("studentfee","",$condi_arr);
//  $row=$row[0];
?>
    <div class="profile">
        <div class="container">
        <?php if(isset($firstYear[0]) && isset($secyear[0])){?>
                    <?php if(isset($row[0])){ ?>
                    <div class="row">
                    <div class="fee_details">
                    <div class="hed"><span></span>私の学費の詳細<span></span></div>
                            <table class="tb_view">
                                <thead>
                                    <tr>
                                        <th>sn</th>
                                        <th>月</th>
                                        <th>合計学費</th>
                                        <th>残学費</th>
                                        <th>払った料金</th>
                                        <th>払った日付</th>
                                        <th>期間</th>
                                        <th>状態</th>
                                        <th>アクション</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($row as $list){ ?>
                                        <tr>
                                            <th><?php echo $i ?></th>
                                            <th><?php echo $list['month']."月"; ?></th>
                                            <th><?php echo $list['totalFee']."円" ?></th>
                                            <th><?php echo ($list['remineFee'])."円"; ?></th>
                                            <th><?php echo $list['paid']."円" ?></th>
                                            <th><?php echo $list['date'] ?></th>
                                            <th><?php echo $list['deadline']."まで" ?></th>
                                            <th><?php
                                            $status= $list['status'];
                                            if($status==1){
                                                echo "<b style='color:#c20606'>まだ払ってません。。</b>";
                                            }else{
                                                echo "<b style='color:#033003'>払いました。</b>";
                                            }
                                            ?></th>
                                            <th>印刷</th>
                                        </tr>
                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                    </div>
                    </div>
                </div>   
            </div>
        <?php } ?>
            <div class="row">
               <div class="fee_details">
               <div class="hed"><span></span> 学費 1年生 <span></span></div>
                        <table class="tb_view">
                            <thead>
                                <tr>
                                    <th>sn</th>
                                    <th>学科名</th>
                                    <th>コース名</th>
                                    <th>合計学費</th>
                                    <th>6ヶ月額</th>
                                    <th>払う期間</th>
                                    <th>アクション</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($firstYear as $list){?>
                                <tr>
                                    <th><?php echo $i ?></th>
                                    <th><?php echo $list['faculty']; ?></th>
                                    <th><?php echo $list['course']; ?></th>
                                    <th><?php echo $list['totalFee']."円" ?></th>
                                    <th><?php echo ($list['totalFee']/2)."円"; ?></th>
                                    <th>6ヶ月ごとに</th>
                                    <th>印刷</th>
                                </tr>
                            <?php $i++;} ?>
                            </tbody>
                        </table>
               </div>
            </div>
            <!-- second year fee down -->
            <div class="row">
               <div class="fee_details">
               <div class="hed"><span></span> 学費 2年生 <span></span></div>
                        <table class="tb_view">
                            <thead>
                                <tr>
                                    <th>sn</th>
                                    <th>学科</th>
                                    <th>コース名</th>
                                    <th>合計学費</th>
                                    <th>6ヶ月額</th>
                                    <th>払う期間</th>
                                    <th>アクション</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; foreach($secyear as $list){ ?>
                                <tr>
                                    <th><?php echo $i ?></th>
                                    <th><?php echo $list['faculty']; ?></th>
                                    <th><?php echo $list['course']; ?></th>
                                    <th><?php echo $list['totalFee']."円" ?></th>
                                    <th><?php echo ($list['totalFee']/2)."円"; ?></th>
                                    <th>6ヶ月ごとに</th>
                                    <th>印刷</th>
                                </tr>
                            <?php $i++;} ?>
                            </tbody>
                        </table>
               </div>
            </div>
            <?php }?>

<?php }else{
    echo "YOu are not the student of this school";
} ?>

