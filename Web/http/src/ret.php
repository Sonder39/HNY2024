<?php
function getRet()
{
    $flag1 = 'Step 1 success<br>';
    $flag2 = 'Step 2 success<br>';
    $flag3 = 'Step 3 success<br>';
    $flag4 = 'Step 4 success<br>';
    $flag5 = 'Step 5 success<br>';

    $ret = '';
    $flag = 0;

    if ($_COOKIE['auth'] === '') {
        setcookie('auth', 'guest');
    }
    if ($_GET['host'] == 'cs' && $_GET['port'] == 'sec') {
        $ret .= $flag1;
        $flag += 1;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ret = '<p class="text-success">Now your http method： POST <p>' . $ret;
        if ($_POST['target'] == '2024') {
            $ret .= $flag2;
            $flag += 1;
        }
    } else {
        $ret = '<p class="text-danger">Now your http method： GET</p>' . $ret;
    }
    if ($_COOKIE['auth'] == 'admin') {
        $ret .= $flag3;
        $flag += 1;
    }
    if ($_SERVER['HTTP_USER_AGENT'] == 'Chrome') {
        $ret .= $flag4;
        $flag += 1;
    }
    if ($_SERVER['HTTP_X_FORWARDED_FOR'] == '192.168.0.1') {
        $ret .= $flag5;
        $flag += 1;
    }
    if ($flag === 5) {
        $get_flag = file_get_contents('/flag');
        $ret .= "<p class='text-success'>Brilliant! Now I give you flag: " . $get_flag . "</p>";
    }
    return $ret;
}