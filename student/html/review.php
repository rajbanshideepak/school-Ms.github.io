<?php  if(isset($_GET['subject'])){ 
################# MAIN DATA ###########################
        date_default_timezone_set("Asia/Tokyo");    ###
        // include("../../database/db.php");        ###
        include("../../functions/function.php");    ###
        // query object for sql --------------------###
        $obj1 = new sfunction();                    ###
        $obj = new query();                         ###
        // query object end--------------           ###
#######################################################
 $sub = $_GET['subject'];
 $condi_arr=array("subname"=>"{$sub}");
 $row=$obj->get_data('subject','*',$condi_arr);

    if(isset($row[0])){
        $subId =$row[0]['subid'];
        $condi_arr1=array("subid"=>"{$subId}");
        $re_que=$obj->get_data('question','',$condi_arr1);
?>
<div class="container">
    <div class="reviewBox">
        <?php 
        if(isset($re_que[0])){
        foreach($re_que as $list){
        ?>
        <div class="review_question">
            <label for="review_ans"><?php echo $list['sn'].". ".$list['question'] ?></label>
        </div>
        <?php 
             $subI =$list['subid'];
             $qid =$list['sn'];
            $condi_arr2=array("subid"=>"{$subI}","qid"=>"{$qid}");
            $re_ans=$obj->get_data('answer','*',$condi_arr2);
            if(isset($re_ans[0])){
                // echo "<pre>";
                // print_r($re_ans);
                $select ="";
                $style="";
                foreach($re_ans as $list2){
                    if($list2['answer']===$list['correct_ans']){
                         $select ="checked";
                         $style="style='color:#dbe704'";
                    }else{
                        $select ="";
                        $style=""; 
                    }
        ?>
        <div class="review_answer">
            <div class="re_ans">
                <input type="radio" name="ans<?php echo $list['sn']; ?>" id="review_ans<?php echo $list2['aid']; ?>" 
                value="<?php echo $list2['answer'] ?>" <?php echo $select; ?> >
                <label for="review_ans<?php echo $list2['aid']; ?>" <?php echo $style; ?>><?php echo $list2['answer'] ?></label>
            </div>
        </div> 
        <?php }}else{echo "no answers";} ?> 
    <?php }} ?>

    </div>
    <div class="footer">
        <div class="Buttons">
        <button class="btn-primary" onclick="window.location.href='exam'">クイズに戻る</button>
        </div>
    </div>
</div>
<?php
    }else{
        echo "not found";
    }
}else{
    header("location:exam.php");
} ?>