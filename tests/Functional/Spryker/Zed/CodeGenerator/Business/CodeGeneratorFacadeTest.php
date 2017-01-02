<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Test\Functional\Spryker\Zed\CodeGenerator\Business;

use Codeception\TestCase\Test;
use Spryker\Zed\CodeGenerator\Business\CodeGeneratorFacade;

/**
 * @group Test
 * @group Functional
 * @group Spryker
 * @group Zed
 * @group CodeGenerator
 * @group Business
 * @group CodeGeneratorFacadeTest
 */
class CodeGeneratorFacadeTest extends Test
{

    /**
     * @return void
     */
    public function testGenerateBundle()
    {
        $codeGeneratorFacade = new CodeGeneratorFacade();
        //$codeGeneratorFacade->generateBundle('FooBar');
    }

}
