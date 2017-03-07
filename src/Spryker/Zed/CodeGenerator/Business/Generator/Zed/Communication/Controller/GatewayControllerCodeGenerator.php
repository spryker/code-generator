<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Controller;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class GatewayControllerCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Communication/Controller/GatewayController.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedGatewayController';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'GatewayController';
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'facadeFqcn' => $this->getFacadeFqcn(),
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

}
