<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

/**
 * @todo this smells like project level, so move up
 */
class FacadeCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @api
     *
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Business/Facade.php.twig';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedFacade';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sFacade',
            $this->getBundle()
        );
    }

    /**
     * @api
     *
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'businessFactoryFqcn' => $this->getBusinessFactoryFqcn(),
        ] + parent::getVars();

        return $vars;
    }

    /**
     * @todo is this more elegant with namespace fragments?
     *
     * @return string
     */
    protected function getNamespace()
    {
        return parent::getNamespace() . '\Business';
    }

    /**
     * @return string
     */
    protected function getBusinessFactoryFqcn()
    {
        return sprintf(
            '\%s\Business\%sBusinessFactory',
            parent::getNamespace(),
            $this->getBundle()
        );
    }

}
