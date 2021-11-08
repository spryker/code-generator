<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

interface CodeGeneratorInterface
{
    /**
     * @var string
     */
    public const RESULT_SUCCESS = 'success';

    /**
     * @var string
     */
    public const RESULT_ALREADY_EXISTS = 'already exists';

    /**
     * @var string
     */
    public const RESULT_ERROR = 'error';

    /**
     * @return string
     */
    public function getCodeGeneratorName();

    /**
     * @return array<\Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface>
     */
    public function getRequiredGenerators();

    /**
     * @return array<\Generated\Shared\Transfer\CodeGeneratorInteractionTransfer>
     */
    public function getRequiredInteractions();

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer
     */
    public function doGenerate();
}
