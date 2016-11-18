<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed;

/**
 * @todo this smells like project level, so move up
 */
class ZedConfigCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Config.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedConfig';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sConfig',
            $this->getBundle()
        );
    }

}
