<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves;

/**
 * @todo this smells like project level, so move up
 */
class YvesFactoryCodeGenerator extends AbstractYvesCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Yves/YvesFactory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'YvesFactory';
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
