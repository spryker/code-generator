<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Service;

class ServiceFactoryCodeGenerator extends AbstractServiceCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Service/Factory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ServiceFactory';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sServiceFactory',
            $this->getBundle(),
        );
    }
}
