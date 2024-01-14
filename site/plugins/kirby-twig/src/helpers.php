<?php

/**
 * Shortcut for Wearejust\Kirby\Twig\Plugin::render
 *
 * @package  Kirby Twig Plugin
 * @author   Florens Verschelde <florens@fvsch.com>
 * @param    string $template
 * @param    array  $userData
 * @return   string
 */
function twig($template='', $userData=[])
{
    return Wearejust\Kirby\Twig\Plugin::render($template, $userData);
}
