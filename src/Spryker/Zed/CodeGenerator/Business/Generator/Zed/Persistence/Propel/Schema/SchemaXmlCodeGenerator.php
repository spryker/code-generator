<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\Propel\Schema;

use Laminas\Filter\FilterChain;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class SchemaXmlCodeGenerator extends AbstractZedCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Persistence/Propel/Schema/schema.xml.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedPropelSchemaXml';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'schema.xml';
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        $fileName = $this->getBundle();
        $fileName = $this->getCamelCaseToUnderscoreFilter()->filter($fileName);

        return $this->joinPath([
            'Pyz/Zed',
            $this->getBundle(),
            'Persistence',
            'Propel/Schema',
            $this->getSchemaPrefix() . $fileName . '.schema.xml',
        ]);
    }

    /**
     * @return string
     */
    protected function getSchemaPrefix()
    {
        return 'pyz_';
    }

    /**
     * @return \Laminas\Filter\FilterChain
     */
    protected function getCamelCaseToUnderscoreFilter()
    {
        $filter = new FilterChain();

        $filter->attachByName('WordCamelCaseToUnderscore');
        $filter->attachByName('StringToLower');

        return $filter;
    }
}
