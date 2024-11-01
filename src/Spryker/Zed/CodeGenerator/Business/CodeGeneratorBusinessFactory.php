<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
use Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface;
use Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceBundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceFactoryCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceInterfaceCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Shared\SharedBundleCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Shared\Transfer\TransferCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerProviderCodeGenerator;
use Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesRouteProviderPluginCodeGenerator;
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
use Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver\GeneratorProjectTypeResolver;
use Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver\GeneratorProjectTypeResolverInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * @method \Spryker\Zed\CodeGenerator\CodeGeneratorConfig getConfig()
 */
class CodeGeneratorBusinessFactory extends AbstractBusinessFactory
{


    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Zed\ZedBundleCodeGenerator
     */
    public function createZedBundleCodeGenerator($bundle, $config = [])
    {
        return (new ZedBundleCodeGenerator(
            $bundle,
            [
                (new ZedDependencyProviderCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new ZedConfigCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new FacadeInterfaceCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new FacadeCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new BusinessFactoryCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new CommunicationFactoryCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new GatewayControllerCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new IndexControllerCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new IndexIndexTemplateCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new ConsoleCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new PersistenceFactoryCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new QueryContainerCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new QueryContainerInterfaceCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new SchemaXmlCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
                (new NavigationXmlCodeGenerator($bundle, $this->createTwigGeneratorEngine()))->configure($config),
            ],
        ))->configure($config);
    }

    /**
     * @return \Twig\Loader\FilesystemLoader
     */
    protected function createTwigLoaderFilesystem()
    {
        return new FilesystemLoader(
            $this->getConfig()->getTemplatePaths(),
        );
    }

    /**
     * @return \Twig\Environment
     */
    protected function createTwigEnvironment()
    {
        return new Environment(
            $this->createTwigLoaderFilesystem(),
        );
    }

    /**
     * @return \Spryker\Zed\CodeGenerator\Business\Engine\TwigGeneratorEngine
     */
    protected function createTwigGeneratorEngine()
    {
        //@todo this is common between generators and should be cached!
        return new TwigGeneratorEngine(
            $this->createTwigEnvironment(),
        );
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
            $this->getRequiredYvesBundleCodeGenerators($bundle),
        );
    }

    /**
     * @param string $bundle
     *
     * @return array<\Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface>
     */
    protected function getRequiredYvesBundleCodeGenerators($bundle)
    {
        return [
            $this->createYvesIndexControllerCodeGenerator($bundle),
            $this->createYvesRouteProviderPluginCodeGenerator($bundle),
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
            $this->getConfig()->getDefaultYvesController(),
        );
    }

    /**
     * @deprecated Use {@link \Spryker\Zed\CodeGenerator\Business\CodeGeneratorBusinessFactory::createYvesRouteProviderPluginCodeGenerator()} instead.
     *
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Yves\Controller\YvesControllerProviderCodeGenerator
     */
    public function createYvesIndexControllerProviderCodeGenerator($bundle)
    {
        return new YvesControllerProviderCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
            $this->getConfig()->getDefaultYvesController(),
            $this->getConfig()->getProviderNameSpace($this->createGeneratorProjectTypeResolver()),
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface
     */
    public function createYvesRouteProviderPluginCodeGenerator(string $bundle): CodeGeneratorInterface
    {
        return new YvesRouteProviderPluginCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
            $this->getConfig()->getDefaultYvesController(),
            $this->getConfig()->getProviderNameSpace($this->createGeneratorProjectTypeResolver()),
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
            $this->getConfig()->getDefaultYvesControllerSourceAction($this->createGeneratorProjectTypeResolver()),
            $this->getConfig()->getDefaultYvesControllerTargetAction(),
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
            $this->createTwigGeneratorEngine(),
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
            $this->getRequiredBundleGenerators($bundle),
        );
    }

    /**
     * @param string $bundle
     *
     * @return array<\Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface>
     */
    protected function getRequiredBundleGenerators($bundle, $config = [])
    {
        return [
            $this->createZedBundleCodeGenerator($bundle, $config),
            $this->createYvesBundleCodeGenerator($bundle),
            $this->createClientBundleCodeGenerator($bundle),
            $this->createServiceBundleCodeGenerator($bundle),
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
            $this->getRequiredClientBundleCodeGenerators($bundle),
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
            $this->createTwigGeneratorEngine(),
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
            $this->createTwigGeneratorEngine(),
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
            $this->createTwigGeneratorEngine(),
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
            $this->createTwigGeneratorEngine(),
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
            $this->createTwigGeneratorEngine(),
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
            $this->createTwigGeneratorEngine(),
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceBundleCodeGenerator
     */
    public function createServiceBundleCodeGenerator($bundle)
    {
        return new ServiceBundleCodeGenerator(
            $bundle,
            $this->getRequiredServiceBundleCodeGenerators($bundle),
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
            $this->getRequiredSharedBundleCodeGenerators($bundle),
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
            $this->createTwigGeneratorEngine(),
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

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceCodeGenerator
     */
    public function createServiceCodeGenerator($bundle)
    {
        return new ServiceCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceInterfaceCodeGenerator
     */
    public function createServiceInterfaceCodeGenerator($bundle)
    {
        return new ServiceInterfaceCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
        );
    }

    /**
     * @param string $bundle
     *
     * @return \Spryker\Zed\CodeGenerator\Business\Generator\Service\ServiceFactoryCodeGenerator
     */
    public function createServiceFactoryCodeGenerator($bundle)
    {
        return new ServiceFactoryCodeGenerator(
            $bundle,
            $this->createTwigGeneratorEngine(),
        );
    }

    /**
     * @return \Spryker\Zed\CodeGenerator\Business\GeneratorProjectTypeResolver\GeneratorProjectTypeResolverInterface
     */
    public function createGeneratorProjectTypeResolver(): GeneratorProjectTypeResolverInterface
    {
        return new GeneratorProjectTypeResolver($this->getConfig());
    }

    /**
     * @param string $bundle
     *
     * @return array
     */
    protected function getRequiredServiceBundleCodeGenerators($bundle)
    {
        return [
            $this->createServiceCodeGenerator($bundle),
            $this->createServiceInterfaceCodeGenerator($bundle),
            $this->createServiceFactoryCodeGenerator($bundle),
        ];
    }
}
