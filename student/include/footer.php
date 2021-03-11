</div>
</div>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.nav_btn').click(function(){
    $('.mobile_nav_items').toggleClass('active');
  });
});
</script>
<script>
          var jp = ["ダッシュボード","クイズ","結果","出席","学費詳細","申し込む","設定"];
          var en = ["Dashboard","Exam","Result","Attendance","My Fee","apply","Settings"];
          var np = ["ड्यासबोर्ड", "परीक्षा", "परिणाम", "उपस्थिति", "मेरो शुल्क", "लागू", "सेटिंग्स"];
          var vi = ["Trang tổng quan", "Bài kiểm tra", "Kết quả", "Chuyên cần", "Phí của tôi", "đăng ký", "Cài đặt"];
          // var cn = ["仪表盘"，"考试"，"结果"，"出勤"，"我的费用"，"申请"，"设置"];
          var lang = document.getElementById('lang');
          var arr=[];
          change()
          lang.addEventListener('change',(e)=>{
            change()
          },false);
          function change() {
              if(lang.value=="jp"){
                  arr=jp;
              }else if(lang.value=="en"){
                arr=en;
              }else if(lang.value=="np"){
                arr=np;
              }else if(lang.value=="vi"){
                arr=vi;
              }else if(lang.value=="cn"){
                arr=cn;
              }
                var span = document.getElementsByClassName('langu');
                for(var i=0;i<span.length;i++){
                  span[i].innerText=arr[i];
                }
          }
        </script>
        <script src="../assets/js/filter.js"></script>

</body>
</html>