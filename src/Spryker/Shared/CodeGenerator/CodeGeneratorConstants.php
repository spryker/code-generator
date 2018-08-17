<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Shared\CodeGenerator;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface CodeGeneratorConstants
{
    /**
     * Specification:
     *  - Used for code generator configuration settings.
     *  - Can be CodeGeneratorConfig::TYPE_SUITE or CodeGeneratorConfig::TYPE_SHOP
     *
     * @api
     */
    public const CODE_GENERATOR_PROJECT_TYPE = 'CODEGENERATOR:CODE_GENERATOR_PROJECT_TYPE';
}
