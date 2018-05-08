<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\CodeGenerator\Business\CodeGeneratorBusinessFactory getFactory()
 */
class CodeGeneratorFacade extends AbstractFacade implements CodeGeneratorFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateZedBundle($bundle)
    {
        return $this->getFactory()
            ->createZedBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateYvesBundle($bundle)
    {
        return $this->getFactory()
            ->createYvesBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateClientBundle($bundle)
    {
        return $this->getFactory()
            ->createClientBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateServiceBundle($bundle)
    {
        return $this->getFactory()
            ->createServiceBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateSharedBundle($bundle)
    {
        return $this->getFactory()
            ->createSharedBundleCodeGenerator($bundle)
            ->generate();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $bundle
     *
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer[]
     */
    public function generateBundle($bundle)
    {
        return $this->getFactory()
            ->createBundleCodeGenerator($bundle)
            ->generate();
    }
}
