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
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Spryker\Zed\CodeGenerator\Business\CodeGeneratorFacadeInterface getFacade()
 */
class BundleCodeGeneratorConsole extends Console
{
    const COMMAND_NAME = 'code:generate:module:all';
    const DESCRIPTION = 'Create all application layers (Zed, Service, Shared, Yves, and Client) for a module';

    const ARGUMENT_BUNDLE = 'module';
    const ARGUMENT_DESCRIPTION_BUNDLE = 'Name of the module';

    const OPTION_CORE = 'core';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(static::COMMAND_NAME)
            ->setDescription(static::DESCRIPTION)
            ->addArgument(
                self::ARGUMENT_BUNDLE,
                InputArgument::REQUIRED,
                self::ARGUMENT_DESCRIPTION_BUNDLE
            );
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return null|int null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bundle = $input->getArgument(self::ARGUMENT_BUNDLE);

        $codeGeneratorResultTransfers = $this->getFacade()
            ->generateBundle($bundle);

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
