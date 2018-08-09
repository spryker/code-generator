<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Engine;

interface GeneratorEngineInterface
{
    /**
     * @param string $source
     * @param array $vars
     *
     * @return string
     */
    public function generate($source, array $vars = []);
}
