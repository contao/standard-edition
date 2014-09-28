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

use Contao\Bundle\CoreBundle\HttpKernel\ContaoKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends ContaoKernel
{
    public function registerBundles()
    {
        return parent::registerBundles();
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
