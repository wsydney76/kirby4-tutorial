<?php

// Do not set a namespace for this file, otherwise it will not work???
use Kirby\Cms\Page;
use Kirby\Cms\User;
use Twig\Markup;

class DefaultPage extends Page
{
    /**
     * This method is now available for all pages
     * unless they have their own page model.
     */
    public function link(): Markup
    {
        $string =  "<a href=\"{$this->url()}\">{$this->title()}</a>";
        return new Markup($string, 'UTF-8');
    }

    public function author(): ?User
    {
        return parent::author()->toUser();
    }

    public function cpEditUrl()
    {
        return $this->panel()->url();
    }
}
