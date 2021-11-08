<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed;

use Spryker\Zed\CodeGenerator\Business\Generator\Client\AbstractClientCodeGenerator;

class StubInterfaceCodeGenerator extends AbstractClientCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/Zed/StubInterface.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientStubInterface';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sStubInterface',
            $this->getBundle(),
        );
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return parent::getNamespace() . '\Zed';
    }
}
