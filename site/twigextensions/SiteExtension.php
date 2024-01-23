<?php


namespace site\twigextensions;

use DateTime;
use Exception;
use HTMLPurifier;
use Illuminate\Support\Collection;
use Kirby\Content\Field;
use Kirby\Data\Json;
use Kirby\Toolkit\Html;
use Kirby\Toolkit\Str;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\Markup;
use Twig\TwigFilter;
use Twig\TwigFunction;
use function kirby;
use function print_r;

/**
 * Twig extension that enables some crafty variables, functions and filters.
 *
 * For more see in Craft CMS:
 * /vendor/craftcms/cms/src/web/twig/Extension.php
 *
 * Warning: Bringing Craft's twig extension ideas/concepts/code snippets here
 * may infringe on Craft's license.
 *
 * Make sure to check the license before doing so in real life.
 *
 * @author    wsydney76
 * @package   Site
 * @since     1.0.0
 */
class SiteExtension extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        return [
            '_globals' => Collection::make(),
            'now' => new DateTime(),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('a', [$this, 'aFunction'],['is_safe' => ['html']]),
            new TwigFunction('attr', [$this, 'attrFunction']),
            new TwigFunction('collect', [$this, 'collectFunction']),
            new TwigFunction('dd', [$this, 'dumpAndDieFunction']),
            new TwigFunction('email', [$this, 'emailFunction']),
            new TwigFunction('tel', [$this, 'telFunction'],['is_safe' => ['html']]),
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('a', [$this, 'aFunction'],['is_safe' => ['html']]),
            new TwigFilter('attr', [$this, 'attrFunction']),
            new TwigFilter('date', [$this, 'dateFunction']),
            new TwigFilter('email', [$this, 'emailFunction']),
            new TwigFilter('kebab', [$this, 'kebabFunction']),
            new TwigFilter('md', [$this, 'markdownFunction'], ['is_safe' => ['html']]),
            new TwigFilter('markdown', [$this, 'markdownFunction', ['is_safe' => ['html']]]),
            new TwigFilter('purify', [$this, 'purifyFunction'], ['is_safe' => ['html']]),
            new TwigFilter('push', [$this, 'pushFunction']),
            new TwigFilter('t', [$this, 'translateFunction']),
            new TwigFilter('tel', [$this, 'telFunction'], ['is_safe' => ['html']]),
            new TwigFilter('truncate', [$this, 'truncateFunction']),
        ];
    }


    public function aFunction($url, $text)
    {
        return Html::a($url, $text);
    }

    public function attrFunction($attr)
    {
        return new Markup(Html::attr($attr), 'UTF-8');
    }

    public function collectFunction($items)
    {
        return Collection::make($items);
    }

    // TODO: Use php (or twig) intl extension for date formatting
    public function dateFunction($date, $format = null)
    {
        $languageCode = kirby()->language()->code();

        if ($format && $format === 'short') {
            $format = kirby()->site()->shortDateFormat()->or('d.m.Y');
        }

        if (is_string($date) === true) {
            $date = new DateTime($date);
        }

        if ($date instanceof Field) {
            return $date->toDate($format);
        }

        if (!$date instanceof DateTime) {
            throw new \RuntimeException('Invalid date', 400);
        }
        return $date->format($format);
    }

    public function dumpAndDieFunction($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die();
    }

    public function emailFunction($email)
    {
        return new Markup(Html::email($email), 'UTF-8');
    }

    public function kebabFunction($text)
    {
        return Str::kebab($text);
    }

    public function markdownFunction($text)
    {
        return kirbytext($text);
    }

    public function purifyFunction(?string $html, array|string|null $config = null)
    {
        if (!$html) {
            return null;
        }

        if (is_string($config)) {
            $path = kirby()->root('config') . DIRECTORY_SEPARATOR . 'htmlpurifier' .
                DIRECTORY_SEPARATOR . $config . '.json';

            if (!is_file($path)) {
                die("No HTML Purifier config found at $path.");
            }

            try {
                $config = Json::decode(file_get_contents($path));
            } catch (Exception $e) {
                die("Invalid HTML Purifier config at $path.");
            }
        }

        return (new HTMLPurifier($config))->purify($html);
    }

    public function pushFunction($array, $value)
    {
        $array[] = $value;
        return $array;
    }

    public function telFunction($tel)
    {
        return Html::tel($tel);
    }

    public function translateFunction($text)
    {
        return t($text, $text);
    }

    public function truncateFunction($text, $length = 100, $append = '…')
    {
        return Str::short($text, $length, $append);
    }

}
