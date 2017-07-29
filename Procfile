web: vendor/bin/heroku-php-nginx -C nginx_app.conf public/
web: vendor/bin/doctrine-module orm:clear-cache:metadata
web: vendor/bin/doctrine-module orm:clear-cache:query
web: vendor/bin/doctrine-module orm:clear-cache:result
web: vendor/bin/doctrine-module migrations:migrate