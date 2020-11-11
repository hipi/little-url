<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_title() ?></title>
    <meta
      name="keyword"
      content="短链接,短网址,短连接,短网址生成,短链接生成,网址缩短,短地址,短链接生成器,缩短网址"
    />
    <meta
      name="description"
      content="免费提供短链接，在线短网址生成，短链接生成器，短网址，网址缩短服务，长链接转化短链接。安全快速跳转，永久有效、全网连通。"
    />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="asset/images/favicon.ico"
    />
    <link type="text/css" rel="stylesheet" href="asset/css/reset.css?v=1" />
    <link type="text/css" rel="stylesheet" href="asset/css/main.css?v=1" />
  </head>
  <body id="app">
    <div id="bg">
      <canvas></canvas>
      <canvas></canvas>
      <canvas></canvas>
    </div>
    <header></header>
    <main>
      <div class="container">
        <div class="title-wrap">
          <div class="title"><?php echo get_title() ?></div>
          <div class="dec"><?php echo get_description() ?></div>
        </div>
        <div class="link-area">
          <input
            id="url"
            type="text"
            placeholder="https://"
            autocomplete="off"
          />
          <input
            id="submit"
            type="button"
            value="立即缩短"
            onclick="APP.fn.setUrl(this)"
          />
        </div>
        <div id="result">
          <span class="label">短网址结果：</span>
          <span id="dwz">asdasdasd</span>
        </div>
        <!-- <div class="prompt-wrap">
          asdasd
        </div> -->
      </div>
    </main>
    <!-- <div id="toast"><span class="icon"></span><span>asdasd</span></div> -->
    <footer>
      <div>
        免责声明：本站永久免费!
        专门提供短网址服务，短网址均由用户生成，所跳转网站内容均与本站无关!
      </div>
      <div>
        Copyright&nbsp;&copy;&nbsp;2020.&nbsp;<?php echo get_title() ?>&nbsp;All
        rights reserved.
      </div>
    </footer>
    <script type="text/javascript" src="asset/js/bg.js?v=1"></script>
    <script type="text/javascript" src="asset/js/toast.js?v=1"></script>
    <script type="text/javascript" src="asset/js/app.js?v=1"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?2ed3470fe5b09603c97db6c5c39d34ed";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
    </script>

  </body>
</html>
