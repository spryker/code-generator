<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves\Template;

use Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\AbstractYvesCodeGenerator;

class YvesTemplateCodeGenerator extends AbstractYvesCodeGenerator
{

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * @param string $bundle
     * @param \Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface $generatorEngine
     * @param string $controller
     * @param string $action
     * @param array $requiredGenerators
     */
    public function __construct(
        $bundle,
        GeneratorEngineInterface $generatorEngine,
        $controller,
        $action,
        array $requiredGenerators = []
    ) {
        parent::__construct(
            $bundle,
            $generatorEngine,
            $requiredGenerators
        );

        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->CamelCaseToDashedCase($this->controller);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @todo is it called dashed case?
     *
     * @param string $string
     *
     * @return string
     */
    protected function CamelCaseToDashedCase($string)
    {
        //@todo add actual dashed logic
        return strtolower($string);
    }

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return sprintf(
            'Yves/Theme/default/%s/%s.twig.twig',
            $this->getController(),
            $this->getAction()
        );
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->joinPath([
            $this->translateNamespaceToPath($this->getNamespace()),
            sprintf(
                'Theme/default/%s/%s.twig',
                $this->getController(),
                $this->getAction()
            ),
        ]);
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return $this->getTargetFile();
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return sprintf(
            'Yves%s%sCodeGeneator',
            ucfirst($this->getController()),
            ucfirst($this->getAction())
        );
    }

}
