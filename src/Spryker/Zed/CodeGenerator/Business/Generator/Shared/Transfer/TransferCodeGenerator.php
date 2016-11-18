<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Shared\Transfer;

use Spryker\Zed\CodeGenerator\Business\Generator\Shared\AbstractSharedCodeGenerator;
use Zend\Filter\FilterChain;

class TransferCodeGenerator extends AbstractSharedCodeGenerator
{

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'TransferCodeGenerator';
    }

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Shared/Transfer/transfer.xml';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        $name = $this->getBundle();
        $name = $this->getCamelCaseToUnderscoreFilter()->filter($name);

        return $name . '.transfer.xml';
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->joinPath([
            'Pyz/Shared',
            $this->getBundle(),
            'Transfer',
            $this->getClassname(),
        ]);
    }

    /**
     * @return \Zend\Filter\FilterChain
     */
    protected function getCamelCaseToUnderscoreFilter()
    {
        $filter = new FilterChain();

        $filter->attachByName('WordCamelCaseToUnderscore');
        $filter->attachByName('StringToLower');

        return $filter;
    }

}
