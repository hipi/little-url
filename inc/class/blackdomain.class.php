<?php

  class blaclkdomain {

    function __construct() {
      global $db_c;
      $this->db = $db_c;
    }

    // 插入黑名单
    public function set_black_domain($domain) {
      $domain = get_domain_host($domain);
      $id = $this->get_domain_id($domain);
      if(!$id) {
        $this->db->insert('blackdomains', 'domain', "'$domain'");
      }
      return $domain;
    }

    // 查询 domain 
    public function get_domain_id($domain) {
      $domain = get_domain_host($domain);
      $result = $this->db->query('blackdomains', "WHERE domain = '$domain'");
      (count($result) > 0) ? $opt = true : $opt = false;
      return $opt;
    }

    // 判断网址是否是非法网址
    public function get_is_domain_black($url) {
      $domain = get_domain_host($url);
      $result = $this->db->query('blackdomains', "WHERE domain = '$domain'");
      (count($result) > 0) ? $opt = true : $opt = false;
      return $opt;
    }
  }

?>