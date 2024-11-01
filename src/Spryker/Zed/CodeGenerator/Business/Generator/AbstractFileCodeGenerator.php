<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\CodeGenerator\Business\Generator;

use Generated\Shared\Transfer\CodeGeneratorResultTransfer;
use Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface;

abstract class AbstractFileCodeGenerator extends AbstractCodeGenerator
{
    /**
     * @var int
     */
    public const FILE_PERMISSIONS = 0777;

    /**
     * @var \Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface
     */
    protected $generatorEngine;

    /**
     * @var string
     */
    protected string $absolutePath;

    /**
     * @param string $bundle
     * @param \Spryker\Zed\CodeGenerator\Business\Engine\GeneratorEngineInterface $generatorEngine
     * @param array<\Spryker\Zed\CodeGenerator\Business\Generator\CodeGeneratorInterface> $requiredGenerators
     */
    public function __construct($bundle, GeneratorEngineInterface $generatorEngine, array $requiredGenerators = [])
    {
        parent::__construct($bundle, $requiredGenerators);

        $this->generatorEngine = $generatorEngine;
        $this->absolutePath = APPLICATION_ROOT_DIR;
    }

    /**
     * @return string
     */
    protected function getAbsolutePathToBundle()
    {
        return $this->joinPath([
            $this->absolutePath,
            $this->getPathToBundle(),
        ]);
    }

    /**
     * @param string $vendorName
     * @return void
     */
    protected function configureAbsolutePathAsVendor(string $vendorName)
    {
        $this->absolutePath = $this->joinPath([
            APPLICATION_ROOT_DIR,
            'vendor',
            $vendorName,
            $this->getBundle()
        ]);
    }

    /**
     * @return \Generated\Shared\Transfer\CodeGeneratorResultTransfer
     */
    public function doGenerate(array $config = [])
    {
        $targetFile = $this->getTargetFile();
        $absoluteTargteFile = $this->getAbsolutePathToTargetFile();

        $codeGeneratorResultTransfer = new CodeGeneratorResultTransfer();
        $codeGeneratorResultTransfer->setFilename($targetFile);

        if (file_exists($absoluteTargteFile)) {
            return $codeGeneratorResultTransfer
                ->setResult(CodeGeneratorInterface::RESULT_ALREADY_EXISTS);
        }

        $this->ensureDirectoryIsPresent($absoluteTargteFile);

        $content = $this->generatorEngine->generate(
            $this->getSourceFile(),
            $this->getVars(),
        );

        $result = file_put_contents($absoluteTargteFile, $content);

        if ($result === false) {
            return $codeGeneratorResultTransfer
                ->setResult(CodeGeneratorInterface::RESULT_ERROR);
        }

        return $codeGeneratorResultTransfer
            ->setResult(CodeGeneratorInterface::RESULT_SUCCESS);
    }

    /**
     * @return array
     */
    protected function getVars()
    {
        return [
            static::KEY_BUNDLE => $this->getBundle(),
        ];
    }

    /**
     * @param string $file
     *
     * @return bool
     */
    protected function ensureDirectoryIsPresent($file)
    {
        $directory = dirname($file);

        //@todo might want to check for regular file?
        if (!file_exists($directory)) {
            return $this->createDirectory($directory);
        }

        return true;
    }

    /**
     * @param string $directory
     *
     * @return bool
     */
    protected function createDirectory($directory)
    {
        return mkdir(
            $directory,
            static::FILE_PERMISSIONS,
            true,
        );
    }

    /**
     * @param array $fragments
     *
     * @return string
     */
    protected function joinPath(array $fragments)
    {
        return implode(
            DIRECTORY_SEPARATOR,
            $fragments,
        );
    }

    /**
     * @return string
     */
    protected function getAbsolutePathToTargetFile()
    {
        return $this->joinPath([
            $this->getAbsolutePathToBundle(),
            $this->getTargetFile(),
        ]);
    }

    /**
     * @return array<\Generated\Shared\Transfer\CodeGeneratorInteractionTransfer>
     */
    public function getRequiredInteractions()
    {
        return [];
    }

    /**
     * @return string
     */
    abstract public function getPathToBundle();

    /**
     * @return string
     */
    abstract public function getSourceFile();

    /**
     * @return string
     */
    abstract public function getTargetFile();

    /**
     * @return string
     */
    abstract public function getClassname();
}
