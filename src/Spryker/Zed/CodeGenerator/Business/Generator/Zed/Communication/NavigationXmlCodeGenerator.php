<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;
use Zend\Filter\Word\CamelCaseToDash;
use Zend\Filter\Word\CamelCaseToUnderscore;

class NavigationXmlCodeGenerator extends AbstractZedCodeGenerator
{
    const KEY_BUNDLE_DASHED = 'bundleDashed';
    const KEY_BUNDLE_HUMANIZED = 'bundleHumanized';

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Communication/navigation.xml.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedNavigationXml';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'navigation.xml';
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->joinPath([
            'Pyz/Zed',
            $this->getBundle(),
            'Communication/navigation.xml',
        ]);
    }

    /**
     * @return array
     */
    protected function getVars()
    {
        $vars = [
                static::KEY_BUNDLE_DASHED => $this->getBundleDashed(),
                static::KEY_BUNDLE_HUMANIZED => $this->getBundleHumanized(),
            ] + parent::getVars();

        return $vars;
    }

    /**
     * @return string
     */
    protected function getBundleDashed()
    {
        $bundle = $this->getCamelCaseToDashedFilter()->filter($this->getBundle());
        $bundle = strtolower($bundle);

        return $bundle;
    }

    /**
     * @return \Zend\Filter\FilterInterface
     */
    protected function getCamelCaseToDashedFilter()
    {
        $filter = new CamelCaseToDash();

        return $filter;
    }

    /**
     * @return string
     */
    protected function getBundleHumanized()
    {
        $bundle = $this->getBundle();

        $bundle = $this->getUnderscoreToHumanizedFilter()->filter($bundle);
        $bundle = str_replace('_', ' ', $bundle);

        return $bundle;
    }

    /**
     * @return \Zend\Filter\FilterInterface
     */
    protected function getUnderscoreToHumanizedFilter()
    {
        $filter = new CamelCaseToUnderscore();

        return $filter;
    }
}
