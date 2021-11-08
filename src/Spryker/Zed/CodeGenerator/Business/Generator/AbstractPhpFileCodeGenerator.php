<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

abstract class AbstractPhpFileCodeGenerator extends AbstractFileCodeGenerator
{
    /**
     * @var string
     */
    public const KEY_CLASSNAME = 'classname';

    /**
     * @var string
     */
    public const KEY_NAMESPACE = 'namespace';

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
