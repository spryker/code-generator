<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves;

use Spryker\Zed\CodeGenerator\Business\Generator\AbstractPhpFileCodeGenerator;

/**
 * @todo this smells like project level, so move up
 */
abstract class AbstractYvesCodeGenerator extends AbstractPhpFileCodeGenerator
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
            'Pyz\Yves\%s',
            $this->getBundle(),
        );
    }
}
