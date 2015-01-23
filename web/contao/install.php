<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao;

// Set the script name
define('TL_SCRIPT', 'contao/install.php');

// FIXME: parameters.yml prüfen

// Initialize the system
define('TL_MODE', 'BE');
require __DIR__ . '/../../system/initialize.php';

// Show error messages
@ini_set('display_errors', 1);
@error_reporting(E_ALL|E_STRICT);

// Run the controller
$controller = new BackendInstall();
$controller->run();
