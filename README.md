Web ����������ʹ�ñ�����壬���� lnmp һ������ֻ��Ҫ��װ Nginx��PHP ���ɡ�

Ȼ��������������ϴ�����Դ�뵽��վ��Ŀ¼ wwwroot

���������� Nginx α��̬������վ�����ļ���������´��룺

```bash
#root ����Ϊ��վ��Ŀ¼��ַ
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

���ֻ��Ҫ�޸� config.php ��������ò��� inc Ŀ¼Ȩ������Ϊ�ɶ�д���ɡ�
