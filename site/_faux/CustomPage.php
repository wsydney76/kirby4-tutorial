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
    public string $headline;
    public string $subheadline;
    public string $layout;
    public string $address;
    public string $phone;
    public string $email;
    public string $level;
    public string $social;
    public string $text;
    public $date;
    public File $cover;
    public Blocks $bodyContent;

    public Field $author;
    public Field $featuredImage;
    public Field $topics;


}