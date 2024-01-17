<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we handle tag filtering and paginating notes in the controller,
 * before we pass the currently active tag and the notes to the template.
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */

use Illuminate\Support\Collection;

return function ($page) {

    /**
     * We use the collection helper to fetch the posts collection defined in `/site/collections/posts.php`
     * 
     * More about collections:
     * https://getkirby.com/docs/guide/templates/collections
     */
    $topics = $page->children();

    return [
        'topics' => Collection::make($topics),
    ];

};
