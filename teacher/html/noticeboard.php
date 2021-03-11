<?php 
    if(isset($_SESSION['success']) || isset($_SESSION['error'])){
        if(isset($_SESSION['success'])){
            $color ="style='color:green'";
?>
            <div class="notice_msg" <?php echo $color; ?> >
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
<?php
        }else if(isset($_SESSION['error'])){
            $color ="style='color:red'";
?>
            <div class="notice_msg" <?php echo $color; ?> >
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
<?php
        }
    }
?>
<form  method="post" id="noti_form" action="../ajaxfile/noticeboard.php">
    <textarea name="editor" id="editor" cols="30" rows="10">
    
    </textarea>
    <input type="submit" value="submit" name="submit" id="noti_btn">
</form>
<script src="../assets/plugin/ckeditor/ckeditor.js"></script>
<script src="../assets/plugin/ckfinder/ckfinder.js"></script>
<script src="../assets/js/editor.js"></script>