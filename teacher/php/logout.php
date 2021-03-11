<?php
include("../../database/db.php");
include("../../functions/function.php");
session_start();
unset($_SESSION['Islogin']);
unset($_SESSION['status']);
unset($_SESSION['email']);
unset($_SESSION['userName']);
session_destroy();
redirect("../../index.php");

?>