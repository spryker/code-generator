<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed;

/**
 * @todo this smells like project level, so move up
 */
class ZedConfigCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Config.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedConfig';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sConfig',
            $this->getBundle()
        );
    }
}
