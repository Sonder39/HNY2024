<?php
function checkFileUpload($fileUpload, $target_file)
{
    $target_dir = "uploads/";
    // 检查文件是否已上传
    if (!isset($fileUpload) || $fileUpload["size"] === 0) {
        return "<h5 class='text-danger'>文件不能为空。<p>";
    }
    // 检查文件是否已经存在
    if (file_exists($target_file)) {
        return "<h5 class='text-danger'> 对不起，文件已经存在。</h5>";
    }
    // 检查文件大小，限制为 500KB
    if ($fileUpload["size"] > 5000000) {
        return "<h5 class='text-danger'>对不起，你的文件太大。</h5>";
    }
    return "";
}

function checkFileType($fileUpload, $file_format)
{
    if (($fileUpload["type"] === 'image/jpeg')) return true;
    else if ($fileUpload["type"] === 'image/png') return true;
    else if ($fileUpload["type"] === 'image/gif') return true;
    else if ($file_format === "md") return true;
    else return false;
}
