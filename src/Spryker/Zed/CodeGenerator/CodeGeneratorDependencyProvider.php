<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;

class CodeGeneratorDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    public function getEnabledGenerators()
    {
        return [];
    }
}
