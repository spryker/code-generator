<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

/**
 * @todo this smells like project level, so move up
 */
class FacadeInterfaceCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @api
     *
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Business/FacadeInterface.php.twig';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedFacadeInterface';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sFacadeInterface',
            $this->getBundle(),
        );
    }

    /**
     * @todo is this more elegant with namespace fragments?
     *
     * @return string
     */
    protected function getNamespace()
    {
        return parent::getNamespace() . '\Business';
    }
}
