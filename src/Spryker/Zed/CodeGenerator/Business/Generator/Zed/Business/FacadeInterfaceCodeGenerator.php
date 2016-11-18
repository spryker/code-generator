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
class FacadeInterfaceCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @api
     *
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Business/FacadeInterface.php.twig';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedFacadeInterface';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sFacadeInterface',
            $this->getBundle()
        );
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

}
