<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class CommunicationFactoryCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Communication/CommunicationFactory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedCommunicationFactory';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sCommunicationFactory',
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
        return parent::getNamespace() . '\Communication';
    }

    /**
     * // @todo change to ConfigAwareTrait
     *
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
