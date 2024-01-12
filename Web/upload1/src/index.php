<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="assert/logo_style.css" rel="stylesheet">
    <link href="assert/padding_style.css" rel="stylesheet">
    <link href="assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Index</title>
</head>

<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Blog</a>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <h4 class="card-title">Awd第一次培训</h4>
                    <div class="card-text">
                        <?php
                        include "md/md.php";
                        $post = getPost('md/awd.md', 20);
                        echo $post;
                        ?>
                    </div>
                    <button class="btn btn-dark" onclick="window.location.href='post/post.php'">查看文章详细内容
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- logo -->
            <div class="card my-4">
                <p class="logo">CSSEC</p>
            </div>
            
            <!-- 文件上传块 -->
            <div class="card my-4">
                <h5 class="card-header">上传文章</h5>
                <div class="card-body">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
                        </div>
                        <button type="submit" class="btn btn-dark">上传</button>
                    </form>
                </div>
            </div>
            <div class="card my-4">
                <h5 class="card-header">查看文章</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="输入文章名"
                               onkeydown="if(event.keyCode===13) search();">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" onclick="search()">Go</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-4">
                <h5 class="card-header">文章列表</h5>
                <?php
                // 获取page目录下所有.html文件
                $files = glob('post/*.html');
                // 遍历文件
                echo "<ol class='text-white-50 font-weight-bold mt-2 mb-2'>";
                foreach ($files as $file) {
                    // 获取不带后缀的文件名
                    $filename = pathinfo($file, PATHINFO_FILENAME);
                    // 输出文件名
                    echo "<li><a href='./post/" . $filename . ".html'>" . $filename . "</a></li>";
                }
                echo "</ol>";
                ?>
            </div>
        </div>
    </div>
</div>

<footer class="py-4 bg-dark mt-5 mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Sonder Blog 2024</p>
    </div>
</footer>

<script>
    function search() {
        const page_name = document.getElementById('search').value;
        window.location.href = 'post/' + page_name + '.html';
    }
</script>
</body>
</html>