<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?php echo get_title() ?></title>
  <meta name="keyword" content="短链接,短网址,短连接,短网址生成,短链接生成,网址缩短,短地址,短链接生成器,缩短网址" />
  <meta name="description" content="免费提供短链接，在线短网址生成，短链接生成器，短网址，网址缩短服务，长链接转化短链接。安全快速跳转，永久有效、全网连通。" />
  <link rel="shortcut icon" type="image/x-icon" href="asset/images/favicon.ico" />
  <link type="text/css" rel="stylesheet" href="asset/css/reset.css?v=<?php echo get_version() ?>" />
  <link type="text/css" rel="stylesheet" href="asset/css/main.css?v=<?php echo get_version() ?>" />
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
      <form class="link-area" action="javascript:APP.fn.setUrl(this)">
        <input id="url" type="text" placeholder="请输入您的长网址，如 https://www.taobao.com" autocomplete="off" />
        <input id="submit" type="button" value="立即缩短" onclick="APP.fn.setUrl(this)" />
      </form>
      <div id="result">
        <div class="label">短网址结果</div>
        <a id="dwz" target="_blank" href=""></a>
        <img id="qrcode" src="https://api.chenyeah.com/v1/qr?text=adasd" alt="">
      </div>
      <!-- <div class="prompt-wrap">
          asdasd
        </div> -->
    </div>
  </main>

  <footer>
    <section class="warn">
      免责声明：短网址均由用户生成，所跳转网站内容均与本站无关!
    </section>
    <section class="links">
      <a target="_blank" href="https://dogged.cn">加密狗文件在线加密</a>
      <a target="_blank" href="https://music.elem.fun">元素音乐</a>
      <a target="_blank" href="https://chenyeah.com">羽叶Life</a>
    </section>
    <section>
      Copyright&nbsp;&copy;&nbsp;2020.&nbsp;<?php echo get_title() ?>&nbsp;All
      rights reserved.
    </section>
  </footer>
  <script type="text/javascript" src="asset/js/bg.js?v=<?php echo get_version() ?>"></script>
  <script type="text/javascript" src="asset/js/toast.js?v=<?php echo get_version() ?>"></script>
  <script type="text/javascript" src="asset/js/app.js?v=<?php echo get_version() ?>"></script>
  <script>
    var _hmt = _hmt || [];
    (function () {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?2ed3470fe5b09603c97db6c5c39d34ed";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
  </script>

</body>

</html>