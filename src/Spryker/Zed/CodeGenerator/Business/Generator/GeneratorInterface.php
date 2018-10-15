<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

interface GeneratorInterface
{
    public const RESULT_SUCCESS = 'success';
    public const RESULT_ALREADY_EXISTS = 'already exists';
    public const RESULT_ERROR = 'error';

    /**
     * @param string $level
     * @param string $bundle
     * @param string $namespace
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generate($level, $bundle, $namespace);
}
