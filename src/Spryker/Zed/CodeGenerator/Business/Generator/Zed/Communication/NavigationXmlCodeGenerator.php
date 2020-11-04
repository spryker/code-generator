<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication;

use Laminas\Filter\Word\CamelCaseToDash;
use Laminas\Filter\Word\CamelCaseToUnderscore;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class NavigationXmlCodeGenerator extends AbstractZedCodeGenerator
{
    public const KEY_BUNDLE_DASHED = 'bundleDashed';
    public const KEY_BUNDLE_HUMANIZED = 'bundleHumanized';

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
     * @return \Laminas\Filter\FilterInterface
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
     * @return \Laminas\Filter\FilterInterface
     */
    protected function getUnderscoreToHumanizedFilter()
    {
        $filter = new CamelCaseToUnderscore();

        return $filter;
    }
}
