<!Doctype html>
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
    <title>Sonder Blog - Index</title>
</head>
<body class="d-flex flex-column vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="btn btn-dark text-white-50 font-weight-bold" onclick="window.location.href='../index.php'">首页</button>
</nav>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <?php
                    include "../module/md.php";
                    $post = getPostAll('../model/awd.md');
                    echo $post;
                    ?>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-dark " onclick="window.location.href='../index.php'">首页</button>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-4 bg-dark mt-5 mt-auto">
    <div class="container">
        <p class="m-0 text-center text-light">Copyright &copy; Sonder Blog 2024</p>
    </div>
</footer>
</body>
</html>