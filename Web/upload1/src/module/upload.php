<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="../assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="../assert/padding_style.css" rel="stylesheet">
    <link href="../assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>

<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="btn btn-dark text-white-50 font-weight-bold" onclick="window.location.href='../index.php'">首页</button>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                    </div>
                    <button type="submit" class="btn btn-dark text-white-50 font-weight-bold">上传/重新上传</button>
                </form>
                <?php
                include "md.php";
                include "check.php";
                include "save.php";
                
                $target_dir = "../uploads/";// 指定上传文件的路径
                $fileUpload = $_FILES["fileUpload"];
                $target_file = $target_dir . basename($fileUpload["name"]);
                $file_format = pathinfo($target_file, PATHINFO_EXTENSION);

                checkFileUpload($fileUpload, $target_file);
                // 题目核心： checkFileType($fileUpload, $file_format)
                if (checkFileType($fileUpload, $file_format)) {
                    if ($file_format !== "md") echo "<h5 class='text-success'>" . $_FILES['fileUpload']['type'] . "文件类型正确" . "</h5><br>";
                    // 尝试将文件上传到服务器
                    if (move_uploaded_file($fileUpload["tmp_name"], $target_file)) {
                        echo "<h5 class='text-success'> 文件 " . htmlspecialchars(basename($fileUpload["name"])) . " 已经上传。</h5><br>";
                        echo "<h5 class='text-success'> 文件路径: " . str_replace('../','', $target_file) . "</h5><br>";

                        /*动态生成一个新文件*/
                        $base_filename = pathinfo($fileUpload["name"], PATHINFO_FILENAME); // 获取上传的文件名（不包括扩展名）
                        $filename = '../post/' . $base_filename . '.html';// 将文件名的后缀替换为.html
                        writeFile($filename, $target_file);
                        echo showContent($target_file, $file_format);
                    } else {
                        echo "<h5 class='text-danger'>对不起，上传文件时出现了错误。" . "</h5><br>";
                    }
                } else {
                    echo "<h5 class='text-danger'>不允许上传：" . $_FILES['fileUpload']['type'] . "类型；</h5>";
                    echo "<h5 class='text-success'>允许上传：image/jpeg，image/png类型和markdown文件；</h5><br>";
                }
                ?>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="py-4 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Your Blog 2024</p>
    </div>
</footer>

</body>
</html>