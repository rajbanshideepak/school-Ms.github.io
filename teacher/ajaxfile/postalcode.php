<?php
if(isset($_POST['code'])){
    // echo $_POST['code'];
        // $zip="5440002";
         $zip=$_POST['code'];
        $code=file_get_contents("https://zipcloud.ibsnet.co.jp/api/search?zipcode=".$zip);
        $code=json_decode($code,true);
        if(isset($code['results'][0])){
            $array=$code['results'][0];
            $fulladdress=$array['address1'].$array['address2'].$array['address3'];
            echo $fulladdress;
        
        }else{
            echo "zip code does not matched";
        }
}else{
    echo "code not found";
}

?>