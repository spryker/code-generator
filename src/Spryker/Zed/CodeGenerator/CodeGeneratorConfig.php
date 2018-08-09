<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
