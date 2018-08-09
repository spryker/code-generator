<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business;

interface CodeGeneratorFacadeInterface
{
    /**
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateZedBundle($bundle);

    /**
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateYvesBundle($bundle);

    /**
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateClientBundle($bundle);

    /**
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateServiceBundle($bundle);

    /**
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateSharedBundle($bundle);

    /**
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateBundle($bundle);
}
