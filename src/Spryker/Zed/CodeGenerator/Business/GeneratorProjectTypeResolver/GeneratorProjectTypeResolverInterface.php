<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver;

interface GeneratorProjectTypeResolverInterface
{
    /**
     * @api
     *
     * @return bool
     */
    public function isSuite(): bool;

    /**
     * @api
     *
     * @return bool
     */
    public function isDemoShop(): bool;
}
