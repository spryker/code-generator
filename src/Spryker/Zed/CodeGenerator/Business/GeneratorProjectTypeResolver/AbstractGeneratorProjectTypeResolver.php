<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver;

use Spryker\Zed\CodeGenerator\CodeGeneratorConfig;

abstract class AbstractGeneratorProjectTypeResolver implements GeneratorProjectTypeResolverInterface
{
    /**
     * @var \Spryker\Zed\CodeGenerator\CodeGeneratorConfig
     */
    protected $codeGeneratorConfig;

    /**
     * GeneratorProjectTypeResolver constructor.
     *
     * @param \Spryker\Zed\CodeGenerator\CodeGeneratorConfig $codeGeneratorConfig
     */
    public function __construct(CodeGeneratorConfig $codeGeneratorConfig)
    {
        $this->codeGeneratorConfig = $codeGeneratorConfig;
    }

    /**
     * Get code generator project type from config
     *
     * @api
     *
     * @return string
     */
    protected function getProjectType(): string
    {
        return $this->codeGeneratorConfig->getProjectType();
    }
}
