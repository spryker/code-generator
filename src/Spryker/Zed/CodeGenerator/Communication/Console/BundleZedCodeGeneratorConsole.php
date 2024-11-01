<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Communication\Console;

use Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Spryker\Zed\CodeGenerator\Business\CodeGeneratorFacadeInterface getFacade()
 * @method \Spryker\Zed\CodeGenerator\Communication\CodeGeneratorCommunicationFactory getFactory()
 */
class BundleZedCodeGeneratorConsole extends Console
{
    /**
     * @var string
     */
    protected const COMMAND_NAME = 'code:generate:module:zed';

    /**
     * @var string
     */
    protected const DESCRIPTION = 'Generates Zed application layer for a module';

    /**
     * @var string
     */
    protected const ARGUMENT_BUNDLE = 'module';

    /**
     * @var string
     */
    protected const ARGUMENT_BUNDLE_DESCRIPTION = 'Name of the module';

    protected const OPTION_VENDOR_NAME= 'vendor-name';
    protected const OPTION_VENDOR_NAME_DESCRIPTION = 'Build a standalone module in the vendor directory. Suits the most for contributions and product development.';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(static::COMMAND_NAME)
            ->setDescription(static::DESCRIPTION)
            ->addArgument(
                static::ARGUMENT_BUNDLE,
                InputArgument::REQUIRED,
                static::ARGUMENT_BUNDLE_DESCRIPTION
            )
            ->addOption(
                self::OPTION_VENDOR_NAME,
                null,
                InputOption::VALUE_OPTIONAL,
                self::OPTION_VENDOR_NAME_DESCRIPTION
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $bundle = $input->getArgument(static::ARGUMENT_BUNDLE);
        $vendorName = $input->getOption(static::OPTION_VENDOR_NAME);

        $config = [
            'configureAbsolutePathAsVendor' => [$vendorName]
        ];

        $codeGeneratorResultTransfers = $this->getFacade()
            ->generateZedBundle($bundle, $config);

        $messenger = $this->getMessenger();

        foreach ($codeGeneratorResultTransfers as $codeGeneratorResultTransfer) {
            if ($codeGeneratorResultTransfer->getResult() === CodeGeneratorInterface::RESULT_SUCCESS) {
                $messenger->info('Generated: ' . $codeGeneratorResultTransfer->getFilename());
            } elseif ($codeGeneratorResultTransfer->getResult() === CodeGeneratorInterface::RESULT_ALREADY_EXISTS) {
                $messenger->warning('Already exists: ' . $codeGeneratorResultTransfer->getFilename());
            } elseif ($codeGeneratorResultTransfer->getResult() === CodeGeneratorInterface::RESULT_ERROR) {
                $messenger->error('Failed: ' . $codeGeneratorResultTransfer->getFilename());
            }
        }

        return static::CODE_SUCCESS;
    }
}
