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
     * - Create Zed bundle CodeGenerator.
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
     * - Create Yves bundle CodeGenerator.
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
     * - Create Client bundle CodeGenerator.
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
     * - Create Service bundle CodeGenerator.
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
     * - Create Shared bundle CodeGenerator.
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
     * - Create bundle CodeGenerator.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateBundle($bundle);
}
