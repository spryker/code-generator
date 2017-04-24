<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Service;

class ServiceInterfaceCodeGenerator extends AbstractServiceCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Service/ServiceInterface.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ServiceInterface';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sServiceInterface',
            $this->getBundle()
        );
    }

}
