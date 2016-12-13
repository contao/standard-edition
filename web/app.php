<?php

/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Symfony\Component\HttpFoundation\Request;

/** @var Composer\Autoload\ClassLoader */
$loader = require __DIR__.'/../app/autoload.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();

// Enable the Symfony reverse proxy
$kernel = new AppCache($kernel);
Request::enableHttpMethodParameterOverride();

// Handle the request
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
