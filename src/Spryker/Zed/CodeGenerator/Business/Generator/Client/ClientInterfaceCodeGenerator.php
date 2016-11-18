<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Client;

class ClientInterfaceCodeGenerator extends AbstractClientCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Client/ClientInterface.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ClientInterface';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sClientInterface',
            $this->getBundle()
        );
    }

}
