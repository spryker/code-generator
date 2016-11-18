<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Yves;

/**
 * @todo this smells like project level, so move up
 */
class YvesFactoryCodeGenerator extends AbstractYvesCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Yves/YvesFactory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'YvesFactory';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sFactory',
            $this->getBundle()
        );
    }

}
