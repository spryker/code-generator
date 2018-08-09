<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves;

use Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface;

//@todo controller awareness might also become a trait
abstract class AbstractYvesControllerCodeGenerator extends AbstractYvesCodeGenerator
{
    /**
     * @var string
     */
    protected $controller;

    /**
     * @param string $bundle
     * @param \Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface $generatorEngine
     * @param string $controller
     * @param array $requiredGenerators
     */
    public function __construct(
        $bundle,
        GeneratorEngineInterface $generatorEngine,
        $controller,
        array $requiredGenerators = []
    ) {
        parent::__construct(
            $bundle,
            $generatorEngine,
            $requiredGenerators
        );

        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }
}
