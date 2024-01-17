<?php

namespace site\_faux;

use Kirby\Cms\File;
use Kirby\Cms\Page;

class CustomFile extends Page
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
    public string $copyright;
    public $date;
    public File $cover;


}