FROM webdevops/php-nginx-dev:7.4
ENV WEB_DOCUMENT_ROOT /app/app/public
ENV WEB_DOCUMENT_INDEX index.php
ENV XDEBUG_MODE coverage
WORKDIR /app/app
