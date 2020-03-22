FROM php

ENV APP_DIR /app
ENV APPLICATION_ENV development

WORKDIR $APP_DIR
VOLUME $APP_DIR

CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app/public"]