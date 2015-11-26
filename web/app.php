<?php

/**
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__ . '/../app/bootstrap.php.cache';

require_once __DIR__ . '/../app/AppKernel.php';
require_once __DIR__ . '/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();

// Enable the Symfony reverse proxy
$kernel = new AppCache($kernel);

// Handle the request
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
