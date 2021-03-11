</div>
</div>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.nav_btn').click(function() {
      $('.mobile_nav_items').toggleClass('active');
    });
  });
</script>
<script src="../assets/js/model.js"></script>
<script src="../assets/js/filter.js"></script>
<script src="../assets/js/postalCode.js"></script>
<!-- <script src="../assets/js/action.js"></script> -->
<script>
          var session ='<?php echo $_SESSION['status'] ?>';
          var en,np,jp;
          if(session == "admin"){
             en = ["Dashboard","Course & Faculty","Teacher","All Attendence","Student","Exam","Result","Fee Mangement","About","Settings"];
             np = ["ड्यासबोर्ड", "पाठ्यक्रम र संकाय", "शिक्षक", "सबै उपस्थिति", "विद्यार्थी", "परीक्षा", "परिणाम", "शुल्क व्यवस्थापन", "प्रयोगकर्ताहरू", "सेटिंग्स"];
             jp =["ダッシュボード","コースと教員","先生","すべての出席","学生","試験","結果","料金管理","ユーザー","設定"];
          }else{
             en = ["Dashboard","Course & Faculty","Student","Exam","Result","Attendance","Fee Mangement","About","Settings"];
             np = ["ड्यासबोर्ड", "कोर्स र संकाय", "विद्यार्थी", "परीक्षा", "परिणाम", "उपस्थिति", "शुल्क प्रबन्ध", "प्रयोगकर्ताहरू", "सेटिंग्स"];
             jp =["ダッシュボード","コースと教員","学生","試験","結果","出席","料金管理","ユーザー","設定"];
          }
          var lang = document.getElementById('lang');
          var lang_mob = document.getElementById('lang_mob');
          lang_mob.addEventListener('change',(e)=>{
            change_mob();
          },false);
          var arr=[];
          change()
          change_mob();
          lang.addEventListener('change',(e)=>{
            change();
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
          function change_mob() {
              if(lang_mob.value=="jp"){
                  arr=jp;
              }else if(lang_mob.value=="en"){
                arr=en;
              }else if(lang_mob.value=="np"){
                arr=np;
              }else if(lang_mob.value=="vi"){
                arr=vi;
              }else if(lang_mob.value=="cn"){
                arr=cn;
              }
                var span = document.getElementsByClassName('langu1');
                for(var i=0;i<span.length;i++){
                  span[i].innerText=arr[i];
                }
          }
        </script>

</body>

</html>