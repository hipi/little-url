<?php
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

  // 获取程序所在路径
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
  
  // 获取网址域名
  function get_domain($url){
    $search = '~^(([^:/?#]+):)?(//([^/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?~i';
    $url = trim($url);
    preg_match_all($search, $url ,$rr);
    return $rr[4][0];
  }

  function getBaseDomain($url=''){
    if(!$url){
      return $url;
    }
    #列举域名中固定元素
    $state_domain = array('al','dz','af','ar','ae','aw','om','az','eg','et','ie','ee','ad','ao','ai','ag','at','au','mo','bb','pg','bs','pk','py','ps','bh','pa','br','by','bm','bg','mp','bj','be','is','pr','ba','pl','bo','bz','bw','bt','bf','bi','bv','kp','gq','dk','de','tl','tp','tg','dm','do','ru','ec','er','fr','fo','pf','gf','tf','va','ph','fj','fi','cv','fk','gm','cg','cd','co','cr','gg','gd','gl','ge','cu','gp','gu','gy','kz','ht','kr','nl','an','hm','hn','ki','dj','kg','gn','gw','ca','gh','ga','kh','cz','zw','cm','qa','ky','km','ci','kw','cc','hr','ke','ck','lv','ls','la','lb','lt','lr','ly','li','re','lu','rw','ro','mg','im','mv','mt','mw','my','ml','mk','mh','mq','yt','mu','mr','us','um','as','vi','mn','ms','bd','pe','fm','mm','md','ma','mc','mz','mx','nr','np','ni','ne','ng','nu','no','nf','na','za','aq','gs','eu','pw','pn','pt','jp','se','ch','sv','ws','yu','sl','sn','cy','sc','sa','cx','st','sh','kn','lc','sm','pm','vc','lk','sk','si','sj','sz','sd','sr','sb','so','tj','tw','th','tz','to','tc','tt','tn','tv','tr','tm','tk','wf','vu','gt','ve','bn','ug','ua','uy','uz','es','eh','gr','hk','sg','nc','nz','hu','sy','jm','am','ac','ye','iq','ir','il','it','in','id','uk','vg','io','jo','vn','zm','je','td','gi','cl','cf','cn','yr','com','arpa','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','me','mobi','asia','ax','bl','bq','cat','cw','gb','jobs','mf','rs','su','sx','tel','travel');
    if(!preg_match("/^http/is", $url)){
      $url="http://".$url;
    }
    $res = null;
    $res->domain = null;
    $res->host = null;
    $url_parse = parse_url(strtolower($url));
    $urlarr = explode(".", $url_parse['host']);
    $count = count($urlarr);
    if($count <= 2){
      //当域名直接根形式不存在host部分直接输出
      $res->domain = $url_parse['host'];
    }elseif($count > 2){
      $last = array_pop($urlarr);
      $last_1 = array_pop($urlarr);
      $last_2 = array_pop($urlarr);
      $res->domain = $last_1.'.'.$last;
      $res->host = $last_2;
      if(in_array($last, $state_domain)){
        $res->domain=$last_1.'.'.$last;
        $res->host=implode('.', $urlarr);
      }
      if(in_array($last_1, $state_domain)){
        $res->domain = $last_2.'.'.$last_1.'.'.$last;
        $res->host = implode('.', $urlarr);
      }
      //print_r(get_defined_vars());die;
  
    }
    return $res;
  }
?>