<?php

namespace SprykerTest\Zed\CodeGenerator\Business;

use Codeception\Test\Unit;
use Spryker\Zed\CodeGenerator\Business\CodeGeneratorFacade;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Zed
 * @group CodeGenerator
 * @group Business
 * @group CodeGeneratorFacadeTest
 * Add your own group annotations below this line
 */
class CodeGeneratorFacadeTest extends Unit
{

    public function testConstructFacade()
    {
        $codeGeneratorFacade = new CodeGeneratorFacade();
        $this->assertSame(CodeGeneratorFacade::class, get_class($codeGeneratorFacade));
    }
}
