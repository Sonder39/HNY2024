<?php
include '../module/jwt.php';
if (!isset($_COOKIE['token'])) {
    generateToken();
} ?>
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
                    include "../module/md.php";
                    $post = getPostAll('../md/jwt.md');
                    echo $post;
                    ?>
                </div>
            </div>
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <h5 class="text-info">想要FLAG，先出示你的令牌吧</h5>
                    <?php
                    if (!isset($_COOKIE['token'])) {
                        echo "<h5 class='text-info'>请先刷新页面😣</h5>";
                    } else {
                        echo validateToken();
                    }
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