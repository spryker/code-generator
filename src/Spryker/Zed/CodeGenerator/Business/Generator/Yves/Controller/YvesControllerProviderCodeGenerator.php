<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller;

use Spryker\Zed\CodeGenerator\Business\Generator\Yves\AbstractYvesControllerCodeGenerator;
use Zend\Filter\Word\CamelCaseToDash;

class YvesControllerProviderCodeGenerator extends AbstractYvesControllerCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Yves/Plugin/Provider/ControllerProvider.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'YvesControllerProvider';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sControllerProvider',
            $this->getBundle()
        );
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return sprintf(
            '%s\Plugin\Provider',
            parent::getNamespace()
        );
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $vars = [
                'bundleDashed' => $this->getBundleDashed(),
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

}
