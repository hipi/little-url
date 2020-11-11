<?php

  // 获取网站标题
  function get_version() {
    global $config;
    return $config['version'];
  }
  // 获取网站标题
  function get_title() {
    global $config;
    return $config['title'];
  }

  // 获取网站简介
  function get_description() {
    global $config;
    return $config['description'];
  }

  // 获取用户 IP
  function get_ip() {
    $ip = '0.0.0.0';
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(!empty($_SERVER['HTTP_X_FORWARDED'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED'];
    } else if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(!empty($_SERVER['HTTP_FORWARDED'])) {
      $ip = $_SERVER['HTTP_FORWARDED'];
    } else if(!empty($_SERVER['REMOTE_ADDR'])) {
      $ip= $_SERVER['REMOTE_ADDR'];
    } else if(!empty($_SERVER['HTTP_VIA'])) {
      $ip = $_SERVER['HTTP_VIA '];
    }
    return $ip;
  }

  // 获取用户 UserAgent
  function get_ua() {
    $ua = 'N/A';
    if(!empty($_SERVER['HTTP_USER_AGENT'])) $ua = $_SERVER['HTTP_USER_AGENT'];
    return $ua;
  }

  // 获取本程序网址所在路径
  function get_uri() {
    global $config;
    // 获取传输协议
    $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    // 获取域名
    $url .= $_SERVER['HTTP_HOST'];
    // 获取程序所在路径
    $url .= $config['path'];
    if(substr($url, strlen($url) - 1) != '/') $url .= '/';
    return $url;
  }
  
  // 获取host
  function get_domain_host($url=''){
    if(!$url){
      return false;
    }
    // 添加 HTTP 协议前缀
    if(!strstr($url, 'http://') && !strstr($url, 'https:')){
      $url = 'http://' . $url;
    }
    // 检测网址格式是否正确
    $is_link = preg_match('(http(|s)://([\w-]+\.)+[\w-]+(/)?)', $url);
    #列举域名中固定元素
    if(!$is_link){
      return false;
    }
    $url_parse = parse_url(strtolower($url));
    $host = $url_parse['host'];
    return $host;
  }

  // 获取网址最终地址
  function get_redirect_url($url){
    $header = get_headers($url, 1);
    if (strpos($header[0], '301') !== false || strpos($header[0], '302') !== false) {
        if(is_array($header['Location'])) {
            return $header['Location'][count($header['Location'])-1];
        }else{
            return $header['Location'];
        }
    }else {
        return $url;
    }
  }  

?>