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
class FacadeCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @api
     *
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Business/Facade.php.twig';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedFacade';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sFacade',
            $this->getBundle(),
        );
    }

    /**
     * @api
     *
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'businessFactoryFqcn' => $this->getBusinessFactoryFqcn(),
        ] + parent::getVars();

        return $vars;
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

    /**
     * @return string
     */
    protected function getBusinessFactoryFqcn()
    {
        return sprintf(
            '\%s\Business\%sBusinessFactory',
            parent::getNamespace(),
            $this->getBundle(),
        );
    }
}
