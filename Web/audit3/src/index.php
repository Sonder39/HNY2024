<?php
include "flag.php";
highlight_file(__FILE__);
if ((string)$_POST['var1'] !== (string)$_POST['var2'] &&
    md5($_POST['var1']) === md5($_POST['var2'])) {
    echo getFLAG();
}
?>
