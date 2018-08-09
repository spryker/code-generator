<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Zed\CodeGenerator\Business;

use Codeception\Test\Unit;
use Spryker\Zed\CodeGenerator\Business\CodeGeneratorFacade;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Zed
 * @group CodeGenerator
 * @group Business
 * @group Facade
 * @group CodeGeneratorFacadeTest
 * Add your own group annotations below this line
 */
class CodeGeneratorFacadeTest extends Unit
{
    /**
     * @return void
     */
    public function testConstructFacade()
    {
        $codeGeneratorFacade = new CodeGeneratorFacade();
        $this->assertSame(CodeGeneratorFacade::class, get_class($codeGeneratorFacade));
    }
}
