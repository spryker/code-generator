<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed;

use Spryker\Zed\CodeGenerator\Business\Generator\AbstractPhpFileCodeGenerator;

/**
 * @todo this smells like project level, so move up
 */
abstract class AbstractZedCodeGenerator extends AbstractPhpFileCodeGenerator
{
    /**
     * @return string
     */
    public function getPathToBundle()
    {
        return 'src';
    }

    /**
     * @return string
     */
    protected function getNamespace()
    {
        return sprintf(
            'Pyz\Zed\%s',
            $this->getBundle(),
        );
    }
}
