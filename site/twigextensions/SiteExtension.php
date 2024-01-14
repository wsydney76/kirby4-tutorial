<?php


namespace site\twigextensions;

use Kirby\Toolkit\Html;
use Twig\Extension\AbstractExtension;
use Twig\Markup;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author    wsydney76
 * @package   Site
 * @since     1.0.0
 */
class SiteExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('tel', [$this, 'telFunction']),
            new TwigFunction('email', [$this, 'emailFunction']),
            new TwigFunction('a', [$this, 'aFunction']),
            new TwigFunction('attr', [$this, 'attrFunction'])
        ];
    }

    public function getFilters()
    {
        return [
            new TwigFilter('tel', [$this, 'telFunction']),
            new TwigFilter('email', [$this, 'emailFunction']),
            new TwigFilter('a', [$this, 'aFunction']),
            new TwigFilter('attr', [$this, 'attrFunction'])
        ];
    }

    public function telFunction($tel)
    {
        return new Markup(Html::tel($tel), 'UTF-8');
    }

    public function emailFunction($email)
    {
        return new Markup(Html::email($email), 'UTF-8');
    }

    public function aFunction($url, $text)
    {
        return new Markup(Html::a($url, $text), 'UTF-8');
    }

    public function attrFunction($attr)
    {
        return new Markup(Html::attr($attr), 'UTF-8');
    }
}
