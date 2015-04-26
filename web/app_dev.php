<?php

/**
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// Access to debug front controllers must only allowed from localhost or with username and password.
// FIXME: add link to documentation that explains what to do.
$md5Username = '';
$md5Password = '';

if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1')) || php_sapi_name() === 'cli-server')
) {
    if ('' === $md5Username || '' === $md5Password) {
        header('HTTP/1.0 403 Forbidden');
        exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');

    } elseif (!isset($_SERVER['PHP_AUTH_USER'])
        || !isset($_SERVER['PHP_AUTH_PW'])
        || md5($_SERVER['PHP_AUTH_USER']) !== $md5Username
        || md5($_SERVER['PHP_AUTH_PW']) !== $md5Password
    ) {
        header('WWW-Authenticate: Basic realm="Contao Debug"');
        header('HTTP/1.0 401 Unauthorized');
        exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
    }
}

unset($md5Username, $md5Password, $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__ . '/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();

// Handle the request
$request  = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
