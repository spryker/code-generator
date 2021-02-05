<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business;

interface CodeGeneratorFacadeInterface
{
    /**
     * Specification:
     * - Creates Zed bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateZedBundle($bundle);

    /**
     * Specification:
     * - Creates Yves bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateYvesBundle($bundle);

    /**
     * Specification:
     * - Creates Client bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateClientBundle($bundle);

    /**
     * Specification:
     * - Creates Service bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateServiceBundle($bundle);

    /**
     * Specification:
     * - Creates Shared bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateSharedBundle($bundle);

    /**
     * Specification:
     * - Creates bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateBundle($bundle);
}
