<?php

/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Contao\InstallationBundle\HttpKernel\InstallationKernel;
use Symfony\Component\HttpFoundation\Request;

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED);

/** @var Composer\Autoload\ClassLoader */
$loader = require __DIR__.'/../app/autoload.php';

$kernel = new InstallationKernel('prod', false);

// Handle the request
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
