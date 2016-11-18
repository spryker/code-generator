<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business;

use Spryker\Zed\CodeGenerator\Business\Engine\TwigGeneratorEngine;
use Spryker\Zed\CodeGenerator\Business\Generator\BundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientBundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientDependencyProviderCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientFactoryCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientInterfaceCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed\StubCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed\StubInterfaceCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Shared\SharedBundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Shared\Transfer\TransferCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerProviderCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\Template\YvesTemplateCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\YvesBundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\YvesFactoryCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business\BusinessFactoryCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business\FacadeCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business\FacadeInterfaceCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\CommunicationFactoryCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Console\ConsoleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Controller\GatewayControllerCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Controller\IndexControllerCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\NavigationXmlCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\PersistenceFactoryCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\Propel\Schema\SchemaXmlCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\QueryContainerCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\QueryContainerInterfaceCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\Presentation\IndexIndexTemplateCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedBundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedConfigCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedDependencyProviderCodeGenerator;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * @method \Spryker\Zed\CodeGenerator\CodeGeneratorConfig getConfig()
 */
class CodeGeneratorBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedDependencyProviderCodeGenerator
     */
    public function createZedDependencyProviderCodeGenerator($bundle)
    {
        return new ZedDependencyProviderCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedBundleCodeGenerator
     */
    public function createZedBundleCodeGenerator($bundle)
    {
        return new ZedBundleCodeGenerator(
            $bundle,
            $this->getRequiredZedBundleCodeGenerators($bundle)
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedConfigCodeGenerator
     */
    public function createZedConfigCodeGenerator($bundle)
    {
        return new ZedConfigCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business\FacadeInterfaceCodeGenerator
     */
    public function createFacadeInterfaceCodeGenerator($bundle)
    {
        return new FacadeInterfaceCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business\FacadeCodeGenerator
     */
    public function createFacadeCodeGenerator($bundle)
    {
        return new FacadeCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Business\BusinessFactoryCodeGenerator
     */
    public function createBusinessFactoryCodeGenerator($bundle)
    {
        return new BusinessFactoryCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\CommunicationFactoryCodeGenerator
     */
    public function createCommunicationFactoryCodeGenerator($bundle)
    {
        return new CommunicationFactoryCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Controller\GatewayControllerCodeGenerator
     */
    public function createGatewayControllerCodeGenerator($bundle)
    {
        return new GatewayControllerCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Controller\IndexControllerCodeGenerator
     */
    public function createIndexControllerCodeGenerator($bundle)
    {
        return new IndexControllerCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Presentation\IndexIndexTemplateCodeGenerator
     */
    public function createIndexIndexTemplateCodeGenerator($bundle)
    {
        return new IndexIndexTemplateCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\Console\ConsoleCodeGenerator
     */
    public function createConsoleCodeGenerator($bundle)
    {
        return new ConsoleCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\PersistenceFactoryCodeGenerator
     */
    public function createPersistenceFactoryCodeGenerator($bundle)
    {
        return new PersistenceFactoryCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\QueryContainerCodeGenerator
     */
    public function createQueryContainerCodeGenerator($bundle)
    {
        return new QueryContainerCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\QueryContainerInterfaceCodeGenerator
     */
    public function createQueryContainerInterfaceCodeGenerator($bundle)
    {
        return new QueryContainerInterfaceCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Persistence\Propel\Schema\SchemaXmlCodeGenerator
     */
    public function createSchemaXmlCodeGenerator($bundle)
    {
        return new SchemaXmlCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\Communication\NavigationXmlCodeGenerator
     */
    public function createNavigationXmlCodeGenerator($bundle)
    {
        return new NavigationXmlCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @return \Twig_Loader_Filesystem
     */
    protected function createTwigLoaderFilesystem()
    {
        return new Twig_Loader_Filesystem(
            $this->getConfig()->getTemplatePaths()
        );
    }

    /**
     * @return \Twig_Environment
     */
    protected function createTwigEnvironment()
    {
        return new Twig_Environment(
            $this->createTwigLoaderFilesystem()
        );
    }

    /**
     * @return \Spryker\Zed\CodeGenerator\Business\Engine\TwigGeneratorEngine
     */
    protected function createTwigGeneratorEngine()
    {
        //@todo this is common between generators and should be cached!
        return new TwigGeneratorEngine(
            $this->createTwigEnvironment()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    protected function getRequiredZedBundleCodeGenerators($bundle)
    {
        return [
            $this->createZedDependencyProviderCodeGenerator($bundle),
            $this->createZedConfigCodeGenerator($bundle),
            $this->createFacadeInterfaceCodeGenerator($bundle),
            $this->createFacadeCodeGenerator($bundle),
            $this->createBusinessFactoryCodeGenerator($bundle),
            $this->createCommunicationFactoryCodeGenerator($bundle),
            $this->createGatewayControllerCodeGenerator($bundle),
            $this->createIndexControllerCodeGenerator($bundle),
            $this->createIndexIndexTemplateCodeGenerator($bundle),
            $this->createConsoleCodeGenerator($bundle),
            $this->createPersistenceFactoryCodeGenerator($bundle),
            $this->createQueryContainerCodeGenerator($bundle),
            $this->createQueryContainerInterfaceCodeGenerator($bundle),
            $this->createSchemaXmlCodeGenerator($bundle),
            $this->createNavigationXmlCodeGenerator($bundle),
        ];
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Yves\YvesBundleCodeGenerator
     */
    public function createYvesBundleCodeGenerator($bundle)
    {
        return new YvesBundleCodeGenerator(
            $bundle,
            $this->getRequiredYvesBundleCodeGenerators($bundle)
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    protected function getRequiredYvesBundleCodeGenerators($bundle)
    {
        return [
            $this->createYvesIndexControllerCodeGenerator($bundle),
            $this->createYvesIndexControllerProviderCodeGenerator($bundle),
            $this->createYvesIndexIndexTemplateCodeGenerator($bundle),
            $this->createYvesFactoryCodeGenerator($bundle),
        ];
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerCodeGenerator
     */
    public function createYvesIndexControllerCodeGenerator($bundle)
    {
        return new YvesControllerCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
            $this->getConfig()->getDefaultYvesController()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerProviderCodeGenerator
     */
    public function createYvesIndexControllerProviderCodeGenerator($bundle)
    {
        return new YvesControllerProviderCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
            $this->getConfig()->getDefaultYvesController()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Yves\Template\YvesTemplateCodeGenerator
     */
    public function createYvesIndexIndexTemplateCodeGenerator($bundle)
    {
        return new YvesTemplateCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
            $this->getConfig()->getDefaultYvesController(),
            $this->getConfig()->getDefaultYvesControllerAction()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Yves\YvesFactoryCodeGenerator
     */
    public function createYvesFactoryCodeGenerator($bundle)
    {
        return new YvesFactoryCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\BundleCodeGenerator
     */
    public function createBundleCodeGenerator($bundle)
    {
        return new BundleCodeGenerator(
            $bundle,
            $this->getRequiredBundleGenerators($bundle)
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface[]
     */
    protected function getRequiredBundleGenerators($bundle)
    {
        return [
            $this->createZedBundleCodeGenerator($bundle),
            $this->createYvesBundleCodeGenerator($bundle),
            $this->createClientBundleCodeGenerator($bundle),
            $this->createSharedBundleCodeGenerator($bundle),
        ];
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientBundleCodeGenerator
     */
    public function createClientBundleCodeGenerator($bundle)
    {
        return new ClientBundleCodeGenerator(
            $bundle,
            $this->getRequiredClientBundleCodeGenerators($bundle)
        );
    }

    /**
     * @param string $bundle
     *
     * @return array
     */
    protected function getRequiredClientBundleCodeGenerators($bundle)
    {
        return [
            $this->createClientDependencyProviderCodeGenerator($bundle),
            $this->createClientFactoryCodeGenerator($bundle),
            $this->createClientCodeGenerator($bundle),
            $this->createClientInterfaceCodeGenerator($bundle),
            $this->createStubCodeGenerator($bundle),
            $this->createStubInterfaceCodeGenerator($bundle),
            $this->createGatewayControllerCodeGenerator($bundle),
        ];
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientDependencyProviderCodeGenerator
     */
    public function createClientDependencyProviderCodeGenerator($bundle)
    {
        return new ClientDependencyProviderCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientFactoryCodeGenerator
     */
    public function createClientFactoryCodeGenerator($bundle)
    {
        return new ClientFactoryCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientCodeGenerator
     */
    public function createClientCodeGenerator($bundle)
    {
        return new ClientCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\ClientInterfaceCodeGenerator
     */
    public function createClientInterfaceCodeGenerator($bundle)
    {
        return new ClientInterfaceCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed\StubCodeGenerator
     */
    public function createStubCodeGenerator($bundle)
    {
        return new StubCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Client\Zed\StubInterfaceCodeGenerator
     */
    public function createStubInterfaceCodeGenerator($bundle)
    {
        return new StubInterfaceCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Shared\SharedBundleCodeGenerator
     */
    public function createSharedBundleCodeGenerator($bundle)
    {
        return new SharedBundleCodeGenerator(
            $bundle,
            $this->getRequiredSharedBundleCodeGenerators($bundle)
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Shared\Transfer\TransferCodeGenerator
     */
    public function createTransferCodeGenerator($bundle)
    {
        return new TransferCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine()
        );
    }

    /**
     * @param string $bundle
     *
     * @return array
     */
    protected function getRequiredSharedBundleCodeGenerators($bundle)
    {
        return [
            $this->createTransferCodeGenerator($bundle),
        ];
    }

}
