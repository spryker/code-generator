<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Service;

use Spryker\Zed\CodeGenerator\Business\Generator\AbstractPhpFileCodeGenerator;

abstract class AbstractServiceCodeGenerator extends AbstractPhpFileCodeGenerator
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
            'Pyz\Service\%s',
            $this->getBundle()
        );
    }
}
