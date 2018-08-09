<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed;

/**
 * @todo this smells like project level, so move up
 */
class ZedDependencyProviderCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/DependencyProvider.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedDependencyProvider';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sDependencyProvider',
            $this->getBundle()
        );
    }
}
