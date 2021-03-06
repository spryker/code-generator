<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

interface CodeGeneratorInterface
{
    public const RESULT_SUCCESS = 'success';
    public const RESULT_ALREADY_EXISTS = 'already exists';
    public const RESULT_ERROR = 'error';

    /**
     * @return string
     */
    public function getCodeGeneratorName();

    /**
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    public function getRequiredGenerators();

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorInteractionTransfer[]
     */
    public function getRequiredInteractions();

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer
     */
    public function doGenerate();
}
