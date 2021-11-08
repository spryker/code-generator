<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\CodeGenerator\Business\CodeGeneratorBusinessFactory getFactory()
 */
class CodeGeneratorFacade extends AbstractFacade implements CodeGeneratorFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return array<\Generated\Shared\Transfer\CodeGeneratorResultTransfer>
     */
    public function generateZedBundle($bundle)
    {
        return $this->getFactory()
            ->createZedBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return array<\Generated\Shared\Transfer\CodeGeneratorResultTransfer>
     */
    public function generateYvesBundle($bundle)
    {
        return $this->getFactory()
            ->createYvesBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return array<\Generated\Shared\Transfer\CodeGeneratorResultTransfer>
     */
    public function generateClientBundle($bundle)
    {
        return $this->getFactory()
            ->createClientBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return array<\Generated\Shared\Transfer\CodeGeneratorResultTransfer>
     */
    public function generateServiceBundle($bundle)
    {
        return $this->getFactory()
            ->createServiceBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return array<\Generated\Shared\Transfer\CodeGeneratorResultTransfer>
     */
    public function generateSharedBundle($bundle)
    {
        return $this->getFactory()
            ->createSharedBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return array<\Generated\Shared\Transfer\CodeGeneratorResultTransfer>
     */
    public function generateBundle($bundle)
    {
        return $this->getFactory()
            ->createBundleCodeGenerator($bundle)
            ->generate();
    }
}
