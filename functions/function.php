<?php
// -------------------------------------------------------

function redirect($url)
{
    return header("location:{$url}");
}
// redirect("../index.html");
function get_date()
{
    date_default_timezone_set("Asia/Tokyo");
    $date = date("Y/m/d h:i:s");
    return $date;
}
// get_date();
function get_otp($val)
{
    $otp = "";
    for ($i = 0; $i < $val; $i++) {
        $otp .= mt_rand(0, 9);
    }
    return $otp;
}
    // get_otp(8);