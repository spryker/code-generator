<?php

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class NavigationXmlCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Communication/navigation.xml.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedNavigationXml';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'navigation.xml';
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->joinPath([
            'Pyz/Zed',
            $this->getBundle(),
            'Communication/navigation.xml',
        ]);
    }

}