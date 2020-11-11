Web 环境，可以使用宝塔面板，或者 lnmp 一键包，只需要安装 Nginx、PHP 即可。

然后解析好域名，上传程序源码到网站根目录 wwwroot

接下来设置 Nginx 伪静态，在网站配置文件中添加以下代码：

```bash
#root 后面为网站根目录地址
location / {
  try_files $uri $uri/ =404;
  rewrite (\d+|\w+)$ /index.php?id=$1;

  location ^~ /asset/ {
    root /var/www/xx.com;
  }

  location ^~ /api/ {
    root /var/www/xx.com;
  }
  location ^~ /inc/ {
    return 403;
   }
  }
```

最后只需要修改 config.php 的相关配置并把 inc 目录权限设置为可读写即可。
