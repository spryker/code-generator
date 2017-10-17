<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Service;

class ServiceCodeGenerator extends AbstractServiceCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Service/Service.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'Service';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sService',
            $this->getBundle()
        );
    }
}
