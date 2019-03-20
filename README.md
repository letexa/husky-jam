# Тестовое задание для Husky Jam

## Инсталяция

### Из репозитория
```
git clone https://github.com/letexa/husky-jam.git
composer install
```

### Рекомендованная конфигурация nginx
```
server {
        listen 80;
        listen [::]:80;


        root /var/www/husky-jam/public_html/web;

        index index.php index.html index.htm index.nginx-debian.html;

        access_log /var/www/husky-jam/cgi-bin/access.log;
        error_log /var/www/husky-jam/cgi-bin/error.log;

        server_name husky-jam.loc www.husky-jam.loc;

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/run/php/php7.1-fpm.sock;
        }
       location / {
            try_files $uri $uri/ /index.php$is_args$args;
        }
        location ~* ^.+.(jpg|jpeg|gif|css|png|js|ico|html|xml|txt)$ {
            access_log off;
        }
		location ~ /\.ht {
            deny all;
        }

        sendfile off;
}
```

