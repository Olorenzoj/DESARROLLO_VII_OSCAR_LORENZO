<?php

session_start([
    'cookie_lifetime' => 86400,
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true,
    'use_only_cookies' => true,
]);


ini_set('session.cookie_samesite', 'Strict');
?>
