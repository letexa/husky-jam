# Тестовое задание для Husky Jam

## Инсталяция

### Из репозитория
Клонирование репозитория
```
git clone https://github.com/letexa/husky-jam.git
```
Установка зависимостей
```
composer install
```
Перед запуском миграций необходимо сделать копию файла .env.example и переименовать его в .env. 
Создать рабочую и тестовую базы данных и выставить свои данные в конфиг: url проекта, 
конфиги для рабочей и тестовой баз данных.

Запуск миграций
```
./yii migrate
```

После выполнения миграций, для автоматических тестов необходимо создать дамп БД и сохранить в файл /tests/_data/dump.sql

### Из docker
```
docker run -it sillycase/huskyjam
```
Определить ip контейнера
```
docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' container_name_or_id
```
и прописать хост husky.loc в файле hosts
```
172.17.0.2 husky.loc www.husky.loc
```

Рекомендованная конфигурация nginx
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

## Использование

На странице /station заполняется список станций.

На странице /carrier заполняется список перевозчиков.

На странице /schedule/edit создается новый или редактируется уже созданный маршрут.

Все маршруты отображаются на главной странице.

## Тестирование

Для тестирования должна быть установлена тестовая база и её конфигурация прописана в файле .env.
В директории /tests/_data должен лежать дамп актуальной БД dump.sql. В .env необходимо
установить параметр 
```
YII_TEST=true
```

Запуск тестов
```
vendor/bin/codecept run api
```

