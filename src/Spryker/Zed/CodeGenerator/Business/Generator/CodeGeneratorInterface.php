<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

interface CodeGeneratorInterface
{
    const RESULT_SUCCESS = 'success';
    const RESULT_ALREADY_EXISTS = 'already exists';
    const RESULT_ERROR = 'error';

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
