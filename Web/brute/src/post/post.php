<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="../assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="../assert/logo_style.css" rel="stylesheet">
    <link href="../assert/padding_style.css" rel="stylesheet">
    <link href="../assert/markdown.css" rel="stylesheet">
    <title>Sonder Blog - Post</title>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">首页</a>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card bg-dark text-white-50 mb-4">
                <div class="card-body">
                    <?php
                    include "../md/md.php";
                    $post = getPostAll('../md/awd.md');
                    echo $post;
                    ?>
                </div>
            </div>
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <h5 class="text-info">或许这里面藏了个flag，如果你的page参数正确的话</h5>
                    <?php
                    // 从 num 文件中获取内容
                    $num = intval(file_get_contents('/num.txt'));
                    // 获取 page 参数的值
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
                    // 如果 page 参数的值等于 num 文件的内容，则输出环境变量 GZCTF_FLAG 的值
                    if ($page === $num) {
                        echo "<h5 class='text-success'>flag被找到了: " . file_get_contents('/flag') . "</h5>";
                    } else
                        echo "<h5 class='text-danger'>不过看来不是这篇文章呢😣</h5>";
                    ?>
                    <button class="btn btn-dark" onclick="window.location.href='../index.php'">回到首页</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="py-4 bg-dark mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Sonder Blog 2024</p>
    </div>
</footer>
</body>
</html>