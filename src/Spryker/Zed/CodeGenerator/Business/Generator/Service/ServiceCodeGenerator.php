<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Service;

class ServiceCodeGenerator extends AbstractServiceCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Service/Service.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'Service';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sService',
            $this->getBundle()
        );
    }
}
