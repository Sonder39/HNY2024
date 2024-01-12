<?php
function writeFile($filename, $target_file)
{
    // 打开文件
    $file = fopen($filename, "w");
    // 读取head和tail文件的内容
    $head = file_get_contents('../model/head');
    $tail = file_get_contents('../model/tail');
    // 写入head
    fwrite($file, $head);
    // 写入文件内容
    ob_start(); // 开始捕获输出
    // 检查是否是图片
    if (getimagesize($target_file)) {
        echo '<img src="' . $target_file . '" class="img-fluid" alt=""/>';
    } elseif (pathinfo($target_file, PATHINFO_EXTENSION) == "md") {
        // 如果是 .md 文件，输出内容
        echo getPostAll($target_file);
    }
    $content = ob_get_contents(); // 获取捕获的输出
    ob_end_clean(); // 结束捕获
    fwrite($file, $content); // 写入文件内容
    // 写入tail
    fwrite($file, $tail);
    // 关闭文件
    fclose($file);
}

function showContent($target_file, $file_format)
{
    if (getimagesize($target_file)) {
        return '<img src="' . $target_file . '" class="img-fluid"/>';
    } elseif ($file_format == "md") {
        // 如果是 .md 文件，输出内容
        return getPostAll($target_file);
    }
    return "";
}