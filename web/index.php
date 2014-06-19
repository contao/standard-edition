<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

use Symfony\Component\HttpFoundation\Request;

// Set the script name
define('TL_SCRIPT', 'index.php');

// Initialize the system
define('TL_MODE', 'FE');
require dirname(__DIR__) . '/system/initialize.php';

// Handle the request
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
