#!/bin/sh

# Configure sendmail php and apache2
sed -i "s/SMTP = localhost/SMTP = ${SMTP_HOST}/g" /etc/php5/apache2/php.ini && \
sed -i "s/\(^DS\)/DS${SMTP_HOST}/g" /etc/mail/sendmail.cf
sed -i "s/PASSPHRASE/${SSL_CERT_PASS}/g" /usr/share/self-service-password/conf/passphrase.sh

service sendmail restart && \
exec /usr/sbin/apache2ctl -DFOREGROUND -k start

