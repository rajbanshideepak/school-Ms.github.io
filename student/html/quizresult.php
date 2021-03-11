<?php  if(isset($_GET['score'])){ ?>
<div class="container">
    <div class="re_img">
        <?php 
       
            $perc =($_GET['score']/$_GET['total_q'])*100;
            // echo $perc;
            if($perc > 50){
                echo '<img src="../assets/images/passed.gif" alt="pass">';
            }else{
                echo '<img src="../assets/images/failed.gif" alt="fali">';
            }
        
        ?>  
    </div>
    <div class="detail_table">
        <table>
            <thead>
                <tr>
                    <th colspan="2" style="text-align:center">これがクイズの結果です !!!</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> クイズ名</td>
                    <td><?php echo $_GET['subject'] ?></td>
                </tr>
                <tr>
                    <td>質問全体</td>
                    <td> <?php echo $_GET['total_q'] ?></td>
                </tr>
                <tr>
                    <td>完全な間違い</td>
                    <td><?php echo $_GET['mistake'] ?></td>
                </tr>
                <tr>
                    <td>完全に正しい</td>
                    <td><?php echo $_GET['score'] ?></td>
                </tr>
                <tr>
                    <td>パーセント（％）</td>
                    <td><?php echo $perc."%"; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <div class="Buttons">
        <button class="btn-primary" onclick="window.location.href='exam'">クイズに戻る</button>
        <button class="btn-secondary" onclick="window.location.href='review.php?subject=<?php echo $_GET['subject'] ?>'">回答を見る</button>
        </div>
    </div>
</div>
<?php }else{
    header("location:exam.php");
} ?>