<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Shared;

use Spryker\Zed\CodeGenerator\Business\Generator\AbstractPhpFileCodeGenerator;

abstract class AbstractSharedCodeGenerator extends AbstractPhpFileCodeGenerator
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
            'Pyz\Shared\%s',
            $this->getBundle()
        );
    }

}
