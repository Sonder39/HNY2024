# 项目说明

基于自制博客样式模拟环境和`ctftraining/base_image_nginx_mysql_php_56`镜像实现的暴力遍历题目源码

## 项目结构

```
.
├── Dockerfile
└── src
    ├── db.sql
    ├── flag.sh
    ├── index.php
    ├── assert
    │   ├── logo_style.css
    │   ├── markdown.css
    │   ├── padding_style.css
    │   └── bootswatch
    │       └── bootstrap.min.css
    ├── md
    │   ├── md.php
    │   └── awd.md    
    ├── post
    │   └── post.php
```

## 文件说明

- `Dockerfile`: 用于构建 Docker 镜像的文件。
- `src/db.sql`: 数据库脚本文件，用于初始化数据库，但本题不涉及数据库操作。
- `src/flag.sh`: 用于设置动态FLAG的脚本。将环境变量 `GZCTF_FLAG` 写入到 `/flag` 文件中。最后清空 `GZCTF_FLAG` 环境变量，并删除自己。
- `src/index.php`: 博客的主页，包含文章搜索功能。
- `src/md/awd.md`: 示例的 Markdown 文件。
- `src/md/md.php`: 包含用于解析 Markdown 格式的博客文章的函数。
- `src/assert/markdown.css`: 定义了 Markdown 文档的样式，包括文本颜色、字体、字号、行高、边距等。此外，它还定义了代码块和引用块的样式。
- `src/assert/logo_style.css`，`src/assert/padding_style.css`，`src/assert/bootswatch/bootstrap.min.css`: 其他 CSS 样式文件。
- `src/post/`: 存放博客文章的文件夹。

## 如何运行

1. 安装 Docker。
2. 在项目根目录下运行 `docker build -t <your_username>/<image_name> .` 命令。
3. `docker run -d -p 80:80 -p 9000:9000 -e GZCTF_FLAG='flag{this_is_test}' <your_username>/<image_name>`
4. 在浏览器中访问 `http://localhost`。
