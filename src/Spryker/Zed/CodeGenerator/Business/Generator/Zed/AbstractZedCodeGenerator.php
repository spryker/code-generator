<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
            $this->getBundle()
        );
    }

}
