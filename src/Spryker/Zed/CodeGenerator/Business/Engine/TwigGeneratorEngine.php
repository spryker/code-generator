<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
