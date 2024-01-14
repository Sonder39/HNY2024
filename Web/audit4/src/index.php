<?php
include "flag.php";
include "key.php";
$key = getKey();
$hash = md5($key . "data1" . "data2");
setcookie("signature", $hash, time() + (60 * 60 * 24));
highlight_file(__FILE__);
echo "已知哈希值: " . $hash . "<br>";
echo "已知密钥长度: " . strlen($key) . "<br>";
echo "hint: 篡改var2的值，并更改signature的值通过验证" . "<br>";
if (!empty($_COOKIE["signature"])) {
    if ($_POST['var1'] === "data1" && $_POST['var2'] != "data2") {
        if ($_COOKIE["signature"] === md5($key . $_POST['var1'] . $_POST['var2'])) {
            echo getFLAG();
        }
    }
}
?>
