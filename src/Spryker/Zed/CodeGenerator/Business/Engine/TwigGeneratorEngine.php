<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CodeGenerator\Business\Engine;

use Twig_Environment;

class TwigGeneratorEngine implements GeneratorEngineInterface
{

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param string $source
     * @param array $vars
     *
     * @return string
     */
    public function generate($source, array $vars = [])
    {
        return $this->twig->render($source, $vars);
    }

}
