<?php
    // 引入类
    require_once('../inc/require.php');
    $request_arr = json_decode(file_get_contents('php://input'), true);
    $domain_c = new blaclkdomain();
    $opt = [];
    $opt['success'] = false;
    
    if(isset($request_arr['domain'])) {
      $domain = $request_arr['domain'];
        // 检测网址格式是否正确
        $preg = "/^http[s]?:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is";
        $is_link = preg_match($preg, $url);
        // 判断条件

        if(!$is_link){
          $opt['content'] = '请输入正确格式的网址。';
        }else if(strstr($domain, $_SERVER['HTTP_HOST']){
          $opt['content'] = '本网站不支持添加';
        }else{
          $opt['success'] = true;
          $opt['content']['domain'] = $domain_c->set_black_domain($domain);
        }
    } else {
        $opt['content'] = '调用参数不能为空。';
    }
    echo json_encode($opt,JSON_UNESCAPED_UNICODE);
?>