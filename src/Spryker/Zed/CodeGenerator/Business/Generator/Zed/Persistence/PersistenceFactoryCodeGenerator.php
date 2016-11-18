<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence;

use Spryker\Zed\CodeGenerator\Business\Generator\Zed\AbstractZedCodeGenerator;

class PersistenceFactoryCodeGenerator extends AbstractZedCodeGenerator
{

    /**
     * @return string
     */
    public function getSourceFile()
    {
        return 'Zed/Persistence/PersistenceFactory.php.twig';
    }

    /**
     * @return string
     */
    public function getCodeGeneratorName()
    {
        return 'ZedPersistenceFactory';
    }

    /**
     * @return string
     */
    public function getClassname()
    {
        return sprintf(
            '%sPersistenceFactory',
            $this->getBundle()
        );
    }

    /**
     * @return array
     */
    public function getVars()
    {
        $vars = [
            'configFqcn' => $this->getConfigFqcn(),
            'queryContainerFqcn' => $this->getQueryContainerFqcn(),
        ] + parent::getVars();

        return $vars;
    }

    /**
     * @return string
     */
    protected function getNamespace()
    {
        return parent::getNamespace() . '\Persistence';
    }

    /**
     * // @todo change to ConfigAwareTrait
     *
     * @return string
     */
    protected function getConfigFqcn()
    {
        return sprintf(
            '\%s\%sConfig',
            parent::getNamespace(),
            $this->getBundle()
        );
    }

    /**
     * // @todo change to QueryContainerAwareTrait
     *
     * @return string
     */
    protected function getQueryContainerFqcn()
    {
        return sprintf(
            '\%s\Persistence\%sQueryContainer',
            parent::getNamespace(),
            $this->getBundle()
        );
    }

}
