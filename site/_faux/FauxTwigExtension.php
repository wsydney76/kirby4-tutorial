<?php
/**
 * FauxTwigExtension for Kirby (idea stolen from Craft CMS)
 *
 * This is intended to be used with the Symfony Plugin for PhpStorm:
 * https://plugins.jetbrains.com/plugin/7219-symfony-plugin
 *
 * It will provide full auto-complete for Kirby objects
 * in your Twig templates.
 *
 * Place the file somewhere in your project or include it via PhpStorm Settings -> Include Path.
 * You never call it, it's never included anywhere via PHP directly nor does it affect other
 * classes or Twig in any way. But PhpStorm will index it, and think all those variables
 * are in every single template and thus allows you to use Intellisense auto completion.
 *
 * Thanks to Robin Schambach; for context, see:
 * https://github.com/Haehnchen/idea-php-symfony2-plugin/issues/1103
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

namespace site\_faux;

use Illuminate\Support\Collection;
use Kirby\Cms\App;
use Kirby\Cms\Blocks;
use Kirby\Cms\Layout;
use Kirby\Cms\Layouts;
use Kirby\Cms\Pagination;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * @author    nystudio107 / wsydney76
 * @package   FauxTwigExtension
 * @since     1.0.0
 */
class FauxTwigExtension extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        return [
            'page' => new CustomPage(),
            'post' => new CustomPage(),
            'site' => new CustomSite(),
            'kirby' => new App(),
            'pages' => new Collection(),
            'posts' => new Collection(),
            'blocks' => new Blocks(),
            'block' => new CustomBlock(),
            'layouts' => new Layouts(),
            'layout' => new Layout(),
            'pagination' => new Pagination(),
            'image' => new CustomFile(),

        ];
    }
}
