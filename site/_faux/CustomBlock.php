<?php

namespace site\_faux;

use Kirby\Cms\File;
use Kirby\Cms\Page;
use Kirby\Panel\Field;

class CustomBlock extends Page
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
    public string $caption;
    public $date;
    public File $cover;
    public Field $image;
    public Field $style;
    public string $cite;
    public Field $contact;


}