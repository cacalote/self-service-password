#!/bin/sh

# Configure sendmail and php
sed -i "s/SMTP = localhost/SMTP = ${SMTP_HOST}/g" /etc/php5/apache2/php.ini && \
sed -i "s/\(^DS\)/DS${SMTP_HOST}/g" /etc/mail/sendmail.cf

service sendmail restart && \
exec /usr/sbin/apache2ctl -DFOREGROUND -k start

