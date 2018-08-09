<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client;

class ClientCodeGenerator extends AbstractClientCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/Client.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'Client';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sClient',
            $this->getBundle()
        );
    }
}
