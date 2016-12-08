<?php

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;
use Zend\Filter\FilterChain;
use Zend\Filter\Word\CamelCaseToDash;
use Zend\Filter\Word\UnderscoreToSeparator;

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
        $bundle = $this->getBundle();
        $bundle = $this->getCamelCaseToDashedFilter()->filter($bundle);

        return strtolower($bundle);
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

        return $bundle;
    }

    /**
     * @return \Zend\Filter\FilterChain
     */
    protected function getUnderscoreToHumanizedFilter()
    {
        $filter = new FilterChain();

        $filter->attachByName('WordCamelCaseToUnderscore');
        $filter->attachByName('WordUnderscoreToSeparator');

        return $filter;
    }

}
