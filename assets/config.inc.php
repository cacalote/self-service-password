<?php
#==============================================================================
# LTB Self Service Password
#
# Copyright (C) 2009 Clement OUDOT
# Copyright (C) 2009 LTB-project.org
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# GPL License: http://www.gnu.org/licenses/gpl.txt
#
#==============================================================================

#==============================================================================
# Configuration
#==============================================================================
# LDAP
$ldap_url = getenv('LDAP_URL');
$ldap_binddn = getenv('LDAP_BINDDN');
$ldap_bindpw = getenv('LDAP_BINDPW');
$ldap_base = getenv('LDAP_BASE');
$ldap_login_attribute = getenv('LDAP_LOGIN_ATTRIBUTE');
$ldap_fullname_attribute = getenv('LDAP_FULLNAME_ATTRIBUTE');
$ldap_filter = getenv('LDAP_FILTER');

# Active Directory mode
# true: use unicodePwd as password field
# false: LDAPv3 standard behavior
$ad_mode = false;
# Force account unlock when password is changed
$ad_options['force_unlock'] = false;
# Force user change password at next login
$ad_options['force_pwd_change'] = false;

# Samba mode
# true: update sambaNTpassword and sambaPwdLastSet attributes too
# false: just update the password
$samba_mode = false;

# Shadow options - require shadowAccount objectClass
# Update shadowLastChange
$shadow_options['update_shadowLastChange'] = false;

# Hash mechanism for password:
# SSHA
# SHA
# SMD5
# MD5
# CRYPT
# clear (the default)
# This option is not used with ad_mode = true
$hash = "clear";

# Local password policy
# This is applied before directory password policy
# Minimal length
$pwd_min_length = getenv('PWD_MIN_LENGTH');
# Maximal length
$pwd_max_length = getenv('PWD_MAX_LENGTH');
# Minimal lower characters
$pwd_min_lower = getenv('PWD_MIN_LOWER');
# Minimal upper characters
$pwd_min_upper = getenv('PWD_MIN_UPPER');
# Minimal digit characters
$pwd_min_digit = getenv('PWD_MIN_DIGIT');
# Minimal special characters
$pwd_min_special = getenv('PWD_MIN_SPECIAL');
# Definition of special characters
$pwd_special_chars = getenv('PWD_SPECIAL_CHARS');
# Forbidden characters
#$pwd_forbidden_chars = "@%";
# Don't reuse the same password as currently
$pwd_no_reuse = getenv('PWD_NO_REUSE');
# Complexity: number of different class of character required
$pwd_complexity = getenv('PWD_COMPLEXITY');
# Show policy constraints message:
# always
# never
# onerror
$pwd_show_policy = getenv('PWD_SHOW_POLICY');
# Position of password policy constraints message:
# above - the form
# below - the form
$pwd_show_policy_pos = getenv('PWD_SHOW_POLICY_POS');

# Who changes the password?
# Also applicable for question/answer save
# user: the user itself
# manager: the above binddn
$who_change_password = "user";

## Questions/answers
# Use questions/answers?
# true (default)
# false
$use_questions = false;

# Answer attribute should be hidden to users!
$answer_objectClass = "extensibleObject";
$answer_attribute = "info";

# Extra questions (built-in questions are in lang/$lang.inc.php)
#$messages['questions']['ice'] = "What is your favorite ice cream flavor?";

## Token
# Use tokens?
# true (default)
# false
$use_tokens = true;
# Crypt tokens?
# true (default)
# false
$crypt_tokens = true;
# Token lifetime in seconds
$token_lifetime = "3600";

## Mail
# LDAP mail attribute
$mail_attribute = "mail";
# Who the email should come from
$mail_from = getenv('MAIL_FROM');
# Notify users anytime their password is changed
$notify_on_change = true;

## SMS
# Use sms
$use_sms = false;
# GSM number attribute
$sms_attribute = "mobile";
# Send SMS mail to address
$smsmailto = "{sms_attribute}@service.provider.com";
# Subject when sending email to SMTP to SMS provider
$smsmail_subject = "Provider code";
# Message
$sms_message = "{smsresetmessage} {smstoken}";

# SMS token length
$sms_token_length = 6;

# Display help messages
$show_help = true;

# Language
$lang ="en";

# Logo
$logo = "style/ictu-logo.svg";

# Debug mode
$debug = false;

# Encryption, decryption keyphrase
$keyphrase = "secret";

# Where to log password resets - Make sure apache has write permission
# By default, they are logged in Apache log
#$reset_request_log = "/var/log/self-service-password";

# Invalid characters in login
# Set at least "*()&|" to prevent LDAP injection
# If empty, only alphanumeric characters are accepted
$login_forbidden_chars = "*()&|";

## CAPTCHA
# Use Google reCAPTCHA (http://www.google.com/recaptcha)
# Go on the site to get public and private key
$use_recaptcha = false;
$recaptcha_publickey = "";
$recaptcha_privatekey = "";
# Customize theme (see http://code.google.com/intl/de-DE/apis/recaptcha/docs/customization.html)
# Examples: red, white, blackglass, clean
$recaptcha_theme = "white";
# Force HTTPS for recaptcha HTML code
$recaptcha_ssl = false;

## Default action
# change
# sendtoken
# sendsms
$default_action = "change";

## Extra messages
# They can also be defined in lang/ files
#$messages['passwordchangedextramessage'] = NULL;
#$messages['changehelpextramessage'] = NULL;

?>
