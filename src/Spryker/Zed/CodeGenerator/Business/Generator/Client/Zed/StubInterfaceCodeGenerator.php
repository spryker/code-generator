<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed;

use Spryker\Zed\CodeGenerator\Business\Generator\Client\AbstractClientCodeGenerator;

class StubInterfaceCodeGenerator extends AbstractClientCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/Zed/StubInterface.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientStubInterface';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sStubInterface',
            $this->getBundle()
        );
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return parent::getNamespace() . '\Zed';
    }

}
