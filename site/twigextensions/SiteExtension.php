<?php


namespace site\twigextensions;

use DateTime;
use Illuminate\Support\Collection;
use Kirby\Content\Field;
use Kirby\Toolkit\Html;
use Kirby\Toolkit\Str;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\Markup;
use Twig\TwigFilter;
use Twig\TwigFunction;
use function print_r;

/**
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
            new TwigFunction('a', [$this, 'aFunction']),
            new TwigFunction('attr', [$this, 'attrFunction']),
            new TwigFunction('collect', [$this, 'collectFunction']),
            new TwigFunction('dd', [$this, 'dumpAndDieFunction']),
            new TwigFunction('email', [$this, 'emailFunction']),
            new TwigFunction('tel', [$this, 'telFunction']),
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('a', [$this, 'aFunction']),
            new TwigFilter('attr', [$this, 'attrFunction']),
            new TwigFilter('date', [$this, 'dateFunction']),
            new TwigFilter('email', [$this, 'emailFunction']),
            new TwigFilter('kebab', [$this, 'kebabFunction']),
            new TwigFilter('t', [$this, 'translateFunction']),
            new TwigFilter('tel', [$this, 'telFunction']),
            new TwigFilter('truncate', [$this, 'truncateFunction']),
        ];
    }


    public function aFunction($url, $text)
    {
        return new Markup(Html::a($url, $text), 'UTF-8');
    }

    public function attrFunction($attr)
    {
        return new Markup(Html::attr($attr), 'UTF-8');
    }

    public function collectFunction($items)
    {
        return Collection::make($items);
    }

    public function dateFunction($date, $format = null)
    {
        // $locale = kirby()->language()->code();


        if ($format && $format === 'short') {
            $format = 'm/d/Y';
        }

        if (is_string($date) === true) {
            $date = new DateTime($date);
        }

        if ($date instanceof Field) {
            return $date->toDate($format);
        }

        if ($date instanceof DateTime) {
            return $date->format($format);
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


    public function telFunction($tel)
    {
        return new Markup(Html::tel($tel), 'UTF-8');
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
