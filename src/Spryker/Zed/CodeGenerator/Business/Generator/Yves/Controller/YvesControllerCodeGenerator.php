<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
            $this->getController(),
        );
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return sprintf(
            '%s\Controller',
            parent::getNamespace(),
        );
    }
}
