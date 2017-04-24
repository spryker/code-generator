<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Communication\Console;

use Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Spryker\Zed\CodeGenerator\Business\CodeGeneratorFacade getFacade()
 */
class BundleServiceCodeGeneratorConsole extends Console
{

    const COMMAND_NAME = 'code:generate:bundle:service';
    const DESCRIPTION = 'Generates Service for a bundle name';

    const ARGUMENT_BUNDLE = 'bundle';
    const ARGUMENT_BUNDLE_DESCRIPTION = 'Name of the bundle';

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
                self::ARGUMENT_BUNDLE_DESCRIPTION
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
            ->generateServiceBundle($bundle);

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
