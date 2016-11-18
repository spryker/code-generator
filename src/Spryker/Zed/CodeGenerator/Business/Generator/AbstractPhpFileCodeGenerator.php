<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

use Spryker\Zed\CodeGenerator\Business\Generator\AbstractFileCodeGenerator;

abstract class AbstractPhpFileCodeGenerator extends AbstractFileCodeGenerator
{

    const KEY_CLASSNAME = 'classname';
    const KEY_NAMESPACE = 'namespace';

    /**
     * @return string
     */
    abstract protected function getNamespace();

    /**
     * @param string $namespace
     *
     * @return string
     */
    protected function translateNamespaceToPath($namespace)
    {
        //@todo whats the constant for the namespace separator?
        return str_replace('\\', DIRECTORY_SEPARATOR, $namespace);
    }

    /**
     * @return array
     */
    protected function getVars()
    {
        $vars = [
            self::KEY_CLASSNAME => $this->getClassname(),
            self::KEY_NAMESPACE => $this->getNamespace(),
        ] + parent::getVars();

        return $vars;
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->joinPath([
            $this->translateNamespaceToPath($this->getNamespace()),
            $this->getClassname() . '.php',
        ]);
    }

}
