<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed;

use Spryker\Zed\CodeGenerator\Business\Generator\Client\AbstractClientCodeGenerator;

class StubCodeGenerator extends AbstractClientCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/Zed/Stub.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientStub';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sStub',
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
