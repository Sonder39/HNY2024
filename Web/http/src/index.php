<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Dark Theme from BootSwatch-->
    <link href="assert/bootswatch/bootstrap.min.css" rel="stylesheet">
    <link href="assert/logo_style.css" rel="stylesheet">
    <link href="assert/padding_style.css" rel="stylesheet">
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
                    <div class="card-text">
                        <p class="text-white-50">
                            最近爬虫的狂欢让Sonder服务器不堪重负😣，于是Sonder设置了5道关卡来限制猖狂的爬虫。</p>
                        
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                POST parameter: { host: cs, port: sec }
                                <span class="badge bg-primary rounded-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                POST form: {target: 2024}
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                Authentication: auth=admin
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                User-Agent: Chrome
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-info fw-bold">
                                X-Forwarded-For: 192.168.0.1
                                <span class="badge bg-primary rounded-pill">1</span>
                            </li>
                        </ul>
                        <br>
                        <?php
                        include "ret.php";
                        error_reporting(0);
                        $ret = getRet();
                        echo $ret;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card my-4">
                <p class="logo">CSSEC</p>
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