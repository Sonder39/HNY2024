<?php
function getPostAll($file)
{
    $markdown = file_get_contents($file);
    // 按行分割
    $lines = explode("\n", $markdown);
    // 初始化 HTML
    $html = '';
    // 初始化代码块标志
    $inCodeBlock = false;
    // 遍历每一行
    foreach ($lines as $line) {
        $html = mdParse($line, $html, $inCodeBlock)[0];
        $inCodeBlock = mdParse($line, $html, $inCodeBlock)[1];
    }
    return $html;
}

function getPost($file, $line_num)
{
    $markdown = file_get_contents($file);
    // 按行分割
    $lines = explode("\n", $markdown);
    // 初始化 HTML
    $html = '';
    // 初始化代码块标志
    $inCodeBlock = false;
    // 遍历每一行
    $i = 0;
    foreach ($lines as $line) {
        $html = mdParse($line, $html, $inCodeBlock)[0];
        $inCodeBlock = mdParse($line, $html, $inCodeBlock)[1];
        $i++;
        if ($i === $line_num) break;
    }
    $html .= '......';
    return $html;
}


function mdParse($line, $html, $inCodeBlock)
{
    // 如果是标题1
    if (strpos($line, '# ') === 0) {
        $text = substr($line, 1);
        $html .= "<p class='md-h1 text-danger'>$text</p>\n";
    } elseif (strpos($line, '## ') === 0) {
        $text = substr($line, 2);
        $html .= "<p class='md-h2 text-warning'>$text</p>\n";
    } elseif (strpos($line, '### ') === 0) {
        $text = substr($line, 3);
        $html .= "<p class='md-h3 text-info'>$text</p>\n";
    } elseif (strpos($line, '#### ') === 0) {
        $text = substr($line, 4);
        $html .= "<p class='md-h4 text-success'>$text</p>\n";
    } elseif (strpos($line, '> ') === 0) {
        $text = substr($line, 2);
        $html .= "<p class='md-blockquote text-white-50'>$text</p>\n";
    }// 如果是代码块的开始或结束
    elseif (strpos($line, '```') === 0) {
        $inCodeBlock = !$inCodeBlock;
        $html .= $inCodeBlock ? "<pre><code id='md-code'>" : "</code></pre>\n";
    } else {
        $html .= $inCodeBlock ? htmlspecialchars($line) . "\n" : "<p class='md-p text-white-50'>$line</p>\n";
    }
    return [$html, $inCodeBlock];
}

?>