<?php

/**
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Contao\CoreBundle\HttpKernel\ContaoKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends ContaoKernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
        }

        $this->addAutoloadBundles($bundles);

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
