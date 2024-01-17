<?php

namespace site\_faux;

use DefaultPage;
use Kirby\Cms\Blocks;
use Kirby\Cms\File;
use Kirby\Cms\Page;
use Kirby\Cms\User;
use Kirby\Content\Field;


class CustomPage extends DefaultPage
{

    public Field $subheading;
    public string $text;
    public Field $date;
    public File $cover;
    public Blocks $bodyContent;

    public Field $author;
    public Field $featuredImage;
    public Field $topics;


}