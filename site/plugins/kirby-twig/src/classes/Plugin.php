<?php

namespace Wearejust\Kirby\Twig;

use \Kirby\Toolkit\Str;
use \Kirby\Cms\Template;


/**
 * Main Kirby Twig Plugin class, hopefully with a stable API.
 *
 * @package  Kirby Twig Plugin
 * @author   Florens Verschelde <florens@fvsch.com>
 */
class Plugin
{
    /**
     * Renders a Twig template string or template file
     * Can be used in Kirby controllers and PHP templates
     *
     *  * Example usage:
     *
     *     <?php echo twig('Hello {{ who }}', ['who'=>'World']) ?>
     *     <?php echo twig('@snippets/header.twig', ['title'=>'Home page']) ?>
     *
     * Note: in Twig templates, you should use the `include` tag or function instead.
     *
     * @param string $template - path or template string to render
     * @param array  $userData - data to pass as variables to the template
     * @return string
     */
    static public function render($template, $userData)
    {
        if (!is_string($template)) return '';
        $path = strlen($template) <= 256 ? trim($template) : '';
        $data = is_array($userData) ? $userData : [];
        $data = array_merge($data, Template::$data);

        $twig = Environment::instance();
        $kirby = kirby();
        $twig->addGlobal('kirby', $kirby);
        $twig->addGlobal('site', $kirby->site());
        $twig->addGlobal('pages', $kirby->site()->pages());
        $twig->addGlobal('page', $kirby->site()->page());
        $twig->addGlobal('user', $kirby->user());
        $twig->addGlobal('users', $kirby->users());

        // treat template as a path only if it *looks like* a Twig template path
        if (Str::startsWith($path, '@') || Str::endsWith(strtolower($path), '.twig')) {
            return $twig->renderPath($path, $data);
        }
        return $twig->renderString($template, $data);
    }
}
