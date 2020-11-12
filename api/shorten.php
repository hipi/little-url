<?php
  // 引入类
  require_once('../inc/require.php');
  global $config;
  $url_c = new url();
  $domain_c = new blaclkdomain();

  $opt = [];
  $opt['success'] = false;

  $request_arr = json_decode(file_get_contents('php://input'), true);
  $url = $request_arr['url'];
  
  if(isset($url)) {
    // 添加 HTTP 协议前缀
    if(!strstr($url, 'http://') && !strstr($url, 'https:')){
      $url = 'http://' . $url;
    } 
    // 检测网址格式是否正确
    $is_link = preg_match('(http(|s)://([\w-]+\.)+[\w-]+(/)?)', $url);
    // 检测网址是否非法
    $is_black_domain =  $domain_c->get_is_domain_black($url);

    // 判断条件
    if($url != '' && !strstr($url, $_SERVER['HTTP_HOST']) && $is_link && !$is_black_domain) {
      $opt['success'] = true;
      $opt['content']['url'] = $url;
      $short_url = $url_c->set_url($url, $config['length']);
      $opt['content']['short_url'] = $short_url;
      $opt['content']['qr_url'] = 'https://api.chenyeah.com/v1/qr?text='.$short_url;
    }else if($is_black_domain){
      $opt['content'] = '检测到该网址最终定向为非法网址.';
    } else if(strstr($url, $_SERVER['HTTP_HOST'])) {
      $opt['content'] = '链接已经是短地址了.';
    } else if(!$is_link) {
      $opt['content'] = '请输入正确格式的网址.';
    }
  } else {
    $opt['content'] = '请用POST请求，或调用参数不能为空';
  }
  echo json_encode($opt,JSON_UNESCAPED_UNICODE);

?>