<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Controller;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class IndexControllerCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Communication/Controller/IndexController.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedIndexController';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'IndexController';
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'facadeFqcn' => $this->getFacadeFqcn(),
            'queryContainerFqcn' => $this->getQueryContainerFqcn(),
            'communicationFactoryFqcn' => $this->getCommunicationFactoryFqcn(),
        ] + parent::getVars();

        return $vars;
    }

    /**
     * @return string
     */
    protected function getNamespace()
    {
        return parent::getNamespace() . '\Communication\Controller';
    }

    /**
     * // @todo change to FacadeAwareTrait
     *
     * @return string
     */
    protected function getFacadeFqcn()
    {
        return sprintf(
            '\%s\Business\%sFacade',
            parent::getNamespace(),
            $this->getBundle()
        );
    }

    /**
     * // @todo change to QueryContainerAwareTrait
     *
     * @return string
     */
    protected function getQueryContainerFqcn()
    {
        return sprintf(
            '\%s\Persistence\%sQueryContainer',
            parent::getNamespace(),
            $this->getBundle()
        );
    }

    /**
     * @return string
     */
    protected function getCommunicationFactoryFqcn()
    {
        return sprintf(
            '\%s\Communication\%sCommunicationFactory',
            parent::getNamespace(),
            $this->getBundle()
        );
    }
}
