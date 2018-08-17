<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver;

use Spryker\Zed\CodeGenerator\CodeGeneratorConfig;

class GeneratorProjectTypeResolver extends AbstractGeneratorProjectTypeResolver
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return bool
     */
    public function isSuite(): bool
    {
        return $this->getProjectType() === CodeGeneratorConfig::CODE_GENERATOR_TYPE_SUITE;
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return bool
     */
    public function isDemoShop(): bool
    {
        return $this->getProjectType() === CodeGeneratorConfig::CODE_GENERATOR_TYPE_SHOP;
    }
}
