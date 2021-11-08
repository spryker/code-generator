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
class BusinessFactoryCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Business/BusinessFactory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedBusinessFactory';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sBusinessFactory',
            $this->getBundle(),
        );
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'configFqcn' => $this->getConfigFqcn(),
            'queryContainerFqcn' => $this->getQueryContainerFqcn(),
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
    protected function getConfigFqcn()
    {
        return sprintf(
            '\%s\%sConfig',
            parent::getNamespace(),
            $this->getBundle(),
        );
    }

    /**
     * // @todo change to QueryContainerAwareTrait
     *
     * @return string
     */
    protected function getQueryContainerFqcn()
    {
        return sprintf(
            '\%s\Persistence\%sQueryContainer',
            parent::getNamespace(),
            $this->getBundle(),
        );
    }
}
