<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

use Generated\Shared\Transfer\CodeGeneratorResultTransfer;
use Zend\Filter\FilterChain;

abstract class AbstractCodeGenerator implements CodeGeneratorInterface
{

    const KEY_BUNDLE = 'bundle';

    /**
     * @var string
     */
    protected $bundle;

    /**
     * @var \Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface
     */
    protected $generatorEngine;

    /**
     * @var \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    protected $requiredGenerators;

    /**
     * @var \Generated\Shared\Transfer\CodeGeneratorInteractionTransfer[]
     */
    protected $interactions;

    /**
     * @param string $bundle
     * @param \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[] $requiredGenerators
     */
    public function __construct($bundle, array $requiredGenerators = [])
    {
        $this->bundle = $this->normalizeBundleName($bundle);
        $this->requiredGenerators = [];

        $this->addRequiredGenerators($requiredGenerators);
    }

    /**
     * @param string $bundle
     *
     * @return string
     */
    protected function normalizeBundleName($bundle)
    {
        $bundle = $this->getUnderscoreToCamelCaseFilter()->filter($bundle);

        return $bundle;
    }

    /**
     * @return \Zend\Filter\FilterChain
     */
    protected function getUnderscoreToCamelCaseFilter()
    {
        $filter = new FilterChain();

        $filter->attachByName('WordUnderscoreToCamelCase');

        return $filter;
    }

    /**
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    public function getRequiredGenerators()
    {
        return $this->requiredGenerators;
    }

    /**
     * @param \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[] $requiredGenerators
     *
     * @return void
     */
    protected function addRequiredGenerators(array $requiredGenerators)
    {
        foreach ($requiredGenerators as $requiredGenerator) {
            $this->addRequiredGenerators($requiredGenerator->getRequiredGenerators());
            $this->addRequiredGenerator($requiredGenerator);
        }
    }

    /**
     * @param \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface $generator
     *
     * @return void
     */
    protected function addRequiredGenerator(CodeGeneratorInterface $generator)
    {
        if (!array_key_exists($generator->getCodeGeneratorName(), $this->requiredGenerators)) {
            $this->requiredGenerators[$generator->getCodeGeneratorName()] = $generator;
        }
    }

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generate()
    {
        $codeGeneratorResultTransfers = $this->executeRequiredGenerators();
        $codeGeneratorResultTransfers[] = $this->doGenerate();

        return $codeGeneratorResultTransfers;
    }

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer
     */
    public function doGenerate()
    {
        $codeGeneratorResultTransfer = new CodeGeneratorResultTransfer();

        //@todo find better message, like 'please add the following to your bootstrap file' (unless this also gets automated)
        $codeGeneratorResultTransfer->setFilename($this->getCodeGeneratorName());
        $codeGeneratorResultTransfer->setResult(CodeGeneratorInterface::RESULT_SUCCESS);

        return $codeGeneratorResultTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    protected function executeRequiredGenerators()
    {
        $codeGeneratorResultTransfers = [];

        foreach ($this->getRequiredGenerators() as $requiredGenerator) {
            $codeGeneratorResultTransfers = array_merge(
                $codeGeneratorResultTransfers,
                [$requiredGenerator->doGenerate()]
            );
        }

        return $codeGeneratorResultTransfers;
    }

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorInteractionTransfer[]
     */
    public function getRequiredInteractions()
    {
        return [];
    }

}
