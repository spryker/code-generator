<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class CodeGeneratorConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getDefaultYvesController()
    {
        return 'Index';
    }

    /**
     * @return string
     */
    public function getDefaultYvesControllerAction()
    {
        return 'index';
    }

    /**
     * @return array
     */
    public function getTemplatePaths()
    {
        return [
            'vendor/spryker/code-generator/templates',
        ];
    }
}
