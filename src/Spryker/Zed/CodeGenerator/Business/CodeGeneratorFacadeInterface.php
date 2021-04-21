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
     * - Generates Zed application layer for a module.
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
     * - Generates Yves application layer for a module.
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
     * - Generates Client application layer for a module.
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
     * - Generates Service application layer for a module.
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
     * - Generates Shared application layer for a module.
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
     * - Generates all application layers (Zed, Service, Shared, Yves, and Client) for a module.
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateBundle($bundle);
}
