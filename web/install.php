<?php

/**
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Contao\InstallationBundle\Controller\InstallationController;
use Contao\InstallationBundle\HttpKernel\InstallationKernel;

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED);

$loader = require_once __DIR__ . '/../app/autoload.php';

require_once __DIR__ . '/../app/AppKernel.php';

$kernel = new InstallationKernel('dev', false);
$kernel->boot();

// Run the controller
$controller = new InstallationController();
$controller->setContainer($kernel->getContainer());
$response = $controller->indexAction();
$response->send();
