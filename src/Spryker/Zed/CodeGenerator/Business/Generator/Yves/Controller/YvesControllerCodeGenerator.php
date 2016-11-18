<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller;

use Spryker\Zed\CodeGenerator\Business\Generator\Yves\AbstractYvesControllerCodeGenerator;

class YvesControllerCodeGenerator extends AbstractYvesControllerCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Yves/Controller/Controller.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'YvesController';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sController',
            $this->getController()
        );
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return sprintf(
            '%s\Controller',
            parent::getNamespace()
        );
    }

}
