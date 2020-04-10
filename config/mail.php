<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'mail.designerdepinto.com'),
    'port' => env('MAIL_PORT', 465),
    'from' => ['address' => 'harsha@designerdepinto.com', 'name' => 'Harsha De Pinto'],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
    'username' => env('MAIL_USERNAME', 'harsha@designerdepinto.com'),
    'password' => env('MAIL_PASSWORD', 'Harsha@2020'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

];
