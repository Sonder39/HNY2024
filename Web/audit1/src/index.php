<?php
include "flag.php";
highlight_file(__FILE__);
if ($_GET['var1'] != $_GET['var2'] && MD5($_GET['var1']) == MD5($_GET['var2'])) {
    echo getFLAG();
}
?>
