<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed;

use Spryker\Zed\CodeGenerator\Business\Generator\Client\AbstractClientCodeGenerator;

class StubCodeGenerator extends AbstractClientCodeGenerator
{
    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/Zed/Stub.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientStub';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sStub',
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
