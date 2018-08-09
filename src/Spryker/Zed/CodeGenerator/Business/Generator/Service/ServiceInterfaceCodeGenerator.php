<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Service;

class ServiceInterfaceCodeGenerator extends AbstractServiceCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Service/ServiceInterface.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ServiceInterface';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sServiceInterface',
            $this->getBundle()
        );
    }
}
