<?php
    // 引入类
    require_once('../inc/require.php');
    $request_arr = json_decode(file_get_contents('php://input'), true);
    $domain_c = new blaclkdomain();
    $opt = [];
    $opt['success'] = false;
    
    if(isset($request_arr['domain'])) {
        // 检测网址格式是否正确
        $regex = '/^((http:\/\/)|(https:\/\/))?([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/';
        $is_link = preg_match($regex, $request_arr['domain']);
        // 判断条件
        if($request_arr['domain'] != '' && !strstr($request_arr['domain'], $_SERVER['HTTP_HOST']) && $is_link) {
          $opt['success'] = true;
          $opt['content']['domain'] = $domain_c->set_domain($request_arr['domain']);
        } else if(strstr($request_arr['domain'], $_SERVER['HTTP_HOST'])) {
          $opt['content'] = '本网站不支持添加';
        } else if(!$is_link) {
          $opt['content'] = '请输入正确格式的网址。';
        }
    } else {
        $opt['content'] = '调用参数不能为空。';
    }
    echo json_encode($opt);
?>