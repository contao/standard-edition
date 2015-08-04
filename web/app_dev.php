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

// Access to debug front controllers is only allowed on localhost or with username and password.
// The username and password need to be separated by a colon and then converted to a SHA512 hash.
//
// Example: username:password
// SHA512:  9a83c7ec28250be89cef48d7698d68f4cd6e368e29c1339...6010ef50ed7d869de3cf0ccc65aa600e980818
//
// You can e.g. use http://www.hashgenerator.de to generate the SHA512 hash online.
$accessKey = '';

if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1')) || php_sapi_name() === 'cli-server')
) {
    if ('' === $accessKey) {
        header('HTTP/1.0 403 Forbidden');
        exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
    }

    if (!isset($_SERVER['PHP_AUTH_USER'])
        || !isset($_SERVER['PHP_AUTH_PW'])
        || hash('sha512', $_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']) !== $accessKey
    ) {
        header('WWW-Authenticate: Basic realm="Contao debug"');
        header('HTTP/1.0 401 Unauthorized');
        exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
    }
}

unset($accessKey);

$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__ . '/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);

// Handle the request
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
