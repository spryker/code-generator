<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client;

class ClientFactoryCodeGenerator extends AbstractClientCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/Factory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientFactory';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sFactory',
            $this->getBundle(),
        );
    }
}
