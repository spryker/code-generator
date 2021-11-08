<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class QueryContainerCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @api
     *
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Persistence/QueryContainer.php.twig';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedQueryContainer';
    }

    /**
     * @api
     *
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sQueryContainer',
            $this->getBundle(),
        );
    }

    /**
     * @return string
     */
    protected function getNamespace()
    {
        return parent::getNamespace() . '\Persistence';
    }
}
