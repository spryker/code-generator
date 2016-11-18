<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

interface GeneratorInterface
{

    const RESULT_SUCCESS = 'success';
    const RESULT_ALREADY_EXISTS = 'already exists';
    const RESULT_ERROR = 'error';

    /**
     * @param string $level
     * @param string $bundle
     * @param string $namespace
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generate($level, $bundle, $namespace);

}
