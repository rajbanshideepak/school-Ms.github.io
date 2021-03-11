<?php include("../include/header.php"); ?>
<?php
    // include("../../database/db.php");
    // include("../../functions/function.php");
    $cnt =$_GET['cnt'];
    $obj =new query();
    for($i =0;$i<$cnt;$i++){
        $condi =array("status"=>"0");
        $obj->update_data("noticeboard",$condi,"status","1");
    }
?>
<?php include("../html/notification.php"); ?>
<?php include("../include/footer.php"); ?>
<script src="../assets/js/noticeboard.js"></script>