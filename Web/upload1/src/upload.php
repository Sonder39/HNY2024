<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="assert/padding_style.css" rel="stylesheet">
    <link href="assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>

<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="btn btn-dark text-white-50 font-weight-bold" onclick="window.location.href='index.php'">首页</button>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                    </div>
                    <button type="submit" class="btn btn-dark text-white-50 font-weight-bold">重新上传</button>
                </form>

                <?php
                include "md/md.php";
                // 指定上传目录
                $target_dir = "uploads/";
                // 检查文件是否已上传
                if (!isset($_FILES["fileUpload"]) || $_FILES["fileUpload"]["size"] === 0) {
                    echo "<h5 class='text-danger'>文件不能为空。<p>";
                    exit;
                }
                // 指定上传文件的路径
                $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
                // 检查文件是否已经存在
                if (file_exists($target_file)) {
                    echo "<h5 class='text-danger'> 对不起，文件已经存在。</h5>";
                    exit;
                }
                // 检查文件大小，限制为 500KB
                if ($_FILES["fileUpload"]["size"] > 5000000) {
                    echo "<h5 class='text-danger'>对不起，你的文件太大。</h5>";
                    exit;
                }

                $file_format = pathinfo($target_file, PATHINFO_EXTENSION);
                if (($_FILES["fileUpload"]["type"] === 'image/jpeg') || ($_FILES["fileUpload"]["type"] === 'image/png') || ($_FILES["fileUpload"]["type"] === 'image/gif') || $file_format === "md") {
                    if ($file_format !== "md") echo "<h5 class='text-success'>" . $_FILES['fileUpload']['type'] . "文件类型正确" . "</h5><br>";
                    // 尝试将文件上传到服务器
                    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                        echo "<h5 class='text-success'> 文件 " . htmlspecialchars(basename($_FILES["fileUpload"]["name"])) . " 已经上传。</h5><br>";
                        echo "<h5 class='text-success'> 文件路径: " . $target_file . "</h5><br>";

                        /*动态生成一个新文件*/
                        // 获取上传的文件名（不包括扩展名）
                        $base_filename = pathinfo($_FILES["fileUpload"]["name"], PATHINFO_FILENAME);
                        // 将文件名的后缀替换为.html
                        $filename = './post/' . $base_filename . '.html';
                        // 打开文件
                        $file = fopen($filename, "w");
                        // 读取head和tail文件的内容
                        $head = file_get_contents('./model/head');
                        $tail = file_get_contents('./model/tail');
                        // 写入head
                        fwrite($file, $head);
                        // 写入文件内容
                        ob_start(); // 开始捕获输出
                        // 检查是否是图片
                        if (getimagesize($target_file)) {
                            echo '<img src="../' . $target_file . '" class="img-fluid"/>';
                        } elseif ($file_format == "md") {
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

                        if (getimagesize($target_file)) {
                            echo '<img src="' . $target_file . '" class="img-fluid"/>';
                        } elseif ($file_format == "md") {
                            // 如果是 .md 文件，输出内容
                            echo getPostAll($target_file);
                        }
                    } else {
                        echo "<h5 class='text-danger'>对不起，上传文件时出现了错误。" . "</h5><br>";
                    }
                } else {
                    echo "<h5 class='text-danger'>不允许上传：" . $_FILES['fileUpload']['type'] . "类型；</h5>";
                    echo "<h5 class='text-success'>允许上传：image/jpeg，image/png类型和markdown文件；</h5><br>";
                }
                ?>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='index.php'">首页</button>
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