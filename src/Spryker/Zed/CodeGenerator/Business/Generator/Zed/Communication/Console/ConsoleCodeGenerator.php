<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Console;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class ConsoleCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Communication/Console/Console.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedConsole';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sConsole',
            $this->getBundle()
        );
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'facadeFqcn' => $this->getFacadeFqcn(),
        ] + parent::getVars();

        return $vars;
    }

    /**
     * @return string
     */
    protected function getNamespace()
    {
        return parent::getNamespace() . '\Communication\Console';
    }

    /**
     * // @todo change to FacadeAwareTrait
     *
     * @return string
     */
    protected function getFacadeFqcn()
    {
        return sprintf(
            '\%s\Business\%sFacade',
            parent::getNamespace(),
            $this->getBundle()
        );
    }
}
