<?php
require 'vendor/autoload.php';
$MailChimp = new \Drewm\MailChimp('e941d9f47526550496247cba89683daf-us2');
print_r($MailChimp->call('lists/list'));
