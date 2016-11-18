<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Presentation;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class IndexIndexTemplateCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Presentation/Index/index.twig.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedIndexIndexTemplate';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return 'index.twig';
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->joinPath([
            'Pyz/Zed',
            $this->getBundle(),
            'Presentation/Index/index.twig',
        ]);
    }

}
