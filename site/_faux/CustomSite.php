<?php

namespace site\_faux;

use Kirby\Cms\Site;
use Kirby\Content\Field;

class CustomSite extends Site
{
    public Field $featuredImage;
    public string $title;
    public string $copyright;
}