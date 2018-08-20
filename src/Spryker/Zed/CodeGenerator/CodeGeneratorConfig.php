<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator;

use Spryker\Shared\CodeGenerator\CodeGeneratorConstants;
use Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver\GeneratorProjectTypeResolverInterface;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class CodeGeneratorConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    public const CODE_GENERATOR_TYPE_SUITE = 'CODE_GENERATOR_TYPE_SUITE';

    /**
     * @var string
     */
    public const CODE_GENERATOR_TYPE_DEMOSHOP = 'CODE_GENERATOR_TYPE_DEMOSHOP';

    /**
     * @return string
     */
    public function getDefaultYvesController(): string
    {
        return 'Index';
    }

    /**
     * @return string
     */
    public function getDefaultYvesControllerTargetAction(): string
    {
        return 'index';
    }

    /**
     * @return string
     */
    public function getDemoShopDefaultYvesControllerSource(): string
    {
        return 'index-demoshop';
    }

    /**
     * @return string
     */
    public function getSuitDefaultYvesControllerSource(): string
    {
        return 'index-suite';
    }

    /**
     * @return string
     */
    public function getDemoShopProviderNameSpace(): string
    {
        return 'Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider';
    }

    /**
     * @return string
     */
    public function getSuitProviderNameSpace(): string
    {
        return 'SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider';
    }

    /**
     * @param \Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver\GeneratorProjectTypeResolverInterface $typeResolver
     *
     * @return string
     */
    public function getDefaultYvesControllerSourceAction(GeneratorProjectTypeResolverInterface $typeResolver): string
    {
        if ($typeResolver->isDemoShop()) {
            return $this->getDemoShopDefaultYvesControllerSource();
        }

        return $this->getSuitDefaultYvesControllerSource();
    }

    /**
     * @param \Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver\GeneratorProjectTypeResolverInterface $typeResolver
     *
     * @return string
     */
    public function getProviderNameSpace(GeneratorProjectTypeResolverInterface $typeResolver): string
    {
        if ($typeResolver->isDemoShop()) {
            return $this->getDemoShopProviderNameSpace();
        }

        return $this->getSuitProviderNameSpace();
    }

    /**
     * @return string
     */
    public function getProjectType(): string
    {
        return $this->get(CodeGeneratorConstants::CODE_GENERATOR_PROJECT_TYPE);
    }

    /**
     * @return array
     */
    public function getTemplatePaths(): array
    {
        return [
            'vendor/spryker/code-generator/templates',
        ];
    }
}
