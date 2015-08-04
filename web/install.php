<?php

/**
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Contao\Config;
use Contao\InstallationBundle\ClassLoader\LibraryLoader;
use Contao\InstallationBundle\Controller\InstallationController;
use Contao\InstallationBundle\DependencyInjection\ContainerFactory;

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED);

$loader = require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/AppKernel.php';
require_once __DIR__ . '/../vendor/contao/core-bundle/src/Resources/contao/helper/functions.php';

$kernel = new AppKernel('prod', false);

// Register the class loader
$libraryLoader = new LibraryLoader($kernel->getRootDir());
$libraryLoader->register();

Config::preload();

// Create the container
$container = ContainerFactory::create($kernel->getRootDir());

// Run the controller
$controller = new InstallationController();
$controller->setContainer($container);
$response = $controller->indexAction();
$response->send();