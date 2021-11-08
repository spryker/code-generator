<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client;

class ClientDependencyProviderCodeGenerator extends AbstractClientCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/DependencyProvider.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientDependencyProvider';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sDependencyProvider',
            $this->getBundle(),
        );
    }
}
